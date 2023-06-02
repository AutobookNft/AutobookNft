<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Contracts\UploadsImagesToIpfs;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use Livewire\WithFileUploads;


class UploadImageToIpfsForm extends Component
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
    public $image_to_ipfs;

    public function mount($team)
    {
        $this->team=$team;

        $this->state=$team->withoutRelations()->toArray();

    }

    /**
     * Update the user's profile information.
     *
     * @param  UploadsImagesToIpfs  $updater
     * @return void
     */
    public function updateDataCollection(UploadsImagesToIpfs $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->team,
            $this->image_to_ipfs
                ? array_merge($this->state, ['image_to_ipfs' => $this->image_to_ipfs])
                : $this->state,
        );

        $this->emit('saved');

    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_Path_Image_To_Ipfs()
    {

        $this->team->deletePathImageToIpfs();
        $this->render();

    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getTeamProperty()
    {
        return $this->team;
    }


    public function render()
    {
        return view('collections.upload-image-to-ipfs-form');
    }
}
