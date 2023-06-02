 <!-- Wallet creator-->
<div class="col-span-4 rows-2">
    <label class="mt-1 w-full flex-shrink" for="wallet_frangette"> {{ __('Frangette Address') }} </label>
    <x-jet-input id="wallet_frangette" type="text" class="w-full mt-1"
        wire:model.defer="state.wallet_frangette" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="wallet_frangette" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
        <label class="w-full mt-1" for="mint_frangette"> {{ __('Mint') }} </label>
    <x-jet-input id="mint_frangette" type="text" class=" w-full mt-1"
        wire:model.defer="state.mint_frangette" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="mint_frangette" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
        <label class="w-full mt-1" for="royalty_frangette"> {{ __('Royalty') }} </label>
    <x-jet-input id="royalty_frangette" type="text" class=" w-full mt-1"
        wire:model.defer="state.royalty_frangette" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="royalty_frangette" class="mt-2" />
</div>

