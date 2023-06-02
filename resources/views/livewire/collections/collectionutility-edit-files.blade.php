<x-sidebar wichsidebar='collection_utility_files'>

    @php($controll='\app\Http\Livewire\ItemutilityEditFiles.php')

    <x-slot:head>
        <x-sidebarhead
            image="{{ $current_team->path_image_econft }}"
            name="{{ $current_team->name }}"
            type="{{ $current_team->name }}"
            pagename="{{ 'Attachment files' }}" />
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item='Dashboard' />
        </a>
    </x-slot:dashboard>

    <x-slot:back_to_utility_list>
        <a href="{{ url('/dashboard/collection/utilities/edit/' . $utilityID) }}">
            <x-sidebar-leftarrow item="{{ __('Back to edit utility') }}" />
        </a>
    </x-slot:back_to_utility_list>


    <x-slot:items>

        <div class="absolute top-20 xs:left-60 xl:left-80 lg:w-5/6 md:2/6 bg-white border-red-900
                grid xs:grid-cols-1 sm:grid-cols-2 ll:grid-cols-3 lg:grid-cols-4 1500:grid-cols-5 1700:grid-cols-6
                gap-4 p-2 rounded grid-flow-row">

            @foreach ($items as $item)
                @include('livewire.item-file')
            @endforeach

        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                {{ $items->links() }}
            </div>
        </div>

    </x-slot:items>

</x-sidebar>
