<x-sidebar wichsidebar='drop-collection'>

    <x-slot:head>
        <x-sidebarhead
        image=""
        name="{{ $name }}"
        type=""
        pagename="{{ 'Drop collection' }}"/>
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>
    
    <x-slot:utility>
        <a href="{{ url('dashboard/collection/utilities/update') }}">
            <x-sidebar-item item='Utility' />
        </a>
    </x-slot:utility>

    
    <x-slot:items>
       
        
        <div class="absolute top-60 xs:left-60 xl:left-80 lg:w-5/6 md:2/6
                    grid xs:grid-cols-1 sm:grid-cols-2 ll:grid-cols-3 lg:grid-cols-4 
                    1500:grid-cols-5 1700:grid-cols-6
                    gap-4 p-2 rounded grid-flow-row">
        
            
            @foreach ($items as $item)

                @php($itemType=$item->type)
                @php($fileCover=$item->thumbnail)
                @switch($itemType)
                    @case('image')
                        @php($cardType='show')
                        @break
                    @case('audio')
                        @php($cardType='show')
                        @break
                    @case('e-book')
                        @php($cardType='show')
                        @break
                    @case('video')
                        @php($cardType='show')
                        @break
                    @default

                @endswitch
                
                @include("livewire.collections.collection-item")
            @endforeach

        </div>

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


