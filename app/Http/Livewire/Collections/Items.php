<?php

namespace App\Http\Livewire\Collections;

use App\Models\Drop;
use Imagick;

use App\Models\Team;
use App\Models\Teams_item;

use App\Support\FileHelper;
use App\Traits\HasUtilitys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;

use Session;

class Items extends Component
{
    use WithPagination;
    use WithFileUploads;
    use HasUtilitys;

    public $files = [], $selectedItems = [];
    public $invalidFiles = [];

    public $isOpen = False, $close=false, $file_not_accepted=false;
    public $i=0;
    public $errors = [], $error;

    public $uploaded = false, $updatingFile;

    public $acceptedTypes, $epp_name, $filename, $filetypo, $imagetitle, $amountItems, $floorPrice, $original_filename;

    public $qtaDuplicateEconft, $collectionProtocolType;

    public $screenWidth, $screenHeight;

    public $collectionType, $collectionDrop, $itemChoseInSelectforBind;

    public $teamItem, $current_team, $state, $drop;

    public $itemId, $teamId, $name, $itemType, $cardType, $saved, $dropTitle;

    public $fileCover, $fileMedia, $haveUtilities, $haveWallet, $currentDownload=1, $upload_id;

    public $progress, $totalFiles, $step_precess, $udm;

    public function mount()
    {

        $team = Auth::user()->currentTeam;

        $this->progress=0;
        $this->totalFiles=1;
        $this->step_precess='';
        $this->udm=0;

        $this->current_team = $team;

        $this->drop = Drop::where('ongoing', true)->get()->first();

        if ($this->drop) {
            $this->dropTitle = $this->drop->title;
        } else {
            $this->dropTitle = '';
        }

        $this->teamId = $this->current_team->id;

        $this->floorPrice = $this->current_team->floor_price ? $this->current_team->floor_price : 0;

        $this->qtaDuplicateEconft = $team->econft_number ? $team->econft_number : 0;

        $this->amountItems = $team->teams_item()->count();

        //$this->haveUtilities = $team->teams_utility()->count();

        $this->haveWallet = $team->teams_wallet()->count();

      //  $this->teamItem = Teams_item::findOrFail($this->I);

      //  $this->state = $this->teamItem->withoutRelations()->toArray();

        $this->collectionProtocolType = $team->different ? 'different' : 'duplicate';

        $this->screenHeight=null;

        $this->screenWidth=null;
        $this->saved = false;

        $this->cardType = 'show';

    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->updatingFile = false;
    }

    public function render()
    {

        $team = Auth::user()->currentTeam;

        if (isset($team->epp)) {

            $epp = $team->epp;

            if ($epp) {
                $this->epp_name = '<=>' . $epp->org_name;
            } else {
                $this->epp_name = '';
            }

        }

        // $this->acceptedTypes = FileHelper::getAcceptedFileTypes('images');
        // $this->selectCollectiontype($this->current_team->type);

        $this->teamId = auth()->user()->currentTeam->id;

        // $items = Teams_item::where('team_id', $this->teamId)
        //     ->where('bind', 0)
        //     ->where(function ($query) {
        //         $query->where('extention','webp')
        //               ->orWhere('type', '<>', 'image');
        //     })
        //     ->orderBy('position', 'asc')
        //     ->get();

        $items = Teams_item::where('team_id', $this->teamId)
            ->where('bind', 0)
            ->orderBy('position', 'asc')
            ->get();
        // dd($items);

        $data = [

            'team'=>$team,
            'items' => $items,
            'drop' => $this->drop,
            'droptitle' => $this->dropTitle,

        ];

        return view('livewire.collections.items-upload', $data);
    }

    public function bind()
    {

        /* fileCover contiene l'hash file di cui è stato fatto lo store()
         *  lo devo salvare per poterlo scrivere nella tabella quando viene fatto
         *  il salvataggio
         */
        // $this->fileMedia = $this->fileCover;

        /*
         *  gestisco l'anteprima dell'immagine e preparo la variabile per
         *  scrivere il suo contenuto nella tabella al salvataggio
         */
        $this->fileCover = $this->state['filecover'];

        $this->itemChoseInSelectforBind=$this->item->where('file_cover', $this->fileCover)->id;

        //dd($this->itemChoseInSelectforBind);

        /*
         *  grazie allo script Javasrcipt presente nella vista
         *  con questa emit, posso visualizzare l'anteprima dell'immagine sull'item
         */
        $this->emit('fileCoverChanged');

    }

