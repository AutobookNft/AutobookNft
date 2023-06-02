<div class="{{ $bgColor }} border border-red-900 rounded grid grid-cols-5 p-2 mb-1">

    <div class='col-span-5 mb-1'>
        @if($item->description)
        <a href='#' id="description" name="description"
            class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $item->description }}
        </a>
        @endif
    </div>

    <div class='col-span-5 mb-1'>
        @if($item->code)
        <a href='#' id="code" name="code"
            class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $item->code }}
        </a>
        @endif
    </div>

    <div class='col-span-5 mb-1'>
        @if ($item->creation_data)
        <a href='#' id="description" name="data_creation"
            class="bg-gray-300 border border-gray-300 text-gray-900 text-sm rounded-lg
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{ $item->creation_data }}
        </a>
        @endif
    </div>

    @if($item->joint)

        @php
            $joint="Utility joint whith the item";
            $color="text-red-500";
        @endphp

    @else

        @php
            $joint="Utility NOT joint width the item";
            $color="text-yellow-500";
        @endphp

    @endif


    <div class='col-span-5 mb-1'>


        <span id="joint" name="joint"
            class="bg-black border border-gray-300 {{ $color }} text-md rounded-lg
                    focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
                    dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    {{  $joint }}
        </span>

    </div>

    <div class='col-span-5 mb-1'>
        @if ($item->note)
            <a href='#' id="description" name="note"
                class="bg-gray-300 border border-gray-300 text-gray-900 text-md rounded-lg
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:border-gray-600
                        dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{ $item->note }}
            </a>
        @endif
    </div>

    <div class='flex justify-end cols-1'>

        @if($utility_type=='item')
            @php($route="dashboard/collection/items_edit/" . $item->teams_items_id . "/utility/edit/" .$item->id)
        @else
            @php($route="dashboard/collection/utilities/edit/". $item->id)
        @endif
        
        <a href="{{ url("$route") }}" type="button"
            class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium
            rounded-lg text-sm w-full ml-2 px-2.5 py-2.5 text-center dark:bg-green-600
            dark:hover:bg-green-700 dark:focus:ring-green-800">
            {{ __('Edit') }}
        </a>

        <button type="button" wire:click="confirmUtilityRemoval({{ $item->id }})"

            class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium
                rounded-lg text-sm w-full px-2.5 py-2.5 ml-1 mr-1 text-center dark:bg-red-600
                dark:hover:bg-red-700 dark:focus:ring-red-800">
            {{ __('Delete') }}
        </button>

    </div>

</div>
