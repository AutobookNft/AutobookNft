<x-jet-form-section submit="updateProfileSocialmedia">

    <x-slot name="title">
        {{ __('Social media') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please enter your socialmedia.') }}
    </x-slot>

    <x-slot name="form">

        <!-- Personal site -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="site_url" value="{{ __('Personal site') }}" />
            <x-jet-input id="site_url" type="url" class="mt-1 block w-full" wire:model.defer="state.site_url"
                autocomplete="site_url"/>
                @error('site_url') <span class="text-red-500">{{  "Inserisci una URL valida" }}</span>@enderror

        </div>

        <!-- Facebook -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="facebook" value="{{ __('Facebook') }}" />
            <x-jet-input id="facebook" type="text" class="mt-1 block w-full" wire:model.defer="state.facebook"
                autocomplete="facebook" />
            <x-jet-input-error for="facebook" class="mt-2" />
        </div>

        <!-- Twitter -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="twitter" value="{{ __('Twitter')}}" />
            <x-jet-input id="twitter" type="text" class="mt-1 block w-full" wire:model.defer="state.twitter"
                autocomplete="twitter" />
            <x-jet-input-error for="twitter" class="mt-2" />
        </div>

        <!-- Instagram-->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="instagram" value="{{ __('Instagram') }}" />
            <x-jet-input id="instagram" type="text" class="mt-1 block w-full" wire:model.defer="state.instagram"
                autocomplete="instagram" />
            <x-jet-input-error for="instagram" class="mt-2" />
        </div>

        <!-- Snapchat  -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="snapchat" value="{{ __('Snapchat') }}" />
            <x-jet-input id="snapchat" type="text" class="mt-1 block w-full" wire:model.defer="state.snapchat"
                autocomplete="snapchat" />
            <x-jet-input-error for="snapchat" class="mt-2" />
        </div>

        <!-- Twitch  -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="twitch" value="{{ __('Twitch') }}" />
            <x-jet-input id="twitch" type="text" class="mt-1 block w-full" wire:model.defer="state.twitch"
                autocomplete="twitch" />
            <x-jet-input-error for="twitch" class="mt-2" />
        </div>

        <!-- Oder  -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="oder" value="{{ __('Oder') }}" />
            <x-jet-input id="oder" type="text" class="mt-1 block w-full" wire:model.defer="state.oder"
                autocomplete="oder" />
            <x-jet-input-error for="oder" class="mt-2" />
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
