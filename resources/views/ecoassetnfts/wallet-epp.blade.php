 <!-- Wallet creator-->
<div class="col-span-4 rows-2">
    <label class="mt-1 w-full flex-shrink" for="wallet_epp"> {{ __('Epp Address') }} </label>
    <x-jet-input id="wallet_epp" type="text" class="w-full mt-1"
        wire:model.defer="state.wallet_epp" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="wallet_epp" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
        <label class="w-full mt-1" for="mint_epp"> {{ __('Mint') }} </label>
    <x-jet-input id="mint_epp" type="text" class=" w-full mt-1"
        wire:model.defer="state.mint_epp" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="mint_epp" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
        <label class="w-full mt-1" for="royalty_epp"> {{ __('Royalty') }} </label>
    <x-jet-input id="royalty_epp" type="text" class=" w-full mt-1"
        wire:model.defer="state.royalty_epp" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="royalty_epp" class="mt-2" />
</div>

