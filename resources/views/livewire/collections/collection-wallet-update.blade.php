<x-sidebar wichsidebar='team-wallet-update'>

    <x-slot:head>
        <x-sidebarhead
            image="{{ $team->path_image_econft }}"
            name="{{ $team->name }}"
            type=""
            pagename="{{ 'Manage wallet' }}" />
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item="{{ __('Dashboard') }}" />
        </a>
    </x-slot:dashboard>

    <x-slot:back_to_collection>
        <a href="{{ url('/dashboard/collection/item_upload') }}">
            <x-sidebar-leftarrow item="{{ __('Back to collection') }}" />
        </a>
    </x-slot:back_to_collection>

    <x-slot:items>

    <div class="absolute top-20 xs:left-60 xl:left-80">
        
        <form class="grid xl1:grid-cols-6 md:gap-6 bg-gray-300 border border-gray-500 p-4 rounded-lg">
            
            <div class="xl:col-span-1">
                <x-jet-label for="nick_name" class="w-full" value="{{ __('Nick name') }}" />
                <x-jet-input id="nick_name" type="text" class="mt-1" wire:model.defer="nick_name" autocomplete="nick_name" />
                <x-jet-input-error for="nick_name" class="mt-2" />
            </div>

            <div class="xl1:col-span-2">
                <x-jet-label for="address" class="w-full" value="{{ __('Address') }}" />
                <x-jet-input id="address" type="text" class="w-full mt-1" wire:model.defer="address" autocomplete="address" />
                <x-jet-input-error for="address" class="mt-2" />
            </div>

            <div class="xl1:col-span-1">
                <x-jet-label for="royalty_mint" value="{{ __('Royalty mint') }}" />
                <x-jet-input id="royalty_mint" type="number" class="mt-1" wire:model.defer="royalty_mint" autocomplete="royalty_mint" />
                <x-jet-input-error for="royalty_mint" class="mt-2" />
            </div>

            <div class="xl1:col-span-1">
                <x-jet-label for="royalty_scd_market" value="{{ __('Royalty second market') }}" />
                <x-jet-input id="royalty_scd_market" type="number" class="mt-1" wire:model.defer="royalty_scd_market"
                    autocomplete="royalty_scd_market" />
                <x-jet-input-error for="royalty_scd_market" class="mt-2" />
            </div>

            <x-jet-action-message class="xl1:col-span-6" on="errore">

                <label class='inline-flex text-red-600 font-bold text-xl'> {{ __($msgError . ' / ' . $codError) }}
                </label>

            </x-jet-action-message>

            <div class="flex items-center justify-end bg-gray-300">

                <x-jet-action-message on="saved">
                    <label class='text-green-800 font-bold'> {{ __('Saved!') }} </label>
                </x-jet-action-message>

                <x-jet-button wire:click.prevent="store" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-jet-button>

            </div>
            
        </form>

        <x-jet-section-border />
                
        @foreach ($wallets as $wallet)
            @include('livewire.collections.item-include.wallet-list')
        @endforeach
    </div>

    @if($confirmingWalletyEdit)
        @include('livewire.collections.item-include.wallet-edit-modal')
    @endif

    <x-jet-confirmation-modal wire:model="confirmingWalletyDelete">
        <x-slot name="title">
            {{ __('Remove item') }}
        </x-slot>
    
        <x-slot name="message">
            <x-jet-action-message class="mr-3" on="errore">
                <label class='text-red-800 font-bold text-xl'> {{ __('This item cannot be deleted because there are any
                    files associated with it') }} </label>
            </x-jet-action-message>
        </x-slot>
    
        <x-slot name="content">
            {{ __('Are you sure you would like to remove this wallet?') }}
        </x-slot>
    
        <x-slot name="footer">
    
            <x-jet-secondary-button wire:click="$toggle('confirmingWalletyDelete')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Remove') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>



    </x-slot:items>

</x-sidebar>
