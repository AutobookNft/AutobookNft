<?php

namespace App\Http\Livewire\Collections;

use App\Models\Drop;
use Imagick;

use App\Models\Team;
use App\Models\Teams_item;

use App\Util\FileHelper;
use App\Traits\HasUtilitys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\S3\Transfer;
use Livewire\TemporaryUploadedFile;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Http\UploadedFile;
use Livewire\Livewire;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;

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

    public $acceptedTypes, $epp_name, $filename, $filetype, $imagetitle, $amountItems, $floorPrice, $original_filename;

    public $qtaDuplicateEconft, $collectionProtocolType;

    public $screenWidth, $screenHeight;

    public $collectionType, $collectionDrop, $itemChoseInSelectforBind;

    public $teamItem, $current_team, $state, $drop;

    public $itemId, $teamId, $name, $itemType, $cardType, $saved, $dropTitle;

    public $fileCover, $fileMedia, $haveUtilities, $haveWallet, $currentDownload=1, $upload_id;

    public $progress, $totalFiles, $step_precess, $udm;

    public $uploading = false;
    public $currentFileName;

    public function mount()
    {

        $team = Auth::user()->currentTeam;

        $this->progress=0;
        $this->totalFiles=1;
        $this->step_precess='';
        $this->udm=0;
        $this->currentFileName=null;

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

        $data = Cache::remember('items-' . $team->id, 3600, function () use ($team) {
            if (isset($team->epp)) {
                $epp = $team->epp;
                if ($epp) {
                    $this->epp_name = '<=>' . $epp->org_name;
                } else {
                    $this->epp_name = '';
                }
            }

            $this->teamId = auth()->user()->currentTeam->id;

            $items = Teams_item::where('team_id', $this->teamId)
                ->where('bind', 0)
                ->orderBy('position', 'asc')
                ->get();

            return [
                'team' => $team,
                'items' => $items,
                'drop' => $this->drop,
                'droptitle' => $this->dropTitle,
            ];
        });

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

        $this->uploading = true;
        // Crea una nuova istanza del client S3
        $do = new S3Client([
            'version' => 'latest',
            'region' => env('DO_DEFAULT_REGION'),
            'endpoint' => env('DO_ENDPOINT'),
            'credentials' => [
            'key' => env('DO_ACCESS_KEY_ID'),
            'secret' => env('DO_SECRET_ACCESS_KEY'),
            ],
        ]);

        $path = env('BUCKET_ROOT_FILE_FOLDER') . Auth::id() . "/collections/" . $this->teamId . "/items";
        $path_image = env('BUCKET_ROOT_FILE_FOLDER') . Auth::id() . "/collections/" . $this->teamId . "/items";

        $this->resetErrorBag();

        // devo creare un id dell'upload, per poter trovare tutti i record a cui vanno aggiunte le thumbnail e il file webp
        $this->upload_id = sha1(uniqid());

        if ($this->files) {

            // counts how many items are in $files
            $this->totalFiles=count($this->files);

            $this->udm=(1 / $this->totalFiles)*100; // creo il valore di incremento per la progress bar (la quale non funziona...ahahaha) ..per ora

            $file=$this->files;
            $this->multyplayStore($file, $do, $path_image);

            // qui incremento la progress bar ma lo faccio a step, per ora.
            // In quanto la progressione durante il salvataggio non funziona
            // a dire il vero non funziona neanche così, ma almeno si vede che sta facendo qualcosa... uhg! :(

            // $this->progress=1;
            // $this->convert_in_webp($do, $path_image);

            // $this->progress=2;
            // $this->store_thumbnails();

            $this->progress=3;

            $this->uploaded = true;

            $this->uploading = false;

        }

        if (!$this->file_not_accepted) {
            $this->closeModal();
        }

    }

    public function multyplayStore($files, $do, $path_image){

        foreach ($files as $file) {

            $this->singleStore($file, $do, $path_image);
            $this->emit('fileUploaded', $this->currentFileName);

        }

    }

    public function s3Store($do, $hash_filename, $file, $path_image, $tempPath){


        // Carica il file su DigitalOcean Spaces
        $result = $do->putObject([
            'Bucket' => env('DO_BUCKET'),
            'Key' => $path_image ."/". $hash_filename,
            'SourceFile' => $tempPath,
            'ACL' => 'public-read',
        ]);

        // Controlla se il caricamento del file è avvenuto con successo
        if ($result['@metadata']['statusCode'] === 200) {
            // Il file è stato caricato correttamente
            return $result['ObjectURL'];

        } else {
            // Si è verificato un errore durante il caricamento del file su DigitalOcean Spaces
            // Gestisci l'errore di conseguenza
            $this->file_not_accepted = true;
            $this->addError('file', 'Si è verificato un errore durante il caricamento del file.');
        }
    }

    public function singleStore($file, $do, $path_image)
    {

        $allowedTypes = config('AllowedFileType.collection.allowed');
        $maxSize = config('AllowedFileType.collection.max_size');

        $validator = Validator::make(
            ['file' => $file],
            ['file' => 'file|mimes:' . implode(',', array_keys($allowedTypes)) . '|max:' . $maxSize]
        );

        if ($file instanceof TemporaryUploadedFile) {
            $tempPath = $file->getRealPath();
        } else {
            $tempPath = $file->getPathname();
        }

        if ($validator->fails()) {

            $this->file_not_accepted = true;
            $this->addError('file', $validator->errors()->first('file'));

        } else {

            $this->i++;

            $hash_filename = $file->hashName();

            // Memorizza il file su S3
            $url=$this->s3Store($do, $hash_filename, $file, $path_image, $tempPath);

            // Recupero l'hash name del file
            $hash_filename = $file->hashName();

            // Recupero la sola estensione del file
            $extention = $file->extension();

            // Recupero il nome del file orginale (mi serve per criptarlo)
            $original_filename = $file->getClientOriginalName();

            // rendo pubblico il nome del file per visualizzarlo in realtime nella vista
            $this->currentFileName = $original_filename;
            // Cripto il noome originale del file
            $crypt_filename = $this->my_simple_crypt($original_filename, 'e');

            // Creo un nuovo record
            $teamItem = new Teams_item;

            // Scrittura del token identificaivo del creator dell'item
            $teamItem->creator=$this->current_team->creator;

            // scrivo un id di questo upload, mi serve per recuperare i record per la conversione
            $teamItem->upload_id=$this->upload_id;

            // Scrivo l'estensione del file
            $teamItem->extention = $extention;

            // Scrivo l'hash file
            $teamItem->hash_file_name =  $hash_filename;

            // Recupero la tipologia del file: image, audio, ecc, ecc
            $filetype = $allowedTypes[$file->getClientOriginalExtension()];

            // eseguo la conversione in webp solo se si trata di un immagine
            if ($filetype=='image'){
                $file_cover=$this->convert_in_webp($do, $path_image, $url, $hash_filename, $filetype, $tempPath, $teamItem);
            }

            // gestione cover di default nel caso di file audio
            if ($filetype == 'audio') {

                // scrivo la cover di default
                $teamItem->file_cover = env('DEFAULT_COVER');

            } else {

                // scrivo la cover vera e propria
                $teamItem->file_cover = env('BUCKET_PATH_FILE_FOLDER') .'/'. $file_cover;
            }

            // Genero il numero crescente della posizione
            $num = FileHelper::generate_position_number($this->teamId);
            $teamItem->position = $num;

            // gestione del nome di default
            $hex = str_pad($num, 4, "0", STR_PAD_LEFT);
            $numero_casuale = str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT);
            $teamItem->title = '#' . $numero_casuale . $hex;

            $teamItem->team_id = $this->teamId;

            $teamItem->cript_filename = env('BUCKET_PATH_FILE_FOLDER') . '/' . $crypt_filename;

            $teamItem->path_image = $path_image;

            $teamItem->path_absolute = $url; // il path assoluto dell'immagine

            // Scrivo nel record la tipologia del file: image, audio, ecc, ecc
            $teamItem->type = $filetype;

            $teamItem->bind = 0;

            $teamItem->price = $this->floorPrice; // se non è stato inserito nessun floor price di default scriverà 0

            $teamItem->hash_file = $url;
            $teamItem->show = true;

            $teamItem->save();

            /*
                questo serve per forzare il recupero dei dati anziché l'ultilizzo
                di quelli in cache...
            */
            $team = Auth::user()->currentTeam;
            Cache::forget('items-' . $team->id);

        }

    }

    public function convert_in_webp($do, $path_image, $url, $hash_file_name, $filetype, $tempPath, $item)
    {

        // $tempPath = è il file all'interno della cartella temporanea
        // $url
        // $file_input = $item->path_absolute . '/' . $item->hash_file_name;
        $file_input = $url;

        $filenameWithoutExtension = pathinfo($hash_file_name, PATHINFO_FILENAME);

        // $newName = Str::random(40) . '.webp';
        $newName = $filenameWithoutExtension . '.webp';

        // compongo il nuovo nome del file webp
        $file_output = $path_image . "/" . $newName;
        // dd($file_output);

        // creo l'istanza dell'oggetto Imagick
        $imagick = new Imagick($file_input);
        // dd($imagick->getImageFormat());

        // Ottieni le dimensioni attuali dell'immagine
        $width = $imagick->getImageWidth();
        $height = $imagick->getImageHeight();

        // Calcola le nuove dimensioni ridotte del 50%
        $newWidth = $width * 0.5;
        $newHeight = $height * 0.5;

        // Ridimensiona l'immagine alle nuove dimensioni
        $imagick->resizeImage($newWidth, $newHeight, Imagick::FILTER_LANCZOS, 1);

        switch ($imagick->getImageFormat()) {
            case 'JPEG':

                $imagick->setImageFormat('WEBP');
                $imagick->setOption('webp:lossless', 'false');
                $imagick->setOption('webp:method', '6');
                $imagick->setOption('webp:alpha-quality', '30');
                $imagick->writeImage($tempPath);
                break;

            case 'PNG':
                $imagick->setImageFormat('WEBP');
                $imagick->setOption('webp:lossless', 'true');
                $imagick->setOption('webp:method', '6');
                $imagick->writeImage($tempPath);
                break;

            case 'GIF':
                $imagick = $imagick->coalesceImages();
                do {
                    $imagick->setImageFormat('WEBP');
                    $imagick->setOption('webp:lossless', 'false');
                    $imagick->setOption('webp:method', '6');
                    $imagick->setOption('webp:alpha-quality', '30');
                    $imagick->writeImage($tempPath);
                } while ($imagick->nextImage());
                break;

            case 'BMP':
                $imagick->setImageFormat('WEBP');
                $imagick->setOption('webp:lossless', 'false');
                $imagick->setOption('webp:method', '6');
                $imagick->setOption('webp:alpha-quality', '30');
                $imagick->writeImage($tempPath);
                break;

            case 'TIFF':
                $imagick = $imagick->coalesceImages();
                do {
                    $imagick->setImageFormat('WEBP');
                    $imagick->setOption('webp:lossless', 'false');
                    $imagick->setOption('webp:method', '6');
                    $imagick->setOption('webp:alpha-quality', '30');
                    $imagick->writeImage($tempPath);
                } while ($imagick->nextImage());
                break;

            default:
                // non c'è corrispondenza tra le estensioni previste e quella del file, non si può convertire in WebP
                break;
        }

        $imagick->clear();
        $imagick->destroy();

        // $immagine = Image::make($file_input);
        // $immagine->resize($immagine->getWidth() / 2, $immagine->getHeight() / 2)->save($tempPath);
        // $this->storeWebp($tempPath, $file_output, $do);

        $result = $do->putObject([
            'Bucket' => env('DO_BUCKET'),
            'Key' => $file_output,
            'SourceFile' => $tempPath,
            'ACL' => 'public-read',
        ]);

        // Rimuovo il file da: storage/app/livewire-tmp
        unlink($tempPath);

        $path_image = $path_image . "/" . $newName;
        //$this->progress += $this->udm;

        // salvo i dati del file e del percorso nel database
        $item->update(['webp'=> env('BUCKET_PATH_FILE_FOLDER') . "/" . $file_output]);
        $item->update(['webp_filename'=> $newName]);
        $item->update(['extention'=> 'webp']);

        return $file_output;
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

public function getCurrentFileName()
{
    return response()->json(['currentFileName' => $this->currentFileName]);
}

}
