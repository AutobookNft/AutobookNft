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


 trait HasImageEconft
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
    public function updateCollectionEcoNftPhoto(UploadedFile $photo, $name_of_collection)
    {

        $user = Auth::id();
        $photo_path =  'file/' . $user . '/collections/' . $name_of_collection . '/head/to_ipfs';



        tap($this->path_image_econft, function ($previous) use ($photo, $photo_path) {

            $this->forceFill([
                'path_image_econft' => '/' . $this->folderRoot() .'/'. $photo->store($photo_path, ['disk' => $this->PathImageEconftDisk()]),
            ])->save();

            if ($previous) {
                Storage::disk($this->PathImageEconftDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deletePathImageEconft()
    {
        if (is_null($this->path_image_econft)) {
            return;
        }

        Storage::disk($this->PathImageEconftDisk())->delete($this->path_image_econft);

        $this->forceFill([
            'path_image_econft' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getPathEconftAttribute()
    {
        return $this->path_image_econft
                    ? Storage::url($this->path_image_econft)
                    : $this->defaultPathImageEconft();
    }

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultPathImageEconft()
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
    protected function PathImageEconftDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }


}
