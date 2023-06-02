<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Contracts\UploadsImagesBanners;
use App\Models\Team;
use App\Traits\HasImageBanner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;



class UploadImageBannerForm extends Component
{

    use WithFileUploads;
    use HasImageBanner;

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
    public $image_banner;


    public function mount($team)
    {
        $this->team=$team;

        $this->state=$team->withoutRelations()->toArray();

    }

    /**
     * Update the user's profile information.
     *
     * @param  UploadsImagesBanners  $updater
     * @return void
     */
    public function updateDataCollection()
    {
        $this->resetErrorBag();

        $this->update(
            $this->team,
            $this->image_banner
                ? array_merge($this->state, ['image_banner' => $this->image_banner])
                : $this->state,
        );

        $this->emit('saved');

    }

    public function update($team, array $input)
    {
        Gate::forUser(Auth::user())->authorize('update', $team);

        Validator::make($input, [

            'image_banner' => ['nullable', 'image', 'max:4096'],

        ])->validateWithBag('updateDataCollection');

        if (isset($input['image_banner'])) {
            $team->updateCollectionBanner($input['image_banner'], $input['collection_name']);
        }
    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_Path_Image_banner()
    {

        $this->team->deletePathImageBanner();
        $this->render();

    }

    public function render()
    {
        return view('collections.upload-image-banner-form');
    }
}
