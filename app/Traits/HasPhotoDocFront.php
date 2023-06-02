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

trait  HasPhotoDocFront
{

    use WithFileUploads;
    use HasUtilitys;

    /**
     * Update the user's profile photo.
     *
     * @param array
     * @param string
     * @return void
     */
    public function  uploadPhotoDocFront(UploadedFile $photo):bool
    {

        $user = Auth::id();

        $photo_path =  'file/' . $user . '/profile/doc/front' ;

        $filename = $photo->getClientOriginalName();

        $filename = $this->my_simple_crypt($filename, 'e');

        $file_decr = $this->my_simple_crypt($filename, 'd');

        tap($this->doc_photo_path_f, function ($previous) use ($photo, $photo_path, $filename) {

            $this->forceFill([
                'doc_photo_path_f' => '/' . $this->folderRoot() .'/'. $photo->storeAs($photo_path, $filename),
            ]);

            if ($previous) {
                Storage::disk($this->PhotoDocFrontDisk())->delete($previous);
            }
        });

        // Salva l'oggetto nel database
        $saved = $this->save();

        // Ricarica l'oggetto dal database
        $fresh = $this->fresh();

        // Verifica se il valore del campo doc_photo_path_f è uguale a quello appena inserito
        return $fresh->doc_photo_path_f == $this->doc_photo_path_f;

    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deletePhotoDocFront()
    {
        if (is_null($this->doc_photo_path_f)) {
            return;
        }

        //$photo_doc_front = null;

        Storage::disk($this->PhotoDocFrontDisk())->delete($this->doc_photo_path_f);

        $this->forceFill([
            'doc_photo_path_f' => null,
        ])->save();
    }


    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getPhotoDocFrontAttribute()
    {

        $filename = $this->my_simple_crypt(Storage::url($this->doc_photo_path_f), 'd');

        return $this->doc_photo_path_f
                    ? $filename
                    : $this->defaultPhotoFrontDoc();
    }


    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function  defaultPhotoFrontDoc()
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
    protected function PhotoDocFrontDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }




}
