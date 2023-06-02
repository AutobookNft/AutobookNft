<?php

namespace App\Http\Livewire;

use App\Models\Drop;
use App\Models\Teams_item;
use Livewire\Component;

class DropCollection extends Component
{
    public $drop, $ongoingDrop, $items;
    public $title, $description, $date_start, $date_end, $drop_id, $ongoing;
    public $collectionDrop;

    public $fileCover, $imagefile, $imagetitle, $filename, $filetype, $filesize, $fileurl, $filepath, $fileextension, $filemime, $filehash, $fileoriginalname, $fileoriginalextension, $fileoriginalmime;
    public $isEdit = false, $dropSelect=false;

    public function mount($id)
    {
        $this->drop_id = $id;
        $this->drop = Drop::findOrFail($id);
    }

    public function render()
    {
        $this->collectionDrop = 'drop';
        
        $this->items = Teams_item::where('drop_id', $this->drop_id) // tutti gli item in drop
            ->orderBy('position', 'asc')
            ->get();
    


        $data= [
            'drop' => $this->drop,
            'items' => $this->items,
        ];

        return view('livewire.drop-collection', $data);
    }
}
