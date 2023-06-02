<?php

namespace App\View\Components;

use Illuminate\View\Component;

class nome extends Component
{

    public $prova;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        $this->prova = "sono un panino!";

        return view('components.nome');
    }
}
