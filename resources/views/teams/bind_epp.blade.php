<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <!-- This element is to trick the browser into centering the modal contents. -->
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl
                    transform sm:align-middle w-1/3"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">

            <table class="table-auto w-full text-left">
                <thead>
                    <tr>
                        <th class="px-4 py-2">{{ __('Epp') }}</th>
                        <th class="px-4 py-2">{{ __('Bind') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\Models\User::where('usertype', 'epp')->get() as $user)
                    <tr>
                        <td class="border px-4 py-2">
                            <p class ="">
                            <img class="inline p-1 max-h-16 max-w-16 rounded-2xl" src={{ $user['profile_photo_path'] }} alt="epp image" title="{{ $user['org_name'] }}">
                            {{ $user->org_name }}</p>
                        </td>
                        <td class="border px-4 py-2">
                            <x-jet-secondary-button type="button" class="mt-2 bg-green-700" wire:click="addEpp({{ $user->id }})">
                                {{ __('Add Epp') }}
                            </x-jet-secondary-button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                    <button wire:click="closeModal()" type="button"
                        class="inline-flex items-center px-4 py-2 my-3 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
                        {{ __('Cancel') }}
                    </button>
                </span>
            </div>

        </div>
    </div>
</div>
