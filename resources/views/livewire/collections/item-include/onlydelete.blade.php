<h5 class="text-sm font-semibold tracking-tight text-gray-900 dark:text-white">{{ __('File n. ') }}{{ $itemId }}</h5>

{{-- @if (Gate::check('update', $team)) --}}
<div class='flex justify-end'>

    <button type="button" wire:click="confirmItemRemoval({{ $itemId }})"
        class="ml-2 w-12/12 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
        {{ __('Delete') }}
    </button>
</div>
{{-- @endif --}}

<x-jet-confirmation-modal wire:model="confirmingItemDelete">
    <x-slot name="title">
        {{ __('Remove item') }}
    </x-slot>

    <x-slot name="message">
        <x-jet-action-message class="mr-3" on="errore">
            <label class='text-red-800 font-bold text-xl'> {{ __('This item cannot be deleted because there are any files associated with it') }} </label>
        </x-jet-action-message>
    </x-slot>

    <x-slot name="content">
        {{ __("Are you sure you would like to remove the file n. $itemIdBeingRemoved") }} 
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click="$toggle('confirmingItemDelete')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
            {{ __('Remove') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>

<script>

    // document.addEventListener('DOMContentLoaded', () => {
    //     const form = document.querySelector('#form-id');
    //     form.addEventListener('saved', () => {
    //         form.classList.add('animate-bg-saved');
    //         setTimeout(() => {
    //             form.classList.remove('animate-bg-saved');
    //         }, 1000);
    //     });
    // });

</script>



