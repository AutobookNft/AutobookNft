<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Contracts\UploadsImagesAvatars;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use Livewire\WithFileUploads;


class UploadImageAvatarForm extends Component
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
    public $image_avatar;


    public function mount($team)
    {
        $this->team=$team;

        $this->state=$team->withoutRelations()->toArray();

    }

    /**
     * Update the user's profile information.
     *
     * @param  UploadsImagesAvatars  $updater
     * @return void
     */
    public function updateDataCollection(UploadsImagesAvatars $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->team,
            $this->image_avatar
                ? array_merge($this->state, ['image_avatar' => $this->image_avatar])
                : $this->state,
        );

        $this->emit('saved');

    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_Path_Image_avatar()
    {

        $this->team->deletePathImageAvatar();
        $this->render();

    }

    public function render()
    {
        return view('collections.upload-image-avatar-form');
    }
}
