<div class="grid xl:grid-cols-3 md:gap-3 bg-gray-300 border border-gray-500 p-4 rounded-lg">

    <div class="xl:col-span-1">
        <x-jet-label for="title" class="w-full" value="{{ __('Nick name') }}" />
        <x-jet-input id="title" type="text" class="mt-1 bg-gray-300" value="{{ $item->title }}" disabled/>
        <x-jet-input-error for="title" class="mt-2" />
    </div>

    <div class="xl:col-span-1">
        <x-jet-label for="description" class="w-full" value="{{ __('description') }}" />
        <x-jet-input id="description" type="text" class="bg-gray-300 w-full mt-1" value="{{ $item->description }}" disabled/>
        <x-jet-input-error for="description" class="mt-2" />
    </div>

    <div class='xl:col-span-1 mt-7 w-9/12'>
        <x-jet-label for="royalty_mint" value="{{ __('') }}" />
        <button type="button" wire:click="confirmTraitEdit({{ $item->id }})"
            class="ml-2 pl-4 pr-4 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
            {{ __('Edit') }}
        </button>
        <button type="button" wire:click="confirmTraitRemoval({{ $item->id }})"
            class="ml-2  focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            {{ __('Delete') }}
        </button>
    </div>
</div>