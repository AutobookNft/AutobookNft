<x-jet-form-section submit="updateProfileCompanyDatasheet">

    <x-slot name="title">
        {{ __('Company data sheet') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please update your company information.') }}
    </x-slot>

    <x-slot name="form">

        <!-- First name => Company name -->
        <div class="col-span-6 sm:col-span-4 border-t border-gray-200"></div>
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="first_name" value="{{ __('Company name') }}" />
                <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="state.first_name"
                    autocomplete="first_name" />
                <x-jet-input-error for="first_name" class="mt-2" />
            </div>

            <!-- First name => Company name -->
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="last_name" value="{{ __('') }}" />
                <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="state.last_name"
                    autocomplete="last_name" />
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>
        <div class="col-span-6 sm:col-span-4 border-t border-gray-200"></div>

        <!-- E-mail -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('E-mail')}}" />
            <x-jet-input id="email" type="text" class="mt-1 block w-full" wire:model.defer="state.email"
                reuired autocomplete="email"/>
            <x-jet-input-error for="org_fiscal_code" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 border-t border-gray-200"></div>

        <!-- Rea -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="rea" value="{{ __('Rea') }}" />
            <x-jet-input id="rea" type="text" class="mt-1 block w-full" wire:model.defer="state.rea"
                autocomplete="rea" />
            <x-jet-input-error for="rea" class="mt-2" />
        </div>

        <!-- Fiscal code -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_fiscal_code" value="{{ __('Fiscal code')}}" />
            <x-jet-input id="org_fiscal_code" type="text" class="mt-1 block w-full" wire:model.defer="state.org_fiscal_code"
                autocomplete="org_fiscal_code" />
            <x-jet-input-error for="org_fiscal_code" class="mt-2" />
        </div>

        <!-- Vat number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_vat_number" value="{{ __('Vat number') }}" />
            <x-jet-input id="org_vat_number" type="text" class="mt-1 block w-full" wire:model.defer="state.org_vat_number"
                autocomplete="org_vat_number" />
            <x-jet-input-error for="org_vat_number" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 border-t border-gray-200"></div>

        <!-- Street -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_street" value="{{ __('Stree') }}" />
            <x-jet-input id="org_street" type="text" class="mt-1 block w-full" wire:model.defer="state.org_street"
                autocomplete="org_street" />
            <x-jet-input-error for="org_street" class="mt-2" />
        </div>

        <!-- ZIP Code -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_zip" value="{{ __('Zip code') }}" />
            <x-jet-input id="org_zip" type="text" class="mt-1 block w-full" wire:model.defer="state.org_zip"
                autocomplete="org_zip" />
            <x-jet-input-error for="org_zip" class="mt-2" />
        </div>

        <!-- Citta -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_city" value="{{ __('City') }}" />
            <x-jet-input id="org_city" type="text" class="mt-1 block w-full" wire:model.defer="state.org_city"
                autocomplete="org_city" />
            <x-jet-input-error for="org_city" class="mt-2" />
        </div>

        <!-- Provincia -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_region" value="{{ __('Region') }}" />
            <x-jet-input id="org_region" type="text" class="mt-1 block w-full" wire:model.defer="state.org_region"
                autocomplete="org_region" />
            <x-jet-input-error for="org_region" class="mt-2" />
        </div>

        <!-- Paese -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_state" value="{{ __('Nation') }}" />
            <x-jet-input id="org_state" type="text" class="mt-1 block w-full" wire:model.defer="state.org_state"
                autocomplete="org_state" />
            <x-jet-input-error for="org_state" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4 border-t border-gray-200"></div>

         <!-- Org phone 1 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_phone_1" value="{{ __('Phone 1') }}" />
            <x-jet-input id="org_phone_1" type="text" class="mt-1 block w-full" wire:model.defer="state.org_phone_1"
                autocomplete="org_phone_1" />
            <x-jet-input-error for="org_phone_1" class="mt-2" />
        </div>

         <!-- Org phone 2 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_phone_2" value="{{ __('Phone 2') }}" />
            <x-jet-input id="org_phone_2" type="text" class="mt-1 block w-full" wire:model.defer="state.org_phone_2"
                autocomplete="org_phone_2" />
            <x-jet-input-error for="org_phone_2" class="mt-2" />
        </div>

        <!-- Org phone 3 -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_phone_3" value="{{ __('Phone 3') }}" />
            <x-jet-input id="org_phone_3" type="text" class="mt-1 block w-full" wire:model.defer="state.org_phone_3"
                autocomplete="org_phone_3" />
            <x-jet-input-error for="org_phone_1" class="mt-2" />
        </div>

        <!-- Sito -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="org_site_url" value="{{ __('Company site') }}" />
            <x-jet-input id="org_site_url" type="url" class="mt-1 block w-full" wire:model.defer="state.org_site_url"
                autocomplete="org_site_url"/>
                @error('org_site_url') <span class="text-red-500">{{  "Inserisci una URL valida" }}</span>@enderror

        </div>

        <div class="col-span-6 sm:col-span-4 border-t border-gray-200"></div>

         <!-- Annotations -->
        <div class="col-span-6 sm:col-span-4">
            <label for="annotation" class="block text-gray-700 text-lg font-bold mb-2">{{ __('Annotations') }}:</label>
            <textarea rows="10"
                class="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="annotation" wire:model.defer="state.annotation" placeholder="{{ __('Enter annotations') }}">

            </textarea>
            @error('annotation') <span class="text-red-500">{{ $message }}</span>@enderror
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
