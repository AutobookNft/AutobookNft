
@php
    $class_input="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
@endphp

<div class="relative flex flex-col bg-white rounded-lg shadow-md dark:bg-gray-800">
 
     
    @php $url = url('dashboard/drops/'.$drop->id) @endphp
   
    <a href="{{ $url }}" class = "p-2 justify-center">
                
        {{-- <img id='fileCover' name='fileCover' wire:model='thumbnail'  class="max-w-full rounded-lg" src="{{ $thumbnails }}" alt="product image" title="{{ $thumbnails }}" /> --}}
        <div class='auto text-center text-lg font-semibold tracking-tight text-red-500 absolute top-2 left-0 right-0'> {{ $drop->title }}</div>

    </a>
   
    {{-- <div class ="bg-red-500" >  {{ 'item type'. $itemType }} </div> --}}

    <div class="px-2.5 pb-2.5">

        @include('livewire.collections.item-include.drop')
       
    </div>
</div>

