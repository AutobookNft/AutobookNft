@php
    $class_input="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
@endphp


<div class="relative flex flex-col bg-white rounded-lg shadow-md dark:bg-gray-800">


    @if($cardType=='zoom' || $cardType=='edit')
        @php $url = url('dashboard/collection/items_zoom/'.$itemId) @endphp
    @else
        @php $url = url('dashboard/collection/items_edit/'.$itemId) @endphp
    @endif

     <a href="{{ $url }}" class = "p-2 justify-center">

        @if($itemType=='image')
            <img id='fileCover' name='fileCover' wire:model='thumbnail'  class="max-w-full rounded-lg" src="{{ $fileCover }}" alt="product image" title="{{ $imagetitle }}" />
        @else
            <img id='fileCover' name='fileCover' wire:model='file_Cover' class="max-w-full rounded-lg" src="{{ $fileCover }}"  alt="product image" title="{{ $imagetitle }}" />
        @endif

        <img src='/storage/images/default/logo_t.png' class="w-10 h-10 p-1 rounded-lg absolute top-2 left-1 right-0 bg-opacity-50">
        <div class='auto text-center text-lg font-semibold tracking-tight text-red-500 absolute top-2 left-0 right-0'> {{ $title }}</div>

    </a>

    @if( $itemType=='video' || $itemType=='audio')
        @include('livewire.collections.item-include.media-controller')
    @endif

    {{-- <div class ="bg-red-500" >  {{ 'item type'. $fileCover }} </div> --}}

    <div class="px-2.5 pb-2.5">

        {{-- @include('livewire.collections.item-include.star') --}}

        @switch($cardType)

            @case('edit')
                @include('livewire.collections.item-include.form')
                @break
            @case('show')
                @include('livewire.collections.item-include.onlyread')
                @break
            @case('zoom')
                @include('livewire.collections.item-include.onlyread')
                @break
            @case('file')
                @include('livewire.collections.item-include.onlydelete')
                @break
            @default

        @endswitch

    </div>
</div>

