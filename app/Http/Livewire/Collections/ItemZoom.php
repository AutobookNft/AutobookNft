<?php

namespace App\Http\Livewire\Collections;

use App\Contracts\UpdatesDataItem;
use App\Models\Team;
use App\Models\Teams_item;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ItemZoom extends Component
{

    public $item, $teamItem, $current_team, $state, $team, $items =[], $utility_files, $team_name, $utility;

    public $teamId,  $itemId, $itemChoseInSelectforBind;

    public $cardType, $itemType, $show_traits_button;

    public $haveUtilities, $dontShow, $saved = false;

    public $itemIdBeingRemoved, $confirmItemRemoval, $confirmingItemDelete, $confirmingItemTransfer, $itemIdBeingTransfer;

    public $imagetitle, $filename, $fileCover, $fileMedia, $type, $paired, $dateCreation;

    protected $listeners = [
        'saved' => 'handleSaved',
    ];

    public function mount($id)
    {

        $this->current_team = Auth::user()->currentTeam;

        $this->cardType = 'zoom';

        $this->itemId = $id;

       // $this->haveUtilities = TeamItem_utility::where('teams_items_id', $this->itemid)->get());

        $this->teamItem = Teams_item::findOrFail($this->itemId);

        $this->teamId = Auth::user()->current_team_id;

        $this->itemType = Team::findOrFail($this->teamId)->type;

        
    }

    public function render()
    {

        $collectionname = Team::find($this->teamItem->team_id);
        
        $collectionname = $collectionname['name'];
      
        $data = [
            'item' => $this->teamItem,
            'team'=> $this->current_team,
            'collectionname' => $collectionname,
        ];

        return view('livewire.collections.item-zoom', $data);
    }
}
