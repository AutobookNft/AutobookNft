<?php


namespace app\Http\Livewire\JeatStreamForms;

use App\Contracts\UpdatesDataCollections;
use App\Models\Team;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateDataCollectionForm extends Component
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
    public $image_banner;
    public $image_avatar;
    public $image_card;
    public $image_econft;
    public $isOpen;
    public $epp_id;
    public $mostra;
    public $isDisabled;
    public $amountDifferentEcoNFT;
    public $econft_number;

    public function mount($team)
    {
        $this->team=$team;

        $this->state=$team->withoutRelations()->toArray();

        $this->amountDifferentEcoNFT = $team->teams_item()->count();
        $this->isDisabled = $this->amountDifferentEcoNFT > 0;

    }

    /**
     * Update the user's profile information.
     *
     * @param  UpdatesDataCollections  $updater
     * @return void
     */
    public function updateDataCollection(UpdatesDataCollections $updater)
    {

        $this->resetErrorBag();

        //dd($this->image_ipfs, $this->image_avatar, $this->image_banner, $this->image_card);
        // dd($this->team, $this->state);

        $updater->update(
            $this->team,
            $this->state,
            $this->image_econft ? ['image_econft' => $this->image_econft] : [],
            $this->image_avatar ? ['image_avatar' => $this->image_avatar] : [],
            $this->image_banner ? ['image_banner' => $this->image_banner] : [],
            $this->image_card ? ['image_card' => $this->image_card] : [],
        );


        $this->emit('saved');
        return route('teams.show', Auth::user()->currentTeam->id);


    }

    /**
     * Save epp from modal view bind_epp
     *
     * @return void
     */
    public function addEpp($id){

        $this->team->epp_id=$id;
        $this->team->save();
        $this->epp_id = $id;
    }


    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }


    /**
     * Delete user's profile photo.
     *
     * @return void
     */
    public function delete_path_image_econft()
    {

        $this->team->deletePathImageEconft();
        $this->render();

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

    /**
     * Get the current user of the application.
     *
     * @return mixed
     */
    public function getTeamProperty()
    {
        return $this->team;
    }

     protected $rules = [

            'state.econft_number' => ['nullable'],
            'state.dirrerent' => ['nullable'],

        ];

    public function submitForm($value)
    {

        // $this->team->different = $value;
        // if ($value == 1) {
        //     $this->team->econft_number = 2;
        // }else{
        //     $this->team->econft_number = 0;
        // }


        $this->validate();

        $this->team->different = $value;
        if ($value == 1) {
            $this->team->econft_number = 0;
        } else {
            $this->team->econft_number = 2;
        }
        $this->team->save();

    }

    public function save_econft_number()
    {

        $this->team->econft_number = $this->econft_number;
        $this->team->save();

    }

    public function render()
    {
        $this->mostra = false;
        //$this->vmore = $this->team->more;
        return view('teams.update-data-collection-form');
    }
}
