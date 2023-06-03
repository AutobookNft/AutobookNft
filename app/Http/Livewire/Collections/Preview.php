<?php

namespace App\Http\Livewire\Collections;

use App\Models\Team;
use App\Models\Teams_item;

use App\Util\FileHelper;
use App\Traits\HasUtilitys;
use Hamcrest\Arrays\IsArray;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Session;


class Preview extends Component
{
    use WithPagination;
    use WithFileUploads;
    use HasUtilitys;

    public $items;

    public $epp_name;

    public $teamId;

    public $audio_file;

    public function mount()
    {

    }

    public function render()
    {

        $team = Auth::user()->currentTeam;
        $epp = $team->epp;

        if ($epp){
            $this->epp_name = '<=>' . $epp->org_name;
        }else {
            $this->epp_name = '';
        }

        $this->audio_file = 'c:/audio/brano.mp3';

        $this->teamId = auth()->user()->currentTeam->id;
        $this->items = Teams_item::where('team_id', $this->teamId)->get();

        return view('livewire.collections.preview');
     }

}
