<x-jet-form-section submit="updateDataCollection">
    <x-slot name="title">
        {{ __('Data of the Eco Asset Nft: ').$team->collection_name }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter all Eco Asset Nft data please, be very accurate.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <label for="eco_asset_roles" class="block text-gray-700 text-lg font-bold mb-2">{{ __('Eco Asset NFT roles') }}:</label>
            <textarea rows="10"
                class="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="eco_asset_roles" wire:model.defer="state.eco_asset_roles" :disabled="!Gate::check('update', $team)"
                placeholder="{{ __('Enter role of Eco Asset NFT') }}">

                    </textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        <label class = "col-span-6 text-xl"> {{ __('Wallets') }} </label>
        <hr class = "col-span-6">

        @can('isAdmin')

            @include('ecoassetnfts.wallet-frangette')

            @include('ecoassetnfts.wallet-epp')

        @endcan

        @include('ecoassetnfts.wallet-creator')

        @include('ecoassetnfts.wallet-owner')



    </x-slot>



    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>
