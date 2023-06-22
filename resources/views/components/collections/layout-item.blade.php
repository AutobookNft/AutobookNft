@php
    $class_input="shadow appearance-none border rounded text-lg w-full py-1 px-1 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
@endphp


<div class="relative bg-white rounded-lg shadow-md dark:bg-gray-800">


    @if($cardType=='zoom' || $cardType=='edit')
        @php $url = url('dashboard/collection/items_zoom/'.$itemId) @endphp
    @else
        @php $url = url('dashboard/collection/items_edit/'.$itemId) @endphp
    @endif

     <a href="{{ $url }}" class = "p-2 justify-center">

        {{-- @if($itemType=='image') --}}
            <div class = "flex justify-center">
                <img id='fileCover' name='fileCover' class="max-h-[200px] rounded-xl p-1" src="{{ $fileCover }}" alt="product image" title="{{ $imagetitle }}" />
            </div>
        {{-- @else
            <img id='fileCover' name='fileCover' wire:model='file_Cover' class="max-h-[200px] rounded-xl p-1" src="{{ $fileCover }}"  alt="product image" title="{{ $imagetitle }}" />
        @endif --}}

        <img src={{env('LOGO_01')}} class="w-8 h-8 p-1 rounded-lg absolute top-[2px] left-2 right-0 bg-opacity-50">
        <div class='auto text-center text-lg font-semibold tracking-tight text-red-500 absolute top-[4px] left-0 right-0'> {{ $title }}</div>

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

