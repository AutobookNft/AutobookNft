<!-- Wallet owner-->
<div class="col-span-4 rows-2">
    <label class="mt-1 w-full flex-shrink" for="wallet_owner"> {{ __('Owner Address') }} </label>
<x-jet-input id="wallet_owner" type="text" class="w-full mt-1"
    wire:model.defer="state.wallet_owner" :disabled="!Gate::check('update', $team)" />
    <x-jet-input-error for="wallet_owner" class="mt-2" />
</div>
<div class="col-span-1 rows-2">
    <label class="w-full mt-1" for="mint_owner"> {{ __('Mint') }} </label>
<x-jet-input id="mint_owner" type="text" class=" w-full mt-1"
    wire:model.defer="state.mint_owner" :disabled="!Gate::check('update', $team)" />
    <x-jet-input-error for="mint_owner" class="mt-2" />
</div>
<div class="col-span-1 rows2">
    <label class="w-full mt-1" for="royalty_owner"> {{ __('Royalty') }} </label>
<x-jet-input id="royalty_owner" type="text" class=" w-full mt-1"
    wire:model.defer="state.royalty_owner" :disabled="!Gate::check('update', $team)" />
    <x-jet-input-error for="royalty_owner" class="mt-2" />
</div>
