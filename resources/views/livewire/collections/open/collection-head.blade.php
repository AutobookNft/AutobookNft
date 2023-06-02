<x-app-layout>
    <x-sidebar wichsidebar='open-setting-collection'>


    <x-slot:head>
        <x-sidebarhead
        image="{{ $team->path_image_econft }}"
        name="{{ $team->name }}"
        type=""
        pagename="{{ 'Handle a head collection' }}"/>
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

    <x-slot:items>

    <div class="absolute top-20 xs:left-60 xl:left-80 bg-white border-red-900 max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 rounded">

        @switch($type)
            @case('head')

                    @livewire('collections.setting.data-collection-form' , ['team' => $team])

                @break
            @case('asset')

                    @livewire('collections.setting.eco-asset-nft-form' , ['team' => $team])

                @break
            @default

        @endswitch

    </div>

    </x-slot:items>

    </x-sidebar>
</x-app-layout>
