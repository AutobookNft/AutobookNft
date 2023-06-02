<div class="grid xl1:grid-cols-6 md:gap-6 bg-gray-300 border border-gray-500 p-4 rounded-lg">

    <div class="xl1:col-span-1">
        <x-jet-label for="nick_name" class="w-full" value="{{ __('Nick name') }}" />
        <x-jet-input id="nick_name" type="text" class="mt-1 bg-gray-300" value="{{ $wallet->nick_name }}" disabled/>
        <x-jet-input-error for="nick_name" class="mt-2" />
    </div>

    <div class="xl1:col-span-2">
        <x-jet-label for="address" class="w-full" value="{{ __('Address') }}" />
        <x-jet-input id="address" type="text" class="bg-gray-300 w-full mt-1" value="{{ $wallet->address }}" disabled/>
        <x-jet-input-error for="address" class="mt-2" />
    </div>

    <div class="xl1:col-span-1">
        <x-jet-label for="royalty_mint" value="{{ __('Royalty mint') }}" />
        <x-jet-input id="royalty_mint" type="text" class="bg-gray-300 mt-1" value="{{ $wallet->royalty_mint }}" disabled/>
        <x-jet-input-error for="royalty_mint" class="mt-2" />
    </div>

    <div class="xl1:col-span-1">
        <x-jet-label for="royalty_scd_market" value="{{ __('Royalty second market') }}" />
        <x-jet-input id="royalty_scd_market" type="text" class="bg-gray-300 mt-1" value="{{ $wallet->royalty_scd_market }}" disabled />
        <x-jet-input-error for="royalty_scd_market" class="mt-2" />
    </div>

    <div class='xl1:col-span-1'>
        <x-jet-label for="royalty_mint" value="{{ __('') }}" />
        <button type="button" wire:click="confirmWalletEdit({{ $wallet->id }})"
            class="mt-8 ml-2 pl-6 pr-6 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">
            {{ __('Edit') }}
        </button>
        <button type="button" wire:click="confirmWalletyRemoval({{ $wallet->id }})"
            class="mt-8 ml-2  focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            {{ __('Delete') }}
        </button>
    </div>
</div>
