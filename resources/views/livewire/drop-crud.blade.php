<div>
    <div class="absolute top-52 left-20 grid grid-cols-3 rounded">
        <div class="col-span-1 gap-6 mb-1 mr-3 px-4 py-5 bg-white sm:p-6 shadow rounded">
                
                <h2 class="text-xl font-bold mb-4 text-black">{{ __('Create Drop') }}</h2>
                <form  wire:submit.prevent="create" x-data="{ isDisabled: true }">
                    <div class="mb-4">
                        <label for="title" class="block mb-2 text-black">{{ __('Title') }}</label>
                        <input @keydown="isDisabled = false" type="text" value='{{$title}}' wire:model="title" id="title" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="description" class="block mb-2 text-black">{{ __('Description') }}</label>
                        <textarea @keydown="isDisabled = false" wire:model="description" id="description" rows="4" class="w-full px-3 py-2 border border-gray-300 rounded-md"></textarea>
                        @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="date_start" class="block mb-2 text-black">{{ __('Start Date') }}</label>
                        <input @keydown="isDisabled = false" type="date" wire:model="date_start" id="date_start" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        @error('date_start') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div class="mb-4">
                        <label for="date_end" class="block mb-2 text-black">{{ __('End Date') }}</label>
                        <input @keydown="isDisabled = false" type="date" wire:model="date_end" id="date_end" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                        @error('date_end') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input @change="isDisabled = false" type="checkbox" id="ongoing" name="ongoing" class="sr-only peer" checked
                            wire:model.defer="ongoing">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Ongoing') }}</span>
                    </label>
                    <div>
                        
                        <button x-bind:disabled="{{ $isEdit ? 'false' : 'true' }}" type="button" wire:click='update' wire:loading.attr="disabled"
                            class="{{ !$isEdit ? 'bg-gray-500 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-800' }} text-black rounded-md px-4 py-2">
                            {{ __('Save drop')}}
                        </button>
                        
                        <button x-bind:disabled="{{ $isEdit ? 'true' : 'false' }}" type="submit" wire:loading.attr="disabled"
                            class="{{ $isEdit ? 'bg-gray-500 cursor-not-allowed' : 'bg-blue-500 hover:bg-blue-800' }} text-black rounded-md px-4 py-2">
                            {{ __('New drop')}}
                        </button>
                    
                    </div>
                    <p class='text-red-700 font-extrabold text-2xl justify-items-center' x-show='!isDisabled'>{{__('Remember to save')}}</p>
                </form>
        
            @if (session()->has('message'))
                <div class="fixed bottom-0 right-0 mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg">
                    {{ session('message') }}
                </div>
            @endif
        </div>

        <div class="col-span-2 gap-6 mb-1 mr-3 px-4 py-5 bg-white sm:p-6 rounded shadow">
            <div class="grid grid-cols-3 gap-1">
                @foreach ($drops as $drop)

                    @php
                        $qtaItem=App\Models\Teams_item::where('drop_id', $drop->id)->count();
                        if (!isset($qtaItem)){
                            $qtaItem=0;
                        }
                    @endphp

                    @if (!$drop->ongoing)
                        <div class="bg-white w-full p-4 m-2 border border-gray-500 rounded-md shadow">
                    @else
                        <div class="bg-green-500 w-full p-4 m-2 rounded-md shadow">
                    @endif
                            <h3 class="text-xl font-bold mb-2">{{ 'Drop: ' . $drop->title }}</h3>
                            
                            <p>{{ $drop->description }}</p>
                            
                            <hr class="my-4">
                            
                            <p class="text-gray-500 text-sm">Start Date: {{ date('Y-m-d', strtotime($drop->date_start)) }}</p>
                            <p class="text-gray-500 text-sm">End Date: {{ date('Y-m-d', strtotime($drop->date_end)) }}</p>
                            
                            @if ($drop->published)
                                <p class="text-gray-500 text-sm">Published: Yes</p>
                            @else
                                <p class="text-gray-500 text-sm">Published: No</p>
                            @endif

                            @if ($drop->ended)
                                <p class="text-gray-500 text-sm">Ended: Yes</p>
                            @else
                                <p class="text-gray-500 text-sm">Ended: No</p>
                            @endif

                            @if ($drop->ongoing)
                                <p class="text-gray-500 text-sm">Ongoing: Yes</p>
                            @else
                                <p class="text-gray-500 text-sm">Ongoing: No</p>
                            @endif

                            <p class="text-gray-500 text-sm">Qta items: {{$qtaItem}}</p>

                            <p class= 'text-gray-500 text-sm'>{{ 'id: '. $drop->id }}</p>
                            <div class="mt-4 flex flex-row justify-between">
                                <div>
                                    <button type="button" wire:click="edit({{ $drop->id }})"
                                    class="mr-2 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 
                                    font-medium rounded-lg text-xs px-3 py-2 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                                    {{ __('Edit') }}
                                    </button>
                                </div>

                                <div>
                                    <button type="button" wire:click="delete({{ $drop->id }})"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:ring-red-300 
                                    font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    {{ __('Delete') }}  
                                    </button>
                                </div>

                                <div class="ml-auto">
                                    <a href="{{ route('dropCollection', $drop->id) }}" >
                                        <button type="button" class="focus:outline-none text-white bg-purple-500 hover:bg-purple-800 focus:ring-2 focus:ring-purple-300 
                                        font-medium rounded-lg text-xs px-3 py-2 dark:bg-purple-500 dark:hover:bg-purple-700 dark:focus:ring-purple-900">
                                        {{ __('Select') }}  
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

          
        



