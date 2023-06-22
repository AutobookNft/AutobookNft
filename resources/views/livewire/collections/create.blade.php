<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed-100 inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left
        overflow-hidden shadow-xl transform sm:align-middle w-96" role="dialog" aria-modal="true"
            aria-labelledby="modal-headline">

            <form wire:submit.prevent="upload()" wire:loading.attr="disabled">
                <!-- Aggiungi un campo di input per l'upload di immagini -->
                <div x-data="{ fileName: null, filePreview: null }" class="grid grid-cols-1 mb-4 bg-gray-500">

                    <p class="counded-t-b p-4 text-lg bg-gray-300 text-gray-800">
                        {{ __('Ti consiglio di non fare un upload di molti file di grandi dimensioni, il sistema potrebbe non consentirtelo
                        in base alla congestione della rete. Se hai file grandi oltre 30mb ti consiglio di fare l\'upload di un file per
                        volta') }}
                    </p>

                    <p class="counded-t-b p-4 text-lg bg-gray-300 text-red-800">
                        {{ __('dimensione massima di una singolo file: 100mb') }}
                    </p>

                    <div x-data="{ isUploading: false, progress: 0 }"
                        x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress"
                        class="bg-slate-200 border border-slate-600">

                        <label for="files" class="block text-gray-800 text-lg font-bold mb-2 p-4">{{ __('files:') }}</label>
                        <div class="grid grid-cols-6">
                            @foreach ($files as $file)
                                @if ($file->getClientOriginalExtension()!='tif')

                                    <div class = "max-w-24 max-h-24 rounded-full">
                                        <img src="{{ $file->temporaryUrl() }}" class="max-w-20 max-h-20 rounded-full">
                                    </div>

                                @endif
                            @endforeach
                        </div>
                        <div x-show="isUploading" class="px-2 w-full">
                            <progress max="1000" x-bind:value="progress"></progress>
                        </div>

                        <div class ="bg-slate-200 border border-slate-600">
                            <input
                                type="file"
                                id="files"
                                multiple
                                wire:model="files">

                            @error('files')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div>

                        <div class="relative pt-1">
                            <div class="overflow-hidden h-6 mb-4 text-md flex rounded bg-gray-100">

                                <div wire:loading class='text-black animate-pulse w-full h-6 p-1 hadow-none flex flex-col text-center whitespace-nowrap justify-center bg-green-500'>
                                    {{__('sto caricando i file attendi perfavore...')}}
                                </div>

                            </div>
                        </div>
                    </div>

                    @if ($this->errors)
                    @foreach ($this->errors as $error)
                    <li class="text-red-500"> {{ $error }} </li>
                    @endforeach
                    @endif

                    <div id="image-preview-grid" class="grid grid-cols-3">
                    </div>

                    <!-- Aggiungi un pulsante di submit per inviare il form -->
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                <!-- Aggiungi un pulsante di submit per inviare il form -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Save') }}
                            </button>
                        </span>

                    <div wire:loading.remove>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="closeModal()" type="button"
                                class="inline-flex items-center px-4 py-2 my-3 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm
                                hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                                    {{ __('Cancel') }}
                                </button>
                            </span>
                        </div>
                    </div>
            </form>
        </div>

    </div>
</div>

<script>
    window.livewire.on('refreshPage', () => {
            location.reload();
        });
    </script>