    public function upload()
    {

        $this->resetErrorBag();

        // devo creare un id dell'upload, per poter trovare tutti i record a cui vanno aggiunte le thumbnail e il file webp
        $this->upload_id = sha1(uniqid());

        //dd($this->files);

        if ($this->files) {

            // counts how many items are in $files
            $this->totalFiles=count($this->files);

            //dd($this->totalFiles);

            $this->udm=(1 / $this->totalFiles)*100; // creo il valore di incremento per la progress bar (la quale non funziona...ahahaha) ..per ora

            $file=$this->files;
            $this->multyplayStore($file);

            // qui incremento la progress bar ma lo faccio a step, per ora.
            // In quanto la progressione durante il salvataggio non funziona
            // a dire il vero non funziona neanche così, ma almeno si vede che sta facendo qualcosa... uhg! :(

            $this->progress=1;
            $this->convert_in_webp();

            $this->progress=2;
            $this->store_thumbnails();

            $this->progress=3;

            $this->uploaded = true;

        }

        if (!$this->file_not_accepted) {
            $this->closeModal();
        }

    }

    public function multyplayStore($files){

        foreach ($files as $file) {

            $this->singleStore($file);
        }

    }

    public function singleStore($file)
    {

        $allowedTypes = config('AllowedFileType.collection.allowed');
        $maxSize = config('AllowedFileType.collection.max_size');

        $validator = Validator::make(
            ['file' => $file],
            ['file' => 'file|mimes:' . implode(',', array_keys($allowedTypes)) . '|max:' . $maxSize]
        );

        if ($validator->fails()) {

            $this->file_not_accepted = true;
            $this->addError('file', $validator->errors()->first('file'));

        } else {

            $this->i++;

            $path = "file/" . Auth::id() . "/collections/" . $this->teamId . "/items";

            $file->store($path);

            $hash_filename = $file->hashName();

            $extention = $file->extension();

            $absolutePath= public_path('storage/'. $path);

            $original_filename = $file->getClientOriginalName();

            $crypt_filename = $this->my_simple_crypt($original_filename, 'e');

            $teamItem = new Teams_item;

            // scrittura del token identificaivo del creator dell'item
            $teamItem->creator=$this->current_team->creator;

            $teamItem->upload_id=$this->upload_id;

            // dd($this->upload_id);

            $teamItem->extention = $extention;

            $teamItem->hash_file_name =  $hash_filename;

            $filetypo = $allowedTypes[$file->getClientOriginalExtension()];

            // gestione cover di default nel caso di file audio
            if ($filetypo == 'audio') {

                $teamItem->file_cover = '/storage/images/default/logo_t.webp';

            } else {

                $teamItem->file_cover = '/' . $this->folderRoot() . "/" . $path . '/' . $hash_filename;

            }

            $num = FileHelper::generate_position_number($this->teamId);
            $teamItem->position = $num;

            // gestione del nome di default
            $hex = str_pad($num, 4, "0", STR_PAD_LEFT);
            $numero_casuale = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $teamItem->title = '#' . $numero_casuale . $hex;

            $teamItem->team_id = $this->teamId;

            $teamItem->cript_filename = '/' . $this->folderRoot() . "/" . $path . '/' . $crypt_filename;

            $teamItem->path_image = '/' . $this->folderRoot() . "/" . $path;

            $teamItem->path_absolute    = $absolutePath; // il path assoluto dell'immagine

            $teamItem->type = $filetypo;

            $teamItem->bind = 0;

            $teamItem->price = $this->floorPrice; // se non è stato inserito nessun floor price di default scriverà 0

            $teamItem->hash_file = '/' . $this->folderRoot() . "/" . $path . '/' . $hash_filename;

            $teamItem->show = true;

            $teamItem->save();

        }

    }

