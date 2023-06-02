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


trait  HasPhotoDoc
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
    public function  updatePhotoDocument(UploadedFile $photo)
    {

        $user = Auth::id();
        $photo_path =  'file/' . $user . '/profile/doc/' ;

        tap($this->doc_photo_path_f, function ($previous) use ($photo, $photo_path) {

            $this->forceFill([
                'doc_photo_path_f' => '/' . $this->folderRoot() .'/'. $photo->store($photo_path, ['disk' => $this->PhotoDocFrontDisk()]),
            ])->save();

            if ($previous) {
                Storage::disk($this->PhotoDocFrontDisk())->delete($previous);
            }
        });
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

        return $this->doc_photo_path_f
                    ? Storage::url($this->doc_photo_path_f)
                    : $this->defaultPhotoDocFront();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function  defaultPhotoDocFront()
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
