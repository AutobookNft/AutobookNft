<?php

namespace App\Http\Livewire\Collections;

use App\Models\Team_utility_files;
use App\Util\FileHelper;
use App\Traits\HasUtilitys;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Exception;

class CollectionUtilityUpdate extends Component
{

    use WithPagination;
    use WithFileUploads;
    use HasUtilitys;

    public $util_description, $util_date, $util_code, $util_joint, $util_spec_1, $util_spec_2, $util_spec_3, $util_spec_4, $util_spec_5;

    public $itemId, $teamId;
    public $user;
    public $state = [], $team;

    public $current_team, $utility;

    public $idToSave, $filename, $imagetitle, $saved, $itemType, $cardType;

    public $collectionUtility, $itemIdBeingRemoved, $confirmingItemDelete;

    public $msgError, $codError, $errors, $isOpen, $uploaded, $i, $files, $onSaved;

    protected $rules = [
        'util_description'   => 'nullable',
        'util_code'     => 'nullable',
        'util_date'     => 'nullable',
        'util_joint'    => 'nullable',
        'util_spec_1'   => 'nullable',
        'util_spec_2'   => 'nullable',
        'util_spec_3'   => 'nullable',
        'util_spec_4'   => 'nullable',
        'util_spec_5'   => 'nullable',
    ];

    public function mount(){

        $this->user= Auth::user();

        $this->team = '';
        $this->filename = '';
        $this->imagetitle = '';
        $this->cardType = 'file';
        $this->itemType = 'image';


        $this->current_team = Auth::user()->currentTeam;

        $this->utility = $this->current_team;

        $this->teamId = $this->current_team->id;

    }

    public function render()
    {

        $this->util_description = $this->utility->util_description;
        $this->util_code = $this->utility->util_code;
        $this->util_date = $this->utility->util_date;
        $this->util_joint = $this->utility->util_joint;
        $this->util_spec_1 = $this->utility->util_spec_1;
        $this->util_spec_2 = $this->utility->util_spec_2;
        $this->util_spec_3 = $this->utility->util_spec_3;
        $this->util_spec_4 = $this->utility->util_spec_4;
        $this->util_spec_5 = $this->utility->util_spec_5;

        $files = $this->utility->attachment_files()->get();

        $data = [
            'utility' => $this->utility,
            'attachments' => $files,
        ];

        return view('livewire.collections.collection-utility-update', $data);
    }

    public function store()
    {

        $this->validate();


        try {

            $this->utility->util_description = $this->util_description;
            $this->utility->util_code = $this->util_code;
            $this->utility->util_data = $this->util_date;
            $this->utility->util_joint = $this->util_joint;
            $this->utility->util_spec_1 = $this->util_spec_1;
            $this->utility->util_spec_2 = $this->util_spec_2;
            $this->utility->util_spec_3 = $this->util_spec_3;
            $this->utility->util_spec_4 = $this->util_spec_4;
            $this->utility->util_spec_5 = $this->util_spec_5;
            $this->utility->save();
            $this->emit('saved');
            redirect(url('dashboard/collection/utilities/update'));

        } catch (\Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }

public function delete()
    {

        try {

            Team_utility_files::find($this->itemIdBeingRemoved)->delete();
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

    public function startModal()
    {

        $this->openModal();
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

    public function singleStore($file)
    {

        if (FileHelper::fileAccepted($file)) {

            $this->i++;

            /*
             * path su cui salvare gli items
             *
             */
            $path = "file/" . Auth::id() . "/attachments/collection/" . $this->teamId . "/utilities/files";

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
            $teamItem = new Team_utility_files;

            /*
             * si scrive il numero progressivo per la posizione dell'item
             *
             */
            $teamItem->position = FileHelper::generate_position_number($this->teamId);

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
            $teamItem->team_util_id = $this->teamId;

            /*
             * table: utility_files
             * field: cript_filename
             * si utilizza per risalire al vero nome del file per mostrarlo nella scheda item
             *
             */
            $teamItem->cript_filename = '/' . $this->folderRoot() . "/" . $path . $crypt_filename;

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

