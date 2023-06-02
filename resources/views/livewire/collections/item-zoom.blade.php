<x-sidebar wichsidebar='item-zoom'>

    <x-slot:head>
        <x-sidebarhead
            image="{{ $teamItem->thumbnail }}"
            name="{{ $collectionname }}"
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

    <x-slot:itemedit>
       <a href="{{ url('/dashboard/collection/items_edit/'. $itemId) }}">
            <x-sidebar-leftarrow item="{{ __('Back to item-edit') }}" />
        </a>
    </x-slot:itemedit>

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

    <x-slot:items class="font-bold">


        <div class="absolute top-40 xs:left-60 xl:left-80 
                        gap-4 p-2 rounded grid-flow-row border border-red-500">

            <img src="{{$teamItem->hash_file}}" class="w-full h-full rounded">  
          


          
        </div>

    </x-slot:items>

</x-sidebar>
