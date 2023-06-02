<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Contracts\UploadsImagesCards;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use Livewire\WithFileUploads;


class UploadImageCardForm extends Component
{

    use WithFileUploads;

    /**
     * The team instance.
     *
     * @var mixed
     */
    public $team;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];


    public $collection_name;
    public $image_card;


    public function mount($team)
    {
        $this->team=$team;

        $this->state=$team->withoutRelations()->toArray();

    }

    /**
     * Update the user's profile information.
     *
     * @param  UploadsImagesCards  $updater
     * @return void
     */
    public function updateDataCollection(UploadsImagesCards $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->team,
            $this->image_card
                ? array_merge($this->state, ['image_card' => $this->image_card])
                : $this->state,
        );

        $this->emit('saved');

    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_Path_Image_Card()
    {

        $this->team->deletePathImageCard();
        $this->render();

    }

    public function render()
    {
        return view('collections.upload-image-card-form');
    }
}
