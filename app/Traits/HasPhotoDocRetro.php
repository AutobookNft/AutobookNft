<?php

namespace App\Traits;

use App\Models\Team;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Livewire\WithFileUploads;
use App\Traits\HasUtilitys;

trait  HasPhotoDocRetro
{

    use WithFileUploads;
    use HasUtilitys;

    private $saved = false;

    /**
     * Update the user's profile photo.
     *
     * @param array
     * @param string
     * @return void
     */
    public function  uploadPhotoDocRetro(UploadedFile $photo):bool
    {

        $user = Auth::id();
        $photo_path =  'file/' . $user . '/profile/doc/retro' ;
        $filename = $photo->getClientOriginalName();
        $filename = $this->my_simple_crypt($filename, 'e');

        tap($this->doc_photo_path_r, function ($previous) use ($photo, $photo_path, $filename) {

            $this->forceFill([
                'doc_photo_path_r' => '/' . $this->folderRoot() .'/'. $photo->storeAs($photo_path, $filename),
            ]);

            if ($previous) {
                Storage::disk($this->PhotoDocRetroDisk())->delete($previous);
            }
        });

        // Salva l'oggetto nel database
        $saved = $this->save();

        // Ricarica l'oggetto dal database
        $fresh = $this->fresh();

        // Verifica se il valore del campo doc_photo_path_f è uguale a quello che hai appena inserito
        return $fresh->doc_photo_path_r == $this->doc_photo_path_r;


    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deletePhotoDocRetro()
    {
        if (is_null($this->doc_photo_path_r)) {
            return;
        }

        Storage::disk($this->PhotoDocRetroDisk())->delete($this->doc_photo_path_r);

        $this->forceFill([
            'doc_photo_path_r' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getPhotoDocRetroAttribute()
    {

        $filename = $this->my_simple_crypt(Storage::url($this->doc_photo_path_r), 'd');

        return $this->doc_photo_path_r
            ? $filename
            : $this->defaultPhotoFrontDoc();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function  defaultPhotoDocRetro()
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function  PhotoDocRetroDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }


}
