<x-jet-form-section submit="updateProfileDatasheet">

        <x-slot name="title">
            {{ __('Personal data sheet') }}
        </x-slot>

        <x-slot name="description">
            {{ __('Please update your demographic information.') }}
        </x-slot>

        <x-slot name="form">

            <!-- Cognome -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="cognome" value="{{ __('Cognome') }}" />
                <x-jet-input id="cognome" type="text" class="mt-1 block w-full" wire:model.defer="state.cognome" autocomplete="cognome" />
                <x-jet-input-error for="cognome" class="mt-2" />
            </div>

            <!-- username -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="username" value="{{ __('Username') }}" />
                <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
                <x-jet-input-error for="username" class="mt-2" />
            </div>

            <!-- indirizzo -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="indirizzo" value="{{ __('Address') }}" />
                <x-jet-input id="indirizzo" type="text" class="mt-1 block w-full" wire:model.defer="state.indirizzo" autocomplete="indirizzo" />
                <x-jet-input-error for="indirizzo" class="mt-2" />
            </div>

            <!-- CAP -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="cap" value="{{ __('CAP') }}" />
                <x-jet-input id="cap" type="text" class="mt-1 block w-full" wire:model.defer="state.cap" autocomplete="cap" />
                <x-jet-input-error for="cap" class="mt-2" />
            </div>

            <!-- Citta -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="citta" value="{{ __('City') }}" />
                <x-jet-input id="citta" type="text" class="mt-1 block w-full" wire:model.defer="state.citta" autocomplete="citta" />
                <x-jet-input-error for="citta" class="mt-2" />
            </div>

            <!-- Provincia -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="prov" value="{{ __('Province') }}" />
                <x-jet-input id="prov" type="text" class="mt-1 block w-full" wire:model.defer="state.prov" autocomplete="prov" />
                <x-jet-input-error for="prov" class="mt-2" />
            </div>

            <!-- Paese -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="paese" value="{{ __('Nation') }}" />
                <x-jet-input id="paese" type="text" class="mt-1 block w-full" wire:model.defer="state.paese" autocomplete="paese" />
                <x-jet-input-error for="paese" class="mt-2" />
            </div>

            <!-- Cell -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="cell" value="{{ __('Mobile phone') }}" />
                <x-jet-input id="cell" type="text" class="mt-1 block w-full" wire:model.defer="state.cell" autocomplete="cell" />
                <x-jet-input-error for="cell" class="mt-2" />
            </div>

            <!-- Telefono -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="tel" value="{{ __('Phone') }}" />
                <x-jet-input id="tel" type="text" class="mt-1 block w-full" wire:model.defer="state.tel" autocomplete="tel" />
                <x-jet-input-error for="tel" class="mt-2" />
            </div>

            <!-- Sito -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="site_url" value="{{ __('URL') }}" />
                <x-jet-input id="site_url" type="text" class="mt-1 block w-full" wire:model.defer="state.site_url" autocomplete="site_url" />
                <x-jet-input-error for="site_url" class="mt-2" />
            </div>

        </x-slot>

        <x-slot name="actions">

            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>

        </x-slot>

</x-jet-form-section>
