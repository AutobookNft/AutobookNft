<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>

        {{-- <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform sm:align-middle w-1/3" role="dialog" aria-modal="true" aria-labelledby="modal-headline"> --}} 

            <div class="inline-block" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <form class="grid xl:grid-cols-3 md:gap-6 bg-gray-300 border border-gray-500 p-4 rounded-lg transform">

                   <div class="xl:col-span-1">
                    <x-jet-label for="edit_title" class="w-full" value="{{ __('Title') }}" />
                    <x-jet-input id="edit_title" type="text" class="mt-1" wire:model="edit_title" value="edit_title" />
                    <x-jet-input-error for="title" class="mt-2" />
                </div>
                
                <div class="xl:col-span-1">
                    <x-jet-label for="edit_description" class="w-full" value="{{ __('Description') }}" />
                    <x-jet-input id="edit_description" type="text" class="w-full mt-1" wire:model="edit_description" value="edit_description" />
                    <x-jet-input-error for="address" class="mt-2" />
                </div>
                    <x-jet-action-message class="xl1:col-span-6" on="errore">

                        <label class='inline-flex text-red-600 font-bold text-xl'> {{ __($msgError . ' / ' . $codError) }}
                        </label>

                    </x-jet-action-message>

                    <div class="flex items-center justify-end bg-gray-300">

                        <x-jet-action-message on="saved">
                            <label class='text-green-800 font-bold'> {{ __('Saved!') }} </label>
                        </x-jet-action-message>

                        <x-jet-button wire:click.prevent="edit()" wire:loading.attr="disabled">
                            {{ __('Edit') }}
                        </x-jet-button>

                    </div>
                    
                </form>
            </div>
    </div>
</div>    