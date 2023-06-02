<?php

namespace App\Http\Controllers;

use App\Models\Teams_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OpenController extends Controller
{

    public $current_team;
    public $team;

    public $itemid;

    public $teamItem;


    public function collection_head(){

        $this->current_team = Auth::user()->currentTeam;

        $this->team = $this->current_team;

        $data = [
            'type' => 'head',
            'team' => $this->team,
        ];

        return view('livewire.collections.open.collection-head', $data);

    }

    public function collection_asset()
    {

        $this->current_team = Auth::user()->currentTeam;

        $this->team = $this->current_team;

        $data = [
            'type' => 'asset',
            'team' => $this->team,
        ];

        return view('livewire.collections.open.collection-head', $data);


    }
}
