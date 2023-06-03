<?php

namespace App\Http\Livewire\JeatStreamForms;

use App\Actions\Jetstream;
use App\Contracts\UpdatesUserTaxData;
use App\Traits\HasDefProfilePhotoDisk;
use App\Traits\HasUtilitys;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Util\FileHelper;

use Symfony\Component\HttpFoundation\File\UploadedFile;


class UpdateProfileTaxDataForms extends Component
{

    use WithFileUploads;
    use HasUtilitys;
    use HasDefProfilePhotoDisk;

     /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];
    public $photo_doc_front;
    public $photo_doc_retro;
    public $error = '';
    public $doc_issue_date;
    public $doc_expired_date;
    public $originalName;


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
     * @param  \App\Contracts\UpdatesUserTaxData  $updater
     * @return void
     */
    public function updateUserTaxData(UpdatesUserTaxData $updater)
    {
        $this->resetErrorBag();

        //dd($this);

        $updater->update(
            Auth::user(),
            $this->state,
            $this->photo_doc_front ? ['photo_doc_front' => $this->photo_doc_front] : [],
            $this->photo_doc_retro ? ['photo_doc_retro' => $this->photo_doc_retro] : [],
        );

        //$updater->update(Auth::user(), $this->state);

        $this->emit('saved');

    }

    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_photo_doc_retro()
    {

        Auth::user()->deletePhotoDocRetro();
        $this->render();

        $photo_path = $this->folderRoot() . '/image/' . Auth::id() . '/profile/doc/front';

        // Elimina tutti i file presenti nella cartella di destinazione
        File::cleanDirectory($photo_path);

    }


    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_photo_doc_front()
    {

        Auth::user()->deletePhotoDocFront();
        $this->render();

        $photo_path = $this->folderRoot() . '/image/' . Auth::id() . '/profile/doc/retro';

        // Elimina tutti i file presenti nella cartella di destinazione
        File::cleanDirectory($photo_path);

    }

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getUserProperty()
    {
        return Auth::user();
    }

    public function render()
    {

        $data = [

            'acceptedTypes' => FileHelper::getAcceptedFileTypes('images')

        ];

        return view('profile.update-profile-tax-data-forms', $data);
    }
}
