<?php

namespace App\Traits;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
use Livewire\Request;
use Livewire\WithFileUploads;
use App\Traits\HasUtilitys;

trait HasImageItem
{

    use WithFileUploads;
    use HasUtilitys;
    use HasDefProfilePhotoDisk;
    use HasDefImage;


    /**
     * Update the user's profile photo.
     *
     * @param array
     * @param string
     * @return void
     */
    public function updateCollectionItem(UploadedFile $photo, $collection_id)
    {

        $user = Auth::id();
        $photo_path =  'image/' . $user . '/collections/' . $collection_id .'/items' ;
        $filename = $photo->getClientOriginalName();
        $filename = $this->my_simple_crypt($filename, 'e');

        tap($this->path_image, function ($previous) use ($photo, $photo_path, $filename) {

            $this->forceFill([
                'path_image' => '/' . $this->folderRoot() .'/'. $photo->storeAS($photo_path, $filename),
            ])->save();

            if ($previous) {
                Storage::disk($this->defProfilePhotoDisk())->delete($previous);
            }
        });
    }

    /**
     * Delete the user's profile photo.
     *
     * @return void
     */
    public function deleteImageItem()
    {
        if (is_null($this->path_image)) {
            return;
        }

        Storage::disk($this->defProfilePhotoDisk())->delete($this->path_image);

        $this->forceFill([
            'path_image' => null,
        ])->save();
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getItemAttribute()
    {

        return $this->path_item
            ? $this->my_simple_crypt($this->path_image, 'd')
            : '';

    }

}
