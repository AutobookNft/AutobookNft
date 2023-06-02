<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed-100 inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left 
        overflow-hidden shadow-xl transform sm:align-middle w-96"
             role="dialog"
             aria-modal="true"
             aria-labelledby="modal-headline">

            <form wire:submit.prevent="externalTransfer({{$itemId}})" wire:loading.attr="disabled">
                <!-- Aggiungi un campo di input per l'upload di immagini -->
                <div x-data="{ fileName: null, filePreview: null }" class="grid grid-cols-1 mb-4 bg-gray-500">

                    <div>
                        <x-jet-validation-errors class="mb-4 text-lg bg-black" />
                    </div>

                    <p class ="counded-t-b p-4 text-lg bg-gray-300 text-red-800">
                        {{ __("Scrivi la mail del compratore") }}
                    </p>

                    <label for="emailExternaTransfer" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <div class="relative mb-6">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        </div>
                        <input wire:model='emailExternaTransfer' type="email" id="emailExternaTransfer" name= "emailExternaTransfer" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@frangette.com">
                    </div>

                <div id="image-preview-grid" class="grid grid-cols-3">
                </div>

                <!-- Aggiungi un pulsante di submit per inviare il form -->
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                   
                        <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700
                                active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Transfer') }}
                            </button>
                        </span>
                    
                    <div wire:loading.remove>
                        <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                            <button wire:click="closeExternalTransfer" type="button" 
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

