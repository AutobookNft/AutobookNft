<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CollectionItem extends Component
{

    public $items;

    public $audio_file;

    public $view;

    public function render()
    {

        $this->view = 'components.collection-item';

        return view('livewire.collection-item');
    }
}
