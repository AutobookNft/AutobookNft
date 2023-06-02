<?php

namespace App\Http\Livewire\Collections\Setting;

use App\Contracts\UpdatesEcoAssetNfts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use Livewire\WithFileUploads;

class EcoAssetNftForm extends Component
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

    //public $emailFound;

        /**
     * The new avatar for the user.
     *
     * @var mixed
     */
    public $path_image_banner;
    public $photo_coll_avatar;
    public $photo_coll_card;
    public  $firstName;
    public  $lastName;
    public $emailFound;
    public $vmore;


    protected $listeners = ['moreChanged' => 'updateEconftNumber'];

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount($team)
    {
        $this->team = $team;

        $this->state = $team->withoutRelations()->toArray();

        $this->emailFound = false;

    }

    /**
     * Update the user's profile information.
     *
     * @param  UpdatesEcoAssetNfts  $updater
     * @return void
     */
    public function updateDataCollection(UpdatesEcoAssetNfts $updater)
    {
        $this->resetErrorBag();

        $updater->update(
            $this->team,
            $this->path_image_banner
            ? array_merge($this->state, ['path_image_banner' => $this->path_image_banner])
            : $this->state,
        );

        $this->emit('saved');

    }

    public function searchAndRegister()
    {

    // Cerca l'indirizzo email nella tabella "users"
    $user = Auth::user()->where('email', $this->state['email'])->first();

    if ($user) {

        // L'indirizzo email è stato trovato, quindi leggi il "first_name" e il "last_name"
        $firstName = $user->first_name;
        $lastName = $user->last_name;

        // Imposta la variabile di stato "emailFound" su "true"
        $this->emailFound = true;

    } else {

        // L'indirizzo email non è stato trovato, quindi imposta la variabile di stato "emailFound" su "false"
        $this->emailFound = false;
    }
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

    public function updateEconftNumber($more)
    {

        $this->vmore = $more;
    }

    public function render()
    {
        return view('livewire.collections.setting.eco-asset-nft-form');
    }
}
