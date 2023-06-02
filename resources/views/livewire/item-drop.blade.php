<div>
    <div
        class="absolute top-20 left-20 lg:w-5/6 md:2/6 grid grid-cols-1 gap-4 p-2 rounded justify-items-start">
        <p class='font-medium text-white sm:text-4xl xl:text-7xl'> {{ __('Manage the Drop') }}</p>
    </div>

    @php
        $cardType='show';
        $show_traits_button=false;
        $collectionDrop='drop';
    @endphp

    @if(!$dropSelect)
        @php($drops=$drop)      
        @include('livewire.drop-crud')
    @else
        <div
            class="absolute top-60 xs:left-60 xl:left-80 lg:w-5/6 md:2/6
                    grid xs:grid-cols-1 sm:grid-cols-2 ll:grid-cols-3 lg:grid-cols-4 
                    1500:grid-cols-5 1700:grid-cols-6
                    gap-4 p-2 rounded grid-flow-row">

            @foreach ($items as $item)
                @php($itemType=$item->type)
                @switch($itemType)
                    @case('image')
                        @php($cardType='show')
                        @php($fileCover=$item->thumbnail)
                        @break
                    @case('audio')
                        @php($cardType='show')
                        @php($fileCover=$item->filecover)
                        @break
                    @case('e-book')
                        @php($cardType='show')
                        @break
                    @case('video')
                        @php($cardType='show')
                        @break
                    @default

                @endswitch
                @include("livewire.collections.collection-drop-item")
            @endforeach
        </div>
    @endif
</div>
            




