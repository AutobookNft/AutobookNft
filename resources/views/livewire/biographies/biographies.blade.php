<x-sidebar wichsidebar='biographies'>

    <x-slot:head>
        <x-sidebarhead
            image="{{ $biography->profile_photo_path }}"
            name="{{ $biography->first_name }}"
            type=""
            pagename="{{ 'Manage biographies' }}" />
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item="{{ __('Dashboard') }}" />
        </a>
    </x-slot:dashboard>

    <x-slot:back_to_profile>
        <a href="{{ url('/user/profile') }}">
            <x-sidebar-leftarrow item="{{ __('Back to profile') }}" />
        </a>
    </x-slot:back_to_profile>

    <x-slot:add_chapter>
        <a href="#" wire:click="addChapter">
            <x-sidebar-item item="{{ __('Add chapter') }}" />
        </a>
    </x-slot:add_chapter>

    <x-slot:items>

    <div class="absolute top-20 xs:left-60 xl:left-80 lg:w-5/6 md:2/6 grid grid-cols-1 gap-4 p-2 rounded grid-flow-row justify-items-start">
        <p class='font-medium text-white italic sm:text-4xl xl:text-7xl'> {{ __('Your biography') }}</p>
    </div>

    <div class="absolute top-52 xs:left-60 xl:left-80">

        <form id='form-id' x-data="{ isDisabled: true }"
                class="grid grid-cols-4 md:gap-2 bg-gray-300 border border-gray-500 p-4 rounded-lg"> @csrf

            <div class="col-span-1 w-full">
                <x-jet-label for="bio_title" class="w-full min-w-min" value="{{ __('Bio title') }}" />
                <x-jet-input id="bio_title" type="text" class="mt-1 w-full" wire:model.defer="bio_title" autocomplete="bio_title" />
                <x-jet-input-error for="bio_title" class="mt-2" />
            </div>

            <div class="col-span-4 w-full gap-2">

                <x-input-tinymce wire:model="bio_story" />

                <div class='flex gap-2 justify-end mt-2'>

                    <x-jet-action-message class="mr-3" on="saved">
                        <label class='text-green-800 font-bold text-xl'> {{ __('Saved!') }} </label>
                    </x-jet-action-message>

                    <x-jet-action-message class="mr-3" on="error">
                        <label class='text-red-500 font-bold text-xl'> {{ __($msgError) }} </label>
                    </x-jet-action-message>

                    <button id="save" disabled type="button" wire:click="update"
                            class="disabled max-w-40 focus:outline-none text-white focus:ring-4 focus:ring-green-300
                            font-medium rounded-lg text-xs sm:px-3 md:px-5 py-2 dark:focus:ring-green-800
                            bg-gray-600 dark:bg-gray-600
                            opacity-50">
                        {{ __('Save') }}
                    </button>

                    <button type="button" wire:click="delete"
                        class="max-w-40 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg
                                            text-xs sm:px-1 md:px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        {{ __('Delete') }}
                    </button>
                </div>

            </div>

        </form>

        <x-jet-section-border />

        @isset($chapters)
            @foreach ($chapters as $index => $chapter)

                @include('livewire.biographies.biography-chapter')

            @endforeach
        @endisset
    </div>

    <x-jet-confirmation-modal wire:model="confirmingBioDelete">
        <x-slot name="bio_title">
            {{ __('Remove biography') }}
        </x-slot>

        <x-slot name="title">
            <x-jet-action-message class="mr-3" on="errore">
                <label class='text-red-800 font-bold text-xl'> {{ __('This item cannot be deleted because there are any files
                    associated with it') }} </label>
            </x-jet-action-message>
        </x-slot>

        <x-slot name="message">
            <x-jet-action-message class="mr-3" on="errore">
                <label class='text-red-800 font-bold text-xl'> {{ __($msgError . " error code: ". $codError) }} </label>
            </x-jet-action-message>
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you would like to remove the bio story?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingBioDelete')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Remove') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

    </x-slot:items>

</x-sidebar>

<script>
    var chapter_title = document.getElementById('bio_title');

    chapter_title.addEventListener("keydown", enabledButton);

        function enabledButton(){

            var submitButton = document.getElementById('save');
            submitButton.disabled=false;
            handleButtonStateChange()
        };

        function handleButtonStateChange() {
            var button = document.getElementById('save');
            if (button.disabled) {

                button.classList.remove('bg-gray-500', 'dark:bg-gray-500', 'hover:bg-green-400', 'dark:hover:bg-green-400');
            } else {

                button.classList.add('hover:bg-green-400', 'dark:hover:bg-green-400', 'bg-green-500', 'dark:bg-green-500');
                button.classList.remove('opacity-50');
            }
        }

</script>
