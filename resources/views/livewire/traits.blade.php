<x-sidebar wichsidebar='traits'>

    <x-slot:head>
         <x-sidebarhead
            image="{{$teams_items->file_cover}}"
            name="{{ $teams_items->title }}"
            type="{{ $team->name }}"
            pagename="{{ 'Traits' }}"/>

    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item='Dashboard'/>
        </a>
    </x-slot:dashboard>

    <x-slot:back_to_edit>
       <a href="{{ url('/dashboard/collection/items_edit/'. $itemid) }}">
            <x-sidebar-leftarrow item="{{ __('Back to edit') }}" />
        </a>
    </x-slot:back_to_edit>

    <x-slot:newtrait>
        <a href="#" wire:click='openModal'>
            <x-sidebar-item item='New traits' />
        </a>
    </x-slot:newtrait>

    <x-slot:items>


    <div class="absolute top-20 xs:left-60 xl:left-80 lg:w-5/6 md:2/6 bg-gray-100 border-red-900
                        grid grid-cols-1 gap-4 p-2 rounded grid-flow-row justify-items-start">

        <p class='font-medium italic sm:text-4xl xl:text-7xl'> {{ __('Manage traits') }}</p>


    </div>

    <div class="absolute top-52 xs:left-60 xl:left-80">

            <form class="grid xl:grid-cols-3 md:gap-3 bg-gray-300 border border-gray-500 p-2 rounded-lg" x-data="{ isDisabled: true }"> @csrf

                <div class="xl:col-span-1">
                    <x-jet-label for="title" class="w-full" value="{{ __('Title') }}" />
                    <x-jet-input @keydown="isDisabled=false" id="title" type="text" class="mt-1" wire:model.defer="title"
                        autocomplete="title" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>

                <div class="xl:col-span-1">
                    <x-jet-label for="description" class="w-full" value="{{ __('description') }}" />
                    <x-jet-input @keydown="isDisabled=false" id="description" type="text" class="w-full mt-1" wire:model.defer="description"
                        autocomplete="description" />
                    <x-jet-input-error for="description" class="mt-2" />
                </div>

                <x-jet-action-message class="xl:col-span-3" on="errore">

                    <label class='inline-flex text-red-600 font-bold text-xl'> {{ __($msgError . ' / ' . $codError) }}
                    </label>

                </x-jet-action-message>

                <div class="xl:col-span-1 mt-7 w-9/12">

                    <div class ='flex justify-items-end'>
                       <x-jet-button x-bind:disabled="isDisabled" @click="isDisabled=true" wire:click.prevent="store" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-jet-button>
                    </div>

                </div>

            </form>

            <x-jet-section-border />

            @foreach ($items as $item)
                @include('livewire.collections.item-include.trait-list')
            @endforeach
        </div>

        @if($confirmingTraitEdit)
            @include('livewire.collections.item-include.trait-edit-modal')
        @endif

        <x-jet-confirmation-modal wire:model="confirmingTraitDelete">
            <x-slot name="title">
                {{ __('Remove item') }}
            </x-slot>

            <x-slot name="message">
                <x-jet-action-message class="mr-3" on="errore">
                    <label class='text-red-800 font-bold text-xl'> {{ __('This trait cannot be deleted because there are any
                        files associated with it') }} </label>
                </x-jet-action-message>
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you would like to remove this trait?') }}
            </x-slot>

            <x-slot name="footer">

                <x-jet-secondary-button wire:click="$toggle('confirmingTraitDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Remove') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

    </x-slot:items>

</x-sidebar>
