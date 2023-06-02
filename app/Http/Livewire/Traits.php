<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Item_traits;
use App\Models\Teams_item;
use Livewire\WithPagination;
use Exception;

class Traits extends Component
{
    use WithPagination;

    public $teamItem;
    public $itemid;
    public $current_team;
    public $itemTraits;
    public $current_team_id;
     public $user;
    public $team;
    public $teams_items;

    public $title, $edit_title, $description, $edit_description, $teams_items_id, $newId;

    public $msgError, $codError;

    public $isOpen, $show_traits_button;
    public $onsaving;
    public $newTraits;

    public $traitIdBeingRemoved, $confirmingTraitDelete, $confirmingTraitEdit, $traitIdBeingEdit;

    protected $rules = [
        'title' => 'nullable',
        'description' => 'nullable',
        
    ];

   // public Item_traits $Item_traits;

    public function mount($id)
    {

        $this->onsaving = false;
        $this->itemid = $id;
        $this->user = Auth::user();
        $this->show_traits_button = true;

        //$this->Item_traits = new Item_traits();

        $this->current_team = Auth::user()->currentTeam;
        $this->team = $this->current_team;

        $this->teams_items = Teams_item::find($this->itemid);

     //   $this->itemTraits = Item_traits::where('teams_items_id', $this->itemid)->first();

    }

    public function render()
    {

        $data = [
            'items' => Item_traits::where('teams_items_id', $this->itemid)->paginate(),
            'teams_items' => $this->teams_items,
            'team' => $this->team,
            'itemid' => $this->itemid,
        ];

        return view('livewire.traits', $data);

    }

    public function store()
    {

        // $this->newTraits = new Item_traits();

        $this->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'teams_items_id' => 'nullable',

        ]);

       
        try {

            Item_traits::updateOrCreate(['id' => $this->newId], [
                'teams_items_id' => $this->itemid,
                'title' => $this->title,
                'description' => $this->description,
            ]);

    
            $this->emit('saved');
            redirect(url('dashboard/collection/items_edit/'. $this->itemid . '/traits'));

        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }

    public function confirmTraitRemoval($ToDeleteId)
    {
        $this->confirmingTraitDelete = true;

        $this->traitIdBeingRemoved = $ToDeleteId;
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }


    public function delete()
    {

        try {

            Item_traits::find($this->traitIdBeingRemoved)->delete();

            $this->emit('deleted');
            $this->confirmingTraitDelete = false;
            redirect(url('dashboard/collection/items_edit/'. $this->itemid . '/traits'));


        } catch (Exception $e) {
            $this->emit('errore');
            $this->confirmingTraitDelete = true;
        }
     
    }

    public function edit()
    {

        // dd($this->edit_nick_name);

        $this->validate();

        $editTrait = Item_traits::find($this->traitIdBeingEdit);

        try {

            $editTrait->title = isset($this->edit_title) ? $this->edit_title : '';
            $editTrait->description = isset($this->edit_description) ? $this->edit_description : '';
           
            $editTrait->save();
            $this->emit('saved');
            redirect(url('dashboard/collection/items_edit/' . $this->itemid . '/traits'));

        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }
    public function confirmTraitEdit($ToEdit)
    {
        $this->confirmingTraitEdit = true;

        $this->traitIdBeingEdit = $ToEdit;

        $editTrait = Item_traits::find($this->traitIdBeingEdit);

        $this->edit_title = $editTrait->title;
        $this->edit_description = $editTrait->description;
      
    }


    private function resetInputFields()
    {
        $this->title = null;
        $this->description = null;
        $this->teams_items_id = null;
    }

}
