<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Contracts\UpdatesProfilesCompanyDatasheet;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;



class UpdateProfileCompanyDatasheetForms extends Component
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
     * @param  \App\Contracts\UpdatesProfilesCompanyDatasheet  $updater
     * @return void
     */
    public function  updateProfileCompanyDatasheet(UpdatesProfilesCompanyDatasheet $updater)
    {
        $this->resetErrorBag();

        $updater->update(Auth::user(), $this->state);

        $this->emit('saved');

    }

    public function render()
    {
        return view('profile.update-profile-company-datasheet-forms');
    }
}
