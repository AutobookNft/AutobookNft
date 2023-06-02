 <!-- Wallet creator-->
<div class="col-span-4 rows-2">
    <label class="mt-1 w-full flex-shrink" for="wallet_creator"> {{ __('Creator Address') }} </label>
    <x-jet-input id="wallet_creator" type="text" class="w-full mt-1"
        wire:model.defer="state.wallet_creator" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="wallet_creator" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
        <label class="w-full mt-1" for="mint_creator"> {{ __('Mint') }} </label>
    <x-jet-input id="mint_creator" type="text" class=" w-full mt-1"
        wire:model.defer="state.mint_creator" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="mint_creator" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
        <label class="w-full mt-1" for="royalty_creator"> {{ __('Royalty') }} </label>
    <x-jet-input id="royalty_creator" type="text" class=" w-full mt-1"
        wire:model.defer="state.royalty_creator" :disabled="!Gate::check('update', $team)" />
        <x-jet-input-error for="royalty_creator" class="mt-2" />
</div>

