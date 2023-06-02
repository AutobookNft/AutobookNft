<?php

namespace App\Http\Livewire;

use App\Models\Teams_item;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\Team;
use Livewire\Component;
use App\Models\Drop;

class DropCrud extends Component
{
    public $drops, $ongoingDrop, $items;
    public $title, $description, $date_start, $date_end, $drop_id, $ongoing;
    public $collectionDrop;

    public $fileCover, $imagefile, $imagetitle, $filename, $filetype, $filesize, $fileurl, $filepath, $fileextension, $filemime, $filehash, $fileoriginalname, $fileoriginalextension, $fileoriginalmime;
    public $isEdit = false, $dropSelect=false;

    public function render()
    {
        $this->drops = Drop::all(); // tutte le drops
        
        $data= [
            'drops' => $this->drops,

        ];

        return view('livewire.drop-crud', $data);
    }

    public function create()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'ongoing' => 'required',
        ]);

        $validatedData['user_id'] = Auth::id();

        Drop::create($validatedData);
        session()->flash('message', 'Drop created successfully.');
    }

    public function edit($id)
    {
          
        $this->isEdit = true;
        
        $drop = Drop::findOrFail($id);
        $this->drop_id = $id;
        $this->title = $drop->title;
        $this->description = $drop->description;
        $this->ongoing = $drop->ongoing;
        $this->date_start = date('Y-m-d', strtotime($drop->date_start));         
        $this->date_end = date('Y-m-d', strtotime($drop->date_end));

    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'ongoing' => 'required',
        ]);

        if ($this->drop_id) {
            $drop = Drop::find($this->drop_id);
            $drop->update($validatedData);
            session()->flash('message', 'Drop updated successfully.');
        }

        $this->isEdit = false;
    }

    public function delete($id)
    {
        $drop = Drop::findOrFail($id);
        $drop->delete();
        session()->flash('message', 'Drop deleted successfully.');
    }


    public function dropSelect($id)
    {
        $this->dropSelect = true;
        $this->drop_id = $id;
        $this->emit('refreshPage');
        
    }

    public function dropSelectCancel()
    {
        $this->dropSelect = false;
        $this->emit('refreshPage');
    }

    public function dropSelectConfirm()
    {
        $this->dropSelect = false;
        $this->emit('dropSelectConfirm', $this->drop_id);
    }

}