<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Contracts\UpdatesProfilesSocialmedia;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class   UpdateProfileSocialmediaForm extends Component
{

     /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];


     /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->state = Auth::user()->withoutRelations()->toArray();
    }


    /**
     * Update the user's profile information.
     *
     * @param  \App\Contracts\UpdatesProfilesSocialmedia  $updater
     * @return void
     */
    public function  updateProfileSocialmedia(UpdatesProfilesSocialmedia $updater)
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        $this->emit('saved');

    }

    public function render()
    {
        return view('profile.update-profile-socialmedia-form');
    }
}
