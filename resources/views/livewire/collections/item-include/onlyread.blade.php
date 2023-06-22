<div class = "flex flex-col gap-2">

    @if(Auth::user()->usertype!='epp')

        {{-- visualizza item type --}}
        {{-- <div class='mt-2 italic text-sm text-italic font-semibold tracking-tight text-gray-900 dark:text-white'>{{ 'EcoNFT type: '. $itemType }}</div> --}}

        {{-- visualizza la scritta Published o Unpublished --}}
        <div class='italic text-sm text-italic font-semibold tracking-tight text-gray-900 dark:text-white'>
            {{-- Show è il nome del campo della tabella che contiene il valore booleano --}}
            @if($show)
                <p style="color: #06b967">
                <svg class = 'inline' xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                <path
                    d="M440 974q-76-8-141.5-41.5t-114-87Q136 792 108 723T80 576q0-91 36.5-168T216 276h-96v-80h240v240h-80V327q-55 44-87.5 108.5T160 576q0 123 80.5 212.5T440 893v81Zm-17-214L254 590l56-56 113 113 227-227 56 57-283 283Zm177 196V716h80v109q55-45 87.5-109T800 576q0-123-80.5-212.5T520 259v-81q152 15 256 128t104 270q0 91-36.5 168T744 876h96v80H600Z" fill="#06b967"/>
                </svg>
                {{ __('Published') }}</p>
            @else
                <p style="color:#ff0000">
                <svg class = 'inline' xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                    <path
                        d="m20.475 23.3-2.95-2.95q-1.2.8-2.587 1.225Q13.55 22 12 22q-2.075 0-3.9-.788-1.825-.787-3.175-2.137-1.35-1.35-2.137-3.175Q2 14.075 2 12q0-1.55.425-2.938.425-1.387 1.225-2.587L.675 3.5 2.1 2.075l19.8 19.8ZM12 20q1.125 0 2.137-.3 1.013-.3 1.913-.825L12.175 15 10.6 16.6l-4.25-4.25 1.4-1.4 2.85 2.85.175-.2-5.65-5.65q-.525.9-.825 1.913Q4 10.875 4 12q0 3.325 2.338 5.663Q8.675 20 12 20Zm8.375-2.5L18.9 16.025q.525-.875.812-1.888Q20 13.125 20 12q0-3.325-2.337-5.663Q15.325 4 12 4q-1.125 0-2.137.287-1.013.288-1.888.813L6.5 3.625q1.2-.775 2.588-1.2Q10.475 2 12 2q2.075 0 3.9.787 1.825.788 3.175 2.138 1.35 1.35 2.137 3.175Q22 9.925 22 12q0 1.525-.425 2.912-.425 1.388-1.2 2.588Zm-5.325-5.35-1.4-1.4 2.6-2.6 1.4 1.4Zm-1.6-1.6ZM10.6 13.4Z" fill="#ff0000"/>
                </svg>
                {{ __('Unpublished') }}</p>
            @endif
        </div>
    @endif

    {{-- descrizione --}}
    <div class ="grid grid-cols-1">
        <div class ='w-70 italic text-sm text-italic font-semibold tracking-tight text-gray-900 dark:text-white'>
            {{ Str::words($description, 50, '...') }}
        </div>
    </div>

    {{-- data di creazione --}}
    @if($datecreation)
        <div class='mr-2 mb-1 auto text-right text-white'>
            <span class='shadow appearance-none text-sm text-gray-200 focus:outline-none focus:shadow-outline'>
                {{ $datecreation }}
            </span>
        </div>
    @endif

    {{-- il prezzo --}}
    @if($price)
        <div class ='mr-2 mb-2 auto text-right'>
            <span class='text-md font-semibold tracking-tight text-gray-900 bg-gray-200 rounded p-2'>
                {{ __('Price: ') .  $price . __(' Algo') }}
            </span>
        </div>
    @endif

    {{-- Checkbox per DROP --}}
    {{-- empty è scritto in collection-item nel caso in cui $drop non sia settato, se si testa $drop in collection-item si genera un errore --}}
    @if($drop!='empty')
        @if(!$item->drop_id)
            <div class ='mr-2 mb-2 auto text-right'>
                <span for='drop' class="ml-2 text-sm text-gray-600">{{ __('Drop') }}</span>
                <input id='drop' type="checkbox" value="{{ $item->id }}" wire:model="selectedItems">
            </div>
        @endif
        @if($item['drop_id'])
            <div class ='mr-2 mb-2 auto text-right'>
                <span class='text-md font-semibold tracking-tight text-gray-900 bg-gray-200 rounded p-2'>
                    {{ __('Drop title: ') . $dropTitle }}
                </span>
            </div>
        @endif
    @endif

    {{-- path webp --}}
    {{-- <div class ='mr-2 mb-2 auto text-right'>
        <span class='text-md font-semibold tracking-tight text-gray-900 bg-gray-200 rounded p-2'>
            {{ Str::limit($webp, 15, '...') }}
        </span>
    </div> --}}

    {{-- extention --}}
    {{-- <div class ='mr-2 mb-2 auto text-right'>
        <span class='text-md font-semibold tracking-tight text-gray-900 bg-gray-200 rounded p-2'>
            {{ $extention }}
        </span>
    </div> --}}

</div>

{{-- scheda dei traits --}}
@if ($collectionDrop != 'drop')
    @include('livewire.collections.item-include.traits-for-item')

    @php
        $utility = App\Models\Teams_item::find($itemId);
    @endphp

    {{-- Scheda delle utility --}}
    @if(isset($utility->util_description))
        @include('livewire.collections.item-include.utility-for-item')
    @endif

@endif

