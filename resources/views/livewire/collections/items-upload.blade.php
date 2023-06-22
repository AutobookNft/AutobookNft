<x-sidebar wichsidebar='items-upload'>

    <x-slot:head>
        <x-sidebarhead
        image="{{ $current_team->path_image_econft }}"
        name="{{ $current_team->name }}"
        type=""
        pagename="{{ 'Upload items' }}"/>
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item='Dashboard' />
        </a>
    </x-slot:dashboard>


    <x-slot:newitem>
        <a href='#' wire:click='create()'>
            <x-sidebar-item item='New item' />
        </a>
    </x-slot:newitem>

    <x-slot:headcollection>
        <a href="{{ url('/dashboard/collection/item_upload/head') }}">
            <x-sidebar-item item="{{ __('Head collection') }}" />
        </a>
    </x-slot:headcollection>

    <x-slot:asset>
        <a href="{{ url('/dashboard/collection/item_upload/asset') }}">
            <x-sidebar-item item="{{ __('Asset collection') }}" />
        </a>
    </x-slot:asset>

    <x-slot:team>
        <a href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
            <x-sidebar-item item="{{ __('Manage team') }}" />
        </a>
    </x-slot:team>

    <x-slot:utility>

        <a href="{{ url('dashboard/collection/utilities/update') }}">
            <x-sidebar-item item='Utility' />
        </a>
    </x-slot:utility>

    <x-slot:wallet>
        @if( $haveWallet>0)
            <a href="{{ url('dashboard/collection/wallet/update') }}">
        @else
            <a href="{{ url('dashboard/collection/wallet/update') }}">
        @endif
                <x-sidebar-item item='Manage wallet' />
            </a>
    </x-slot:wallet>


    <x-slot:bodyhead>

        @if($amountItems<1 && !$close)
            @php($isOpen=true)
        @endif

        @if ($isOpen)
            @include('livewire.collections.create')
        @endif

        @if(isset($drop))
            <button wire:click="confirmDrop" class="px-4 py-1 text-white bg-blue-500 rounded-md">{{('Drop')}}</button>
        @endif

        <!-- Finestra modale -->
        <x-jet-dialog-modal wire:model="confirmingDrop">
            <x-slot name="title">
                {{ __('Confirm Drop') }}
            </x-slot>

            <x-slot name="content">
                <!-- Elenco degli item selezionati -->
                @foreach ($selectedItems as $itemId)
                    <div>{{ $itemId }}</div>
                @endforeach
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="cancelDrop">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-button wire:click="drop">
                    {{ __('Drop') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>

        <div
            class="absolute top-20 xs:left-60 xl:left-80 lg:w-5/6 md:2/6 grid grid-cols-1 gap-4 p-2 rounded justify-items-start">
            @if(Auth::user()->usertype!='epp')
                <p class='font-medium text-white sm:text-4xl xl:text-7xl'> {{ $current_team->name }} {{ __('collection') }}</p>
            @else
                <p class='font-medium text-white sm:text-4xl xl:text-7xl'> {{ $current_team->name }} </p>
                <p class='font-font-light text-white text-2xl'> {{ $current_team->description }} </p>
            @endif
        </div>

    </x-slot:bodyhead>

    <x-slot:items>

            @foreach ($items as $item)

                @php($itemType=$item->type)

                @switch($itemType)
                    @case('image')
                        @php($cardType='show')
                        @php($fileCover=$item->hash_file . ".webp")
                        @break
                    @case('audio')
                        @php($cardType='show')
                        @php($fileCover=$item->file_cover . $item->extention)
                        @break
                    @case('e-book')
                        @php($cardType='show')
                        @break
                    @case('video')
                        @php($cardType='show')
                        @break
                    @default
                @endswitch

                @if (isset($drop))
                    @include("livewire.collections.collection-item-with-drop")
                @else
                    @include("livewire.collections.collection-item")
                @endif

            @endforeach



    </x-slot:items>

</x-sidebar>

    {{-- @section('scripts')
        <script>
            window.livewire.on('fileUploaded', (data) => {
                    let formData = new FormData();
                    formData.append('file', data.temporaryFilePath);
                    formData.append('originalName', data.originalName);
                    formData.append('mimeType', data.mimeType);
                    axios.post('/save-file', formData).then((response) => {
                        console.log(response.data);
                    });
                });
        </script>
    @endsection --}}


