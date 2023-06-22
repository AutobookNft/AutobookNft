<?php

namespace App\Http\Livewire\Collections;

use App\Contracts\UpdatesDataItem;
use App\Models\Item_utility;
use App\Models\Team;
use App\Models\Teams_item;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class ItemsEdit extends Component
{

    public $item, $teamItem, $current_team, $state, $team, $items =[], $utility_files, $team_name, $utility;

    public $teamId,  $itemId, $itemChoseInSelectforBind;

    public $cardType, $itemType, $show_traits_button;

    public $haveUtilities, $externaTransfer, $emailExternaTransfer, $dontShow, $saved = false;

    public $itemIdBeingRemoved, $confirmItemRemoval, $confirmingItemDelete, $confirmingItemTransfer, $itemIdBeingTransfer;

    public $imagetitle, $filename, $fileCover, $fileMedia, $type, $paired, $dateCreation;

    protected $listeners = [
        'saved' => 'handleSaved',
    ];

    public function mount($id)
    {

        $this->current_team = Auth::user()->currentTeam;

        $this->show_traits_button = true;

        $this->team =  $this->current_team;

        // $this->cardType = 'edit';

        $this->itemId = $id;

       // $this->haveUtilities = TeamItem_utility::where('teams_items_id', $this->itemid)->get());

        $this->teamItem = Teams_item::findOrFail($this->itemId);

        $this->haveUtilities = $this->teamItem->util_description ? 1 : 0; // se nel field util_description c'è un valore si assume che ci sia un utility connessa all'item

        // passo il file da visualizzare, aggiungo l'estensione webp. I file visualizzati in items_edit sono solo webp
        $this->fileCover = $this->teamItem->file_cover .".webp";

        $this->state = $this->teamItem->withoutRelations()->toArray();

        $this->teamId = Auth::user()->current_team_id;

        $this->itemType = Team::findOrFail($this->teamId)->type;

        $this->selectItemtype();

    }

    public function render()
    {

        if (
            (isset(Auth::user()->currentTeam->epp_id)
                || property_exists(
                    Auth::user()->currentTeam,
                    'epp_id'
                )
            )
            && (Auth::user()->currentTeam->epp_id <> 0)
        ) {

            $this->dontShow = false;

        } else {
            $this->dontShow = true;
        }

        $this->teamItem = Teams_item::findOrFail($this->itemId);

        $collectionname = Team::find($this->teamItem->team_id);
        // dd($collectionname, $this->teamItem->team_id);
        $collectionname = $collectionname['name'];

        $this->paired = $this->teamItem->paired;

        $this->items = Teams_item::where("team_id", $this->team->id)
            ->where('bind', 0 )
            ->where('type','image')
            ->get();

        $this->utility = $this->teamItem;

        $this->item = $this->teamItem;

        $data = [
            'utility' => $this->utility,
            'item' => $this->item,
            'items' => $this->items,
            'team'=> $this->current_team,
            'fileCover' =>$this->fileCover,
            'collectionname' => $collectionname,
        ];

        //dd($this->items);

        return view('livewire.collections.items-edit', $data);
    }

    public function bind()
    {

        /*
         *  gestisco l'anteprima dell'immagine e preparo la variabile per
         *  scrivere il suo contenuto nella tabella al salvataggio
         */
        //$this->fileCover = $this->state['fileCover'];

        $this->itemIdBeingRemoved=$this->state['fileCover'];

       // dd($this->itemIdBeingRemoved);

        $itm = teams_item::find($this->itemIdBeingRemoved);

       // dd($itm);

        $file = $itm->file_cover;

        $this->fileCover = $file;

        /*
         *  grazie allo script Javasrcipt presente nella vista
         *  con questa emit, posso visualizzare l'anteprima dell'immagine sull'item
         */
        $this->emit('fileCoverChanged');

    }

    public function unpair($id)
    {

        $items = Teams_item::find($id);

        // dd($items);

        $this->fileCover = '/storage/images/default/Pg4cAVB55iuDOP4bI0mbMaTezMl2czaZjPJ8iuoC.png';

        $unpaired_id = $items->paired;
        $items->paired = 0;
        $items->file_cover = '/storage/images/default/Pg4cAVB55iuDOP4bI0mbMaTezMl2czaZjPJ8iuoC.png';
        $items->save();

        $items=Teams_item::find($unpaired_id);

        if(isset($items)){
            $items->bind = 0;
            $items->save();
        }

        $this->paired = 0;

        $this->emit($this->paired);

        /*
         *  grazie allo script Javasrcipt presente nella vista
         *  con questa emit, posso visualizzare l'anteprima dell'immagine sull'item
         */
        // $this->emit('fileCoverChanged');

    }

    public function selectItemtype()
    {
        switch ($this->type) {
            case "Image":
                $this->itemType = "image";

                break;
            case 'Audio':
                $this->itemType = "audio";

                break;
            case 'E-book':
                $this->itemType = '';
                break;
            case 'Video':
                $this->itemType = '';
                break;
            default:
                $this->itemType = '';
                break;

        }

    }

    public function delete()
    {

        try {

            Teams_item::find($this->itemIdBeingRemoved)->delete();
            $this->emit('deleted');
            return redirect(url('/dashboard/collection/item_upload'));

        } catch (\Exception $e) {
            // Mostra un messaggio di errore personalizzato all'utente
            $this->confirmItemRemoval = true;
            $this->emit('errore');

        }

    }

    public function edit(UpdatesDataItem $updater)
    {

        $updater->update(
            $this->teamItem,
            $this->state,
            $this->fileCover,
            $this->itemIdBeingRemoved,
        );

        $this->emit('saved');

    }

    public function handleSaved()
    {
        $this->saved = true;
    }

    public function disabledSaved(){

        $this->saved = false;

    }

    public function externalTransfer($teams_item_id_to_transfer){

        // trovo l'id dell'utente al quale corrisponde l'email del ricevitore dell'item
        $rcd_user_receiver = User::where('email', $this->emailExternaTransfer)->first();
        $user_id_receiver = $rcd_user_receiver->id;


        // trovo l'id del team PERSONALE dell'user che deve ricevere l'item
        // NOTA la (where:'personal_team', '1') che mi permette di trovare il team personale
        // NOTA questo team potrebbe essere stato eliminato, quindi bisogna gestire il caso
        $team_id_receiver = Team::where('user_id', $user_id_receiver)
                            ->where('personal_team', '1')
                            ->first(); // questo è l'id del team personale dell'utente selezionato

        // trovo il record del singolo item che deve essere trasferito dal sender al receiver
        $rcd_item_id_sender = Teams_item::find($teams_item_id_to_transfer);

        // verifico di avere trovato l'id del team PERSONALE del receiver
        if (isset($team_id_receiver)) {

            $team_id_receiver = $team_id_receiver->id;

            //dd($rcd_item_id_sender, $teams_item_id_to_transfer);

            if (isset($rcd_item_id_sender->id)) {

                //dd($rcd_item_id_sender->team_id, $team_id_receiver);

                // sovrascrivo il team_id dell'item sendere con il ricevitore
                $rcd_item_id_sender->team_id = $team_id_receiver;
                $rcd_item_id_sender->save();

                redirect (url('/dashboard/collection/item_upload'));
                $this->closeExternalTransfer();

            }else{
                $this->addError('error', __('non esiste un item con l\'id selezionato'));
            }

        } else {

            $team_shopping = new Team;
            $team_shopping->name = $rcd_user_receiver->name.'_shopping';
            $team_shopping->user_id = $user_id_receiver;
            $team_shopping->position = 0;
            $team_shopping->path_image_banner = '/storage/images/default/logo_t.webp';
            $team_shopping->save();

            $rcd_item_id_sender->team_id = $team_shopping->id;
            $rcd_item_id_sender->save();

            redirect (url('/dashboard/collection/item_upload'));
            $this->closeExternalTransfer();

        }

    }

    public function openExternalTransfer(){
        $this->externaTransfer=true;
    }

    public function closeExternalTransfer(){
        $this->externaTransfer=false;
    }

    public function transfer($id)
    {
        // contiene l'id del team che deve sovrascrivere l'attuale team_id in teams_item dell'item corrente
        $this->itemIdBeingTransfer;

        $transfer = Teams_item::find($id);
        $transfer->team_id= $this->itemIdBeingTransfer;
        $transfer->save();

        $this->confirmingItemTransfer = false;
        return redirect(url('dashboard/collection/item_upload'));

    }

    public function confirmItemTransfer($team_id, $team_name)
    {

        //dd($team_id, $team_name);

        $this->confirmingItemTransfer = true;

        $this->itemIdBeingTransfer = $team_id;
        $this->team_name = $team_name;


    }

    public function confirmItemRemoved($team_id)
    {

        //dd($team_id, $team_name);

        $this->confirmItemRemoval = true;
        $this->itemIdBeingRemoved = $team_id;



    }


}
