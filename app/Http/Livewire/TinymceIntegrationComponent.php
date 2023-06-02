<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TinymceIntegrationComponent extends Component
{
    public $editor;
    public function render()
    {
        return view('livewire.tinymce-integration-component');
    }
}
