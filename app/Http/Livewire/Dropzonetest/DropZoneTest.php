<?php

namespace App\Http\Livewire\Dropzonetest;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
use Dropzone;


class DropZoneTest extends Component
{

    use WithFileUploads;

    public $name;
    public $file;

    public function addFiles($file)
    {
        $this->file = $file;
    }

    public function store()
    {
        // $validatedData = $this->validate([

        //     'file*' => 'required|file|max:2048',
        // ]);

        // dd($this->file);

        foreach ($this->file as $file) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('images', $filename);
            $url = Storage::url($path);

            // Generate thumbnail
            $thumbnail = Image::make($file)->fit(100, 100)
                ->save(storage_path('app/public/thumbnails/' . $filename));
            $thumbnailUrl = Storage::url('public/thumbnails/' . $filename);

            // Save file information in the database
            // File::create([
            //     'name' => $filename,
            //     'path' => $path,
            //     'url' => $url,
            //     'thumbnail_path' => 'public/thumbnails/' . $filename,
            //     'thumbnail_url' => $thumbnailUrl,
            // ]);
        }

        // Reset form and files
        $this->reset(['files']);
        $this->file = [];
    }

    public function render()
    {
        return view('livewire.dropzonetest.drop-zone-test');
    }
}
