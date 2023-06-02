<x-sidebar wichsidebar='chapters'>

    <x-slot:head>
        <x-sidebarhead image="{{ Auth::user()->profile_photo_path }}" name="{{ Auth::user()->first_name }}" type=""
            pagename="{{ 'Manage chapters' }}" />
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item="{{ __('Dashboard') }}" />
        </a>
    </x-slot:dashboard>

    <x-slot:back_to_bio>
        <a href="{{ url('/user/profile/biographies') }}">
            <x-sidebar-leftarrow item="{{ __('Back to biography') }}" />
        </a>
    </x-slot:back_to_bio>

    <x-slot:new_chapter>
        <a href="#" wire:click="addChapter">
            <x-sidebar-item item="{{ __('New chapter') }}" />
        </a>
    </x-slot:new_chapter>

    <x-slot:items>

        <div class="absolute top-20 xs:left-60 xl:left-96 lg:w-5/6 md:2/6 grid grid-cols-1 gap-4 p-2 rounded grid-flow-row justify-items-start">
            <p class='font-medium text-white italic sm:text-4xl xl:text-7xl'>
                {{ __("Chapter: ")}}

                {{ $chapter->chapter_title }}

            </p>
        </div>

        <div class="absolute top-52 xs:left-60 xl:left-96">

            <form id='form-id' wire:submit.prevent="chapterUpdate({{$chapter->id}})" x-data="{ isDisabled: true }"
                class="grid xl1:grid-cols-4 md:gap-2 bg-purple-200 border border-gray-500 p-4 rounded-lg" @click.outside="whydontsave({{ $chapter->id }})"> @csrf

                <div class="xl:col-span-1 w-full">
                    <x-jet-label for="chapter_title" class="w-full min-w-min" value="{{ __('Chapter title') }}" />
                    <x-jet-input id="chapter_title" type="text" class="mt-1 w-full" wire:model.defer="chapter_title"/>
                    <x-jet-input-error for="chapter_title" class="mt-2" />
                </div>

                <div class="xl:col-span-1 w-full">
                    <x-jet-label for="chapter_bio_date_dal" class="w-full" value="{{ __('Chapter date from') }}" />
                    <x-jet-input id="chapter_bio_date_dal" type="date" class="w-full mt-1"
                        wire:model.defer="chapter_bio_date_dal" />
                    <x-jet-input-error for="chapter_bio_date_dal" class="mt-2" />
                </div>

                <div class="xl:col-span-1 w-full">
                    <x-jet-label for="chapter_bio_date_al" class="w-full" value="{{ __('Chapter date to') }}" />
                    <x-jet-input id="chapter_bio_date_al" type="date" class="w-full mt-1"
                        wire:model.defer="chapter_bio_date_al" />
                    <x-jet-input-error for="chapter_bio_date_al" class="mt-2" />
                </div>

                <div class="col-span-4 w-full gap-2">
                    <x-jet-label for="chapter_biography" class="w-full" value="{{ __('Chapter') }}" />

                    <x-input-tinymce wire:model="chapter_biography" />

                    <div class='flex gap-2 justify-end mt-2'>

                        <x-jet-action-message class="mr-3" on="saved">
                            <label class='text-green-800 font-bold text-xl'> {{ __('Saved!') }} </label>
                        </x-jet-action-message>

                        <x-jet-action-message class="mr-3" on="error">
                            <label class='text-red-500 font-bold text-xl'> {{ __($msgError) }} </label>
                        </x-jet-action-message>

                        <button id="save"
                            disabled
                            type="submit"
                            class="disabled max-w-40 focus:outline-none text-white focus:ring-4 focus:ring-green-300
                            font-medium rounded-lg text-xs sm:px-3 md:px-5 py-2 dark:focus:ring-green-800
                            bg-gray-600 dark:bg-gray-600
                            opacity-50">
                            {{ __('Save') }}
                        </button>

                        <button type="button" wire:click="confirmChapterDelete({{ $chapter->id }})"
                            class="max-w-40 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg
                            text-xs sm:px-1 md:px-3 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                            {{ __('Delete') }}
                        </button>
                    </div>

                </div>

            </form>
        </div>


        <x-jet-section-border />

        <x-jet-confirmation-modal wire:model="confirmingChapterDelete">
            <x-slot name="chapter_title">
                {{ __('Remove chapter') }}
            </x-slot>

            <x-slot name="title">
                <x-jet-action-message class="mr-3" on="errore">
                    <label class='text-red-800 font-bold text-xl'> {{ __('Removed a chapter') }} </label>
                </x-jet-action-message>
            </x-slot>

            <x-slot name="message">
                <x-jet-action-message class="mr-3" on="ceck">
                    <label class='text-red-800 font-bold text-xl'> {{ __($msgError . " error code: ". $codError) }} </label>
                </x-jet-action-message>
            </x-slot>

            {{-- <x-slot name="message">
                <x-jet-action-message class="mr-3" on="errore">
                    <label class='text-red-800 font-bold text-xl'> {{ __($msgError . " error code: ". $codError) }} </label>
                </x-jet-action-message>
            </x-slot> --}}

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

    </x-slot:items>

</x-sidebar>

<script>
        var chapter_title = document.getElementById('chapter_title');
        var chapter_bio_date_dal = document.getElementById('chapter_bio_date_dal');
        var chapter_bio_date_al = document.getElementById('chapter_bio_date_al');
        chapter_title.addEventListener("keydown", enabledButton);
        chapter_bio_date_dal.addEventListener("change", enabledButton);
        chapter_bio_date_al.addEventListener("change", enabledButton);

        function whydontsave($id){
            var button = document.getElementById('save');
            if (!button.disabled) {
                if (window.confirm('Vuoi salvare i dati modificati?', 'Ok')) {
                    // Richiamo il metodo Livewire per salvare i dati
                    console.log('User clicked "OK"');
                    window.livewire.emit("chapterUpdate", $id);
                } else {
                    // Emetti l'evento Livewire chapterUpdate comunque, in modo che il componente sia aggiornato
                    window.livewire.emit("chapterUpdate");
                }
            }
        }

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
