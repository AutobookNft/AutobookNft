<?php

namespace App\Http\Livewire\Collections;

use Illuminate\Support\Facades\DB;
use App\Models\Team;
use App\Traits\HasUtilitys;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Exception;


class Collections extends Component
{
    use WithPagination;
    use HasUtilitys;

    public $items;
    public $errore='';
    public $user;
    public $collectionType;
    public $collectionProtocolType='';
    public $current_team_id;

    public $team, $qtaTeams, $qtaItems, $averageFloorPrice;
    public $confirmingCollectionDelete;
    public $collectionIdBeingRemoved;
    public $cardType;

    public function mount()
    {

        $this->user = Auth::user();
        //$this->items = Team::where('user_id', Auth::id())->get();

        $this->cardType = 'collection';

        $this->items = Auth::user()->allTeams();

        $this->qtaTeams = count($this->items);

        $this->qtaItems = DB::table('teams_items')
            ->join('teams', 'teams_items.team_id', '=', 'teams.id')
            ->where('teams.user_id', '=', auth()->id())
            ->count();

        $price = DB::table('teams_items')
            ->join('teams', 'teams_items.team_id', '=', 'teams.id')
            ->where('teams.user_id', '=', auth()->id())
            ->avg('teams_items.price');


        $formatted_price = number_format($price, 2, ',', '.');
        $this->averageFloorPrice = "ALGO " . $formatted_price;


        $this->team = Auth::user()->currentTeam;

        $this->collectionType = "components.collection-item-collections";

        if (isset($this->team->id)) {
            $this->current_team_id = $this->team->id;
        }
    }

    public function delete()
    {

       //public $strOggi = "pinco pallino";

        try {

            Team::find($this->collectionIdBeingRemoved)->delete();
            $this->emit('deleted');
            $this->render();
            return redirect(url('/dashboard/collections'));


        } catch (Exception $e) {
            // Mostra un messaggio di errore personalizzato all'utente
            $this->confirmingCollectionDelete = true;
            $this->emit('errore');

        }

    }

    public function confirmCollectionRemoval($ToDeleteId)
    {
        $this->confirmingCollectionDelete = true;

        $this->collectionIdBeingRemoved = $ToDeleteId;
    }

    public function render()
    {
        return view('livewire.collections.collections');

     }

}
