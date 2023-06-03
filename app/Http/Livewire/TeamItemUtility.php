<?php

namespace App\Http\Livewire;

use App\Models\Team_utility_files;
use App\Models\Utility_files;
use App\Util\FileHelper;
use App\Traits\HasUtilitys;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Teams_item;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Exception;

class TeamItemUtility extends Component
{

    use WithPagination;
    use WithFileUploads;
    use HasUtilitys;

    public $util_description, $util_data, $util_code, $util_joint, $util_spec_1, $util_spec_2, $util_spec_3, $util_spec_4, $util_spec_5;

    public $state = [], $current_team, $utility, $item, $items, $user, $team;
    public $editInProgress;

    public $idToSave, $itemId, $filename, $imagetitle, $saved, $itemType, $cardType;

    public $msgError, $codError;

    public $isOpen, $errors, $i, $files, $uploaded;

    public $confirmingItemDelete, $itemIdBeingRemoved, $onSaved;

    protected $rules = [
        'util_description' => 'nullable',
        'util_data'   => 'nullable',
        'util_code'   => 'nullable',
        'util_joint'  => 'nullable',
        'util_spec_1' => 'nullable',
        'util_spec_2' => 'nullable',
        'util_spec_3' => 'nullable',
        'util_spec_4' => 'nullable',
        'util_spec_5' => 'nullable',
    ];
    public function mount($id, Teams_item $item)
    {

        $this->itemId = $id;

        $this->team = '';
        $this->filename = '';
        $this->imagetitle = '';
        $this->cardType = 'file';
        $this->itemType = 'file';

        $this->current_team = Auth::user()->current_team;

        $this->item = Teams_item::find($this->itemId);
       // $this->items = $this->item;

        $this->user = Auth::user();

    }

    public function render()
    {

        $utility = Teams_item::find($this->itemId);

        $this->util_description = $utility->util_description;
        $this->util_code = $utility->util_code;
        $this->util_data = $utility->util_data;
        $this->util_joint = $utility->util_joint;
        $this->util_spec_1 = $utility->util_spec_1;
        $this->util_spec_2 = $utility->util_spec_2;
        $this->util_spec_3 = $utility->util_spec_3;
        $this->util_spec_4 = $utility->util_spec_4;
        $this->util_spec_5 = $utility->util_spec_5;

        $files = $utility->attachment_files()->get();

        //dd($files);

        $data = [
            'utility' => $utility,
            'attachments' => $files,
        ];


        return view('livewire.team-item-utility', $data);

    }
    public function store()
    {

        $this->validate();

        $newUtility = Teams_item::find($this->itemId);

        $newUtility->util_description = $this->util_description;
        $newUtility->util_code = $this->util_code;
        $newUtility->util_data = $this->util_data;
        $newUtility->util_joint =  $this->util_joint!=null ? $this->util_joint : 0;
        $newUtility->util_spec_1 = $this->util_spec_1;
        $newUtility->util_spec_2 = $this->util_spec_2;
        $newUtility->util_spec_3 = $this->util_spec_3;
        $newUtility->util_spec_4 = $this->util_spec_4;
        $newUtility->util_spec_5 = $this->util_spec_5;

        $newUtility->save();

        $this->emit('saved');
        redirect(url('dashboard/collection/item/utility/'. $this->itemId));

    }

    public function delete()
    {

        try {

            Utility_files::find($this->itemIdBeingRemoved)->delete();
            $this->render();
            $this->emit('deleted');
            $this->confirmingItemDelete = false;

            //return redirect(url('/dashboard/collection/item_edit/' . $this->utility->teams_items_id . 'utility/edit/'. $this->utilityID));


        } catch (Exception $e) {
            // Mostra un messaggio di errore personalizzato all'utente
            $this->emit('errore');
            $this->confirmingItemDelete = true;

        }

    }

    public function confirmItemRemoval($ToDeleteId)
    {
        $this->confirmingItemDelete = true;

        $this->itemIdBeingRemoved = $ToDeleteId;

        $this->onSaved = true;

    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->errors = null;
        $this->isOpen = false;
        $this->emit('refreshPage');

    }
    public function upload()
    {

        $this->resetErrorBag();

        if ($this->files) {

            if (is_array($this->files)) {

                $this->multyplayStore($this->files);

            } else {

                $this->singleStore($this->files);

            }

            $this->uploaded = true;

        }

        $this->closeModal();

    }

    public function singleStore($file)
    {

        if (FileHelper::fileAccepted($file)) {

            $this->i++;

            /*
             * path su cui salvare gli items
             *
             */
            $path = "file/" . Auth::id() . "/attachments/items/" . $this->item['team_id'] . "/utilities/" . $this->item['id'] . '/files';

            /*
             * si salva sul disco l'ID del file
             *
             */
            $file->store($path);

            $original_filename = $file->getClientOriginalName();

            //dd($original_filename);

            $crypt_filename = $this->my_simple_crypt($original_filename, 'e');

            /*
             * si recupera l'ID del file per poterlo in seguito salvare sul database
             *
             */
            $hash_filename = $file->hashName();

            /*
             * si crea un nuovo record nella tabella
             *
             */
            $teamItem = new Utility_files;

            /*
             * si scrive il numero progressivo per la posizione dell'item
             *
             */
            $teamItem->position = FileHelper::generate_position_number($this->item['id']);

            /*
             * table: utility_files
             * field: mime
             * si scrive il tipo di file che viene memorizzato
             *
             */

            $teamItem->file_mime = $file->getMimetype();

            /*
             * table: utility_files
             * field: item_utilities_id
             * chiave esterna per la relazione belong_to con la tabella item_utilities
             *
             */
            $teamItem->item_id = $this->item['id'];

            /*
             * table: utility_files
             * field: cript_filename
             * si utilizza per risalire al vero nome del file per mostrarlo nella scheda item
             *
             */
            $teamItem->cript_filename = '/' . $this->folderRoot() . "/" . $path . $crypt_filename;

            /*
             * table: utility_files
             * field: path_image
             * si utilizza quando serve leggere solamente la path
             *
             */
            $teamItem->path_image = '/' . $this->folderRoot() . "/" . $path; // solo il path

            /*
             * table: utility_files
             * field: hash_file
             * riferimento nel db per leggere il file dal disco
             *
             */
            $teamItem->hash_file = '/' . $this->folderRoot() . "/" . $path . '/' . $hash_filename;

            /*
             * table: utility_files
             * field: path_qrcode
             * si salva il file binario codificato in base 64
             *
             */
            // $teamItem->path_qrcode = $fileContent;

            $teamItem->save();
        }


    }

    public function multyplayStore($files)
    {

        foreach ($files as $file) {

            $this->singleStore($file);
        }

    }
}
