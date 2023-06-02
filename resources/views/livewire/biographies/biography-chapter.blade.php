<div id='form-id' x-data="{ isDisabled_c: true }"
    class="grid xl1:grid-cols-3 md:gap-2 bg-purple-200 border border-gray-500 p-4 rounded-lg"> @csrf

    <div class="xl:col-span-1 w-full">
        <x-jet-label for="chapter_title" class="w-full min-w-min" value="{{ __('Chapter title') }}"/>
        <div  class="text-lg py-2 px-3 text-gray-700 font-bold w-full" disabled>
        {{ $chapter->chapter_title }}
        </div>
    </div>

    <div class="xl:col-span-1 w-full">
        <x-jet-label for="chapter_date-dal" class="w-full" value="{{ __('Chapter date dal') }}" />
        <div class="text-lg py-2 px-3 text-gray-700 font-bold w-full" disabled>
            {{  $chapter->chapter_bio_date_dal  }}
        </div>
    </div>

    <div class="xl:col-span-1 w-full">
        <x-jet-label for="chapter_date_al" class="w-full" value="{{ __('Chapter date al') }}" />
        <div class="text-lg py-2 px-3 text-gray-700 font-bold w-full" disabled>
            {{ $chapter->chapter_bio_date_al }}
        </div>
    </div>

    <div class="col-span-3 w-full gap-2">

        <span disabled>{!! $chapter->chapter_biography !!}</span>

        <div class='flex gap-2 justify-end mt-2'>

            <x-jet-action-message class="mr-3" on="saved">
                <label class='text-green-800 font-bold text-xl'> {{ __('Saved!') }} </label>
            </x-jet-action-message>

            <x-jet-action-message class="mr-3" on="errore_c">
                <label class='text-red-500 font-bold text-xl'> {{ __($msgError) }} </label>
            </x-jet-action-message>

            <a href="{{ url('/user/profile/biographies/chapter/'. $chapter->id) }}">
                <button class="hover:bg-green-800 dark:hover:bg-green-700 bg-green-700 dark:bg-green-600 max-w-40 focus:outline-none text-white focus:ring-4
                        focus:ring-green-300 font-medium rounded-lg text-xs sm:px-3 md:px-5 py-2 dark:focus:ring-green-800">
                    {{ __('Edit') }}
                </button>
            </a>

            <button type="button" wire:click="confirmChapterDelete({{ $chapter->id }})"
                class="max-w-40 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg
                            text-xs sm:px-1 md:px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                {{ __('Delete') }}
            </button>
        </div>

    </div>

</div>

<x-jet-section-border />


<x-jet-confirmation-modal wire:model="confirmingChapterDelete">
    <x-slot name="chapter_title">
        {{ __('Remove biography') }}
    </x-slot>

    <x-slot name="title">
        <x-jet-action-message class="mr-3" on="errore">
            <label class='text-red-800 font-bold text-xl'> {{ __('This item cannot be deleted because there are any
                files
                associated with it') }} </label>
        </x-jet-action-message>
    </x-slot>

    <x-slot name="message">
        <x-jet-action-message class="mr-3" on="errore">
            <label class='text-red-800 font-bold text-xl'> {{ __('This item cannot be deleted because there are any
                files associated with it') }} </label>
        </x-jet-action-message>
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you would like to remove this chapter?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$toggle('confirmingChapterDelete')" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-3" wire:click="chapterDelete" wire:loading.attr="disabled">
            {{ __('Remove') }}
        </x-jet-danger-button>
    </x-slot>

</x-jet-confirmation-modal>