    public function convert_in_webp(){

        $items = Teams_item::where('upload_id', $this->upload_id)->get();

        $this->step_precess=__('conversione in webp');

        foreach ($items as $item) {

            if ($item->type!='image') {
                continue;
            }

            $file_input = $item->path_absolute . '/' . $item->hash_file_name;

            $filenameWithoutExtension = pathinfo($item->hash_file_name, PATHINFO_FILENAME);

            // $newName = Str::random(40) . '.webp';

            $newName = $filenameWithoutExtension . '.webp';

            $file_output = $item->path_absolute . "/" . $newName;

            $imagick = new Imagick($file_input);

            switch ($imagick->getImageFormat()) {
                case 'JPEG':
                    $imagick->setImageFormat('WEBP');
                    $imagick->setOption('webp:lossless', 'false');
                    $imagick->setOption('webp:method', '6');
                    $imagick->setOption('webp:alpha-quality', '30');
                    $imagick->writeImage($file_output);
                    break;
                case 'PNG':
                    $imagick->setImageFormat('WEBP');
                    $imagick->setOption('webp:lossless', 'true');
                    $imagick->setOption('webp:method', '6');
                    $imagick->writeImage($file_output);
                    break;
                case 'GIF':
                    $imagick = $imagick->coalesceImages();
                    do {
                        $imagick->setImageFormat('WEBP');
                        $imagick->setOption('webp:lossless', 'false');
                        $imagick->setOption('webp:method', '6');
                        $imagick->setOption('webp:alpha-quality', '30');
                        $imagick->writeImage($file_output);
                    } while ($imagick->nextImage());
                    break;
                case 'BMP':
                    $imagick->setImageFormat('WEBP');
                    $imagick->setOption('webp:lossless', 'false');
                    $imagick->setOption('webp:method', '6');
                    $imagick->setOption('webp:alpha-quality', '30');
                    $imagick->writeImage($file_output);
                    break;
                case 'TIFF':
                    $imagick = $imagick->coalesceImages();
                    do {
                        $imagick->setImageFormat('WEBP');
                        $imagick->setOption('webp:lossless', 'false');
                        $imagick->setOption('webp:method', '6');
                        $imagick->setOption('webp:alpha-quality', '30');
                        $imagick->writeImage($file_output);
                    } while ($imagick->nextImage());
                    break;
                default:
                // non c'è corrispondenza tra le estensioni previste e quella del file, non si può convertire in WebP
                break;
            }

        $imagick->clear();
        $imagick->destroy();

        $path_image = $item->path_image . "/" . $newName;
        //$this->progress += $this->udm;


        $item->update(['webp'=> $path_image]);
        $item->update(['webp_filename'=> $newName]);
        $item->update(['extention'=> 'webp']);
        //$this->emitSelf('refresh');
        }
    }

    public function store_thumbnails(){

        $items = Teams_item::where('upload_id', $this->upload_id)->get();
        $this->step_precess=__('creazione thumbnails');

        foreach ($items as $item){

            if ($item->type!='image') {
                continue;
            }

            $file_input = $item->path_absolute . '/' . $item->webp_filename;

            $filenameWithoutExtension = pathinfo($item->webp_filename, PATHINFO_FILENAME);

            //$thumbnail_name = str::random(40) . '.webp';

            $thumbnail_name = $filenameWithoutExtension . '.webp';

            $file_output = $item->path_absolute . '/thumb/' . $thumbnail_name;

            if (!file_exists(dirname($file_output))) {
                mkdir(dirname($file_output), 0755, true);
            }

            // Creazione dell'oggetto Imagick per il file di input
            $imagick = new Imagick();
            $imagick->readImage($file_input);
            $imagick->cropThumbnailImage(100, 100);
            $imagick->writeImage($file_output);
            $imagick->clear();

            // Aggiorna il campo thumbnail del record del team item
            $item->thumbnail = $item->path_image . '/thumb/' . $thumbnail_name;
            $item->extention = 'webp';

            $item->save();

            //$this->progress+=$this->udm;
            //$this->emitSelf('refresh');
        }
    }


    public function listenForTeamIdSelected($teamId)
    {
         // Gestisci l'invio del valore del modello $teamId dalla finestra modale
    }


    public function edit($id)
    {
        // $post = Post::with('tags')->findOrFail($id);

        // $this->post_id = $id;
        // $this->title = $post->title;
        // $this->content = $post->content;
        // $this->category = $post->category_id;
        // $this->tagids = $post->tags->pluck('id');

        $this->openModal();
    }

    public function create()
    {

       // $this->resetInputFields();
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
        $this->close=true;
        $this->emit('refreshPage');

    }

    public $confirmingDrop = false;

    public function confirmDrop()
    {
        $this->confirmingDrop = true;
    }

    public function cancelDrop()
    {
        $this->confirmingDrop = false;
    }

    public function drop()
    {

    $drop_id = $this->drop->id;


    // Assegna gli item selezionati alla drop
    foreach ($this->selectedItems as $itemId) {


        $item = Teams_item::find($itemId);
        if ($item) {
            $item->update(['drop_id' => $drop_id]);
        }
    }

    // Resetta la selezione degli item
    $this->selectedItems = [];
    $this->emit('refreshPage');
    $this->confirmingDrop = false;
}

}
