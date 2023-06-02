<form wire:click="edit" id='form-id' wire:submit.prevent="edit" x-data="{ isDisabled: true }"> @csrf

    @if($itemType=='audio' && $cardType !='show' && $paired==false)
        @include('livewire.collections.item-include.cover-select')
    @endif

    @if($itemType=='audio' && $cardType !='show' && $paired==true)
        @include('livewire.collections.item-include.cover-unbind')
    @endif

    <div :class= "{'bg-gray-600':!isDiabled}">

    <div class="grid grid-cols-1 m-1">
        <div class="col-span-12">
            <label for="title" class='text-white'> {{ __('Collection') }}
                <input type="text" id="collection" class="{{ $class_input }} opacity-50" Value="{{ $collectionname }}" disabled>
            </label>

        </div>
    </div>

    <div class="grid grid-cols-1 m-1">
        <div class="col-span-12">
            <label for="title" class='text-white'> {{ __('Title') }} <span class = "text-xs"> {{ ('(max 25 chars)') }} </span>
                <input @keydown="isDisabled = false" maxlength ="25" type="text" id="title" wire:model.defer="state.title"
                    :disabled="!Gate::check('update', $team)" class="{{ $class_input }}">
            </label>
            <x-jet-input-error for="title" class="mt-1" />
        </div>
    </div>

    @if(Auth::user()->usertype!='epp')
        <div class="grid grid-cols-1 m-1">
            <div class="col-span-12">
                <label for="price" class='text-white'> {{ __('Floor price') }} <span class='text-xs'> {{ __('(ALGO)') }}</span>
                    <input @keydown="isDisabled = false" type="text" id="price" wire:model.defer="state.price"
                        :disabled="!Gate::check('update', $team)" class="{{ $class_input }}">
                </label>
                <x-jet-input-error for="price" class="mt-1" />
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 m-2">
        <label for="description" class="block text-white text-lg mb-2">{{ __('Description') }}: <span class='text-xs'> {{ __('(max 2000 chars)') }}</span></label>

        <textarea @keydown="isDisabled = false" rows="5" cols="40" maxlength ="2000"
            class="shadow appearance-none border rounded text-lg py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full"
            id="description" wire:model.defer="state.description" :disabled="!Gate::check('update', $team)"
            placeholder="{{ __('Enter description') }}">

        </textarea>
        @error('description')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="grid grid-cols-1 m-2">
        <label for="creation_date" class="block text-white text-lg mb-2">{{ __('Creation date') }}:</label>
        <input @keydown="isDisabled = false" type="date"
            class="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="creation_date" wire:model.defer="state.creation_date" :disabled="!Gate::check('update', $team)">
        @error('creation_date')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="grid grid-cols-1 rows-2 m-2">

        <label class="relative inline-flex items-center cursor-pointer">
            <input @change="isDisabled = false" type="checkbox" id="show" name="show" class="sr-only peer" checked
                wire:model.defer="state.show">
            <div
                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
            </div>
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Publish') }}</span>
        </label>

        <label class="relative inline-flex items-center cursor-pointer">
            <input @keydown="isDisabled=false" type="text" id="position" wire:model.defer="state.position"
                :disabled="!Gate::check('update', $team)" class="rounded-lg bg-gray-200 h-6 p-2 mt-2 text-sm w-1/5">
            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Position') }}</span>
        </label>
        <p class='text-red-700 font-extrabold text-2xl justify-items-center' x-show='!isDisabled'>{{__('Remember to save')}}</p>
    </div>

    {{-- @if (Gate::check('update', $team)) --}}
        <div class='grid grid-cols-3 justify-end'>
            <x-jet-action-message class="mr-3" on="saved">
                <label class='text-green-800 font-bold text-xl'> {{ __('Saved!') }} </label>
            </x-jet-action-message>''

            <button x-bind:disabled="isDisabled" type="submit" wire:loading.attr="disabled" @click="isDisabled=true"
                :class="{'hover:bg-green-800 dark:hover:bg-green-700 bg-green-700 dark:bg-green-600':! isDisabled, 'bg-gray-500 dark:bg-gray-500': isDisabled }"
                class="mt-2 w-12/12 col-start-2 focus:outline-none text-white  focus:ring-4 focus:ring-green-300
                font-medium rounded-lg text-xs px-5 py-2   dark:focus:ring-green-800">
                {{ __('Save') }}
            </button>

            <button type="button" wire:click="confirmItemRemoved({{ $itemId }})"
                class="mt-2 ml-2 w-12/12 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                {{ __('Delete') }}
            </button>
        </div>
    {{-- @endif --}}
    </div>

</form>

<x-jet-confirmation-modal wire:model="confirmItemRemoval">
    <x-slot name="title">
        {{ __('Remove item') }}
    </x-slot>

    <x-slot name="message">
        <x-jet-action-message class="mr-3" on="errore">
            <label class='text-red-800 font-bold text-xl'> {{ __('This item cannot be deleted because there are any files associated with it') }} </label>
        </x-jet-action-message>
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to remove this item?') }}
    </x-slot>

    <x-slot name="footer">

        <x-jet-secondary-button wire:click="$toggle('confirmItemRemoval')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
            {{ __('Remove') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>



<script>

    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('#form-id');
        form.addEventListener('saved', () => {
            form.classList.add('animate-bg-saved');
            setTimeout(() => {
                form.classList.remove('animate-bg-saved');
            }, 1000);
        });
    });

</script>


