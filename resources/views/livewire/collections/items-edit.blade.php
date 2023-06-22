<x-sidebar wichsidebar='item-edit'>

    <x-slot:head>
        <x-sidebarhead
            image="{{ $teamItem->file_cover }}"
            name="{{ $team->name }}"
            type="{{ $teamItem->type }}"
            pagename="{{ 'Edit item' }}"/>
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item='Dashboard' />
        </a>
    </x-slot:dashboard>

    <x-slot:collection>
       <a href="{{ url('/dashboard/collection/item_upload/') }}">
            <x-sidebar-leftarrow item="{{ __('Collection') }}" />
        </a>
    </x-slot:collection>

    {{-- <x-slot:teamsetting>
        <a href="{{ url('/teams/'. $teamId) }}">
            <x-sidebar-item item='Teams setting' />
        </a>
    </x-slot:teamsetting> --}}

    <x-slot:traits>
       <a href="{{ url('dashboard/collection/items_edit/'. $itemId . '/traits') }}">
            <x-sidebar-item item='Traits' />
        </a>
    </x-slot:traits>

    <x-slot:utility>
        <a href="{{ url('dashboard/collection/item/utility/'. $itemId ) }}">
            <x-sidebar-item item='Utility' />
        </a>
    </x-slot:utility>

    <x-slot:sellitem>
        <a href="#" wire:click='openExternalTransfer'>
            <x-sidebar-item item="{{ _('External tranfer') }}"/>
        </a>
    </x-slot:sellitem>

    {{-- <x-slot:transfer>
            @include('livewire.collections.item-include.menudrop-list-teams')
    </x-slot:transfer> --}}


    <x-slot:bodyhead>

        <x-jet-confirmation-modal wire:model="confirmingItemTransfer">
            <x-slot name="title">
                {{ __('Transfer item') }}
            </x-slot>

            <x-slot name="message">
                <x-jet-action-message class="mr-3" on="errore">
                    <label class='text-red-800 font-bold text-xl'> {{ __('This item non cannot be transfered') }} </label>
                </x-jet-action-message>
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you would like to transfer this item from collection') . ' '. "$team->name" . __(' to collection ') }} {{ $team_name .'?' }}
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingItemTransfer')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="transfer({{ $itemId }})" wire:loading.attr="disabled">
                    {{ __('Transefer') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>


        @php
            $items_ = App\Models\Item_traits::where('teams_items_id', $itemId)->get();
        @endphp

        <div
            class="absolute top-20 xs:left-60 xl:left-80 lg:w-5/6 md:2/6 grid grid-cols-1 gap-4 p-2 rounded justify-items-start">

            @if(Auth::user()->usertype!='epp')
                <p class='font-medium text-white sm:text-4xl xl:text-7xl'> {{ __('Manage the ') }}{{ $teamItem->title }} {{ __('item') }}</p>
            @else
                <p class='font-medium text-white sm:text-4xl xl:text-7xl'> {{ $teamItem->title }} </p>
            @endif

        </div>
    </x-slot:bodyhead>

    <x-slot:items>

            @php
                $cardType='edit';
                $show_traits_button=false;
            @endphp

            @include('livewire.item-image')

            @if ($this->externaTransfer)
                @include('livewire.collections.item-include.external-transfer')
            @endif

            @php
                $traits = App\Models\Item_traits::where('teams_items_id', $itemId)->get();
            @endphp

            @include('livewire.collections.item-include.traits-for-item')

            @if($utility->util_description != '')
                @include('livewire.collections.item-include.utility-for-item')
            @endif

            <div
                class="min-w-full mx-auto bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 flex justify-center p-2">

                    {!! QrCode::size(200)->generate($utility->hash_file . ".webp") !!}

            </div>

    </x-slot:items>

</x-sidebar>

