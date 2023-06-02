<?php

namespace App\Http\Livewire\Collections;

use App\Models\Team_wallet;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Exception;

class CollectionWalletUpdate extends Component
{

    public $teamItem, $current_team, $wallets =[], $edit, $team;
    public $itemid, $teamId;

    public $msgError, $codError;


    public $edit_address, $edit_nick_name, $edit_royalty_mint, $edit_royalty_scd_market;

    public $address, $nick_name, $royalty_mint, $royalty_scd_market;

    public $WalletyIdBeingRemoved, $confirmingWalletyDelete, $confirmingWalletyEdit, $walletyIdBeingEdit;

    protected $rules = [
        'address' => 'nullable',
        'nick_name' => 'nullable',
        'royalty_mint' => 'nullable',
        'royalty_scd_market' => 'nullable',

    ];

    public function mount(Team_wallet $edit){

        $this->team = Auth::user()->currentTeam;

        $this->teamId = $this->team->id;

        $this->wallets = Team_wallet::where('team_id', $this->teamId)->get();

        $this->edit = $edit;

    }


    public function render()
    {

        $data = [

            'wallets' => $this->wallets,
            'team' => $this->team,

        ];

        return view('livewire.collections.collection-wallet-update', $data);
    }

    public function store()
    {

        $this->validate();

        $editWallet = new Team_wallet;

        try {


            $editWallet->address = isset($this->address) ? $this->address : '';
            $editWallet->nick_name = isset($this->nick_name) ? $this->nick_name : '';
            $editWallet->royalty_mint = isset($this->royalty_mint) ? $this->royalty_mint : 0;
            $editWallet->royalty_scd_market = isset($this->royalty_scd_market) ? $this->royalty_scd_market : 0;
            $editWallet->team_id = $this->teamId;

            $editWallet->save();
            $this->emit('saved');
            
            redirect(url('dashboard/collection/wallet/update'));

        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }

    public function delete()
    {

        try {

            Team_wallet::find($this->WalletyIdBeingRemoved)->delete();

            $this->emit('deleted');
            $this->confirmingWalletyDelete = false;
            redirect(url('dashboard/collection/wallet/update'));


        } catch (Exception $e) {
            $this->emit('errore');
            $this->confirmingWalletyDelete = true;
        }

    }

    public function confirmWalletyRemoval($ToDeleteId)
    {
        $this->confirmingWalletyDelete = true;

        $this->WalletyIdBeingRemoved = $ToDeleteId;
    }

    public function edit()
    {

       // dd($this->edit_nick_name);

        $this->validate();

        $editWallet=Team_wallet::find($this->walletyIdBeingEdit);

        try {

            $editWallet->address            = isset($this->edit_address) ? $this->edit_address : '';
            $editWallet->nick_name          = isset($this->edit_nick_name) ? $this->edit_nick_name : '';
            $editWallet->royalty_mint       = isset($this->edit_royalty_mint) ? $this->edit_royalty_mint : 0;
            $editWallet->royalty_scd_market = isset($this->edit_royalty_scd_market) ? $this->edit_royalty_scd_market : 0;
            $editWallet->team_id = $this->teamId;

            $editWallet->save();
            $this->emit('saved');
            redirect(url('dashboard/collection/wallet/update'));

        } catch (Exception $e) {

            $this->msgError = $e->getMessage();
            $this->codError = $e->getCode();

            $this->emit('errore');

        }

    }
    public function confirmWalletEdit($ToEdit)
    {
        $this->confirmingWalletyEdit = true;

        $this->walletyIdBeingEdit = $ToEdit;

        $editWallet=Team_wallet::find($this->walletyIdBeingEdit);

        $this->edit_address         =  $editWallet->address;
        $this->edit_nick_name       =  $editWallet->nick_name;
        $this->edit_royalty_mint    =  $editWallet->royalty_mint;
        $this->edit_royalty_scd_market = $editWallet->royalty_scd_market;

    }
}
