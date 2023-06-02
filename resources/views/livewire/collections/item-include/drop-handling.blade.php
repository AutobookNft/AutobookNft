<div class="container mx-auto py-8 mt-12">
    <div class="w-1/3 mx-auto">
        <div class="bg-white p-6 rounded-md shadow-md">
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
        </div>
    </div>

    <div class="w-3/2 mx-auto mt-8 flex flex-wrap justify-center">
        @foreach ($drops as $drop)
            @if (!$drop->ongoing)
                <div class="bg-white w-1/4 p-4 m-2 rounded-md shadow">
            @else
                <div class="bg-green-500 w-1/4 p-4 m-2 rounded-md shadow">
            @endif

            <h3 class="text-xl font-bold mb-2">{{ $drop->title }} id: {{$drop->id}}</h3>
            <p>{{ $drop->description }}</p>
            <p class="text-gray-500">Start Date: {{ date('Y-m-d', strtotime($drop->date_start)) }}</p>
            <p class="text-gray-500">End Date: {{ date('Y-m-d', strtotime($drop->date_end)) }}</p>

            @if ($drop->ongoing)
                <p class="text-gray-500">Ongoing: Yes</p>
            @else
                <p class="text-gray-500">Ongoing: No</p>
            @endif

            <div class="mt-4">
                
                <button type="button" wire:click="edit({{ $drop->id }})"
                    class="ml-2 w-12/12 focus:outline-none text-white bg-blue-500 hover:bg-blue-800 focus:ring-2 focus:ring-blue-300 
                    font-medium rounded-lg text-xs px-3 py-2 dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-900">
                    {{ __('Edit') }}
                </button>


                <button type="button" wire:click="delete({{ $drop->id }})"
                    class="ml-2 w-12/12 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-2 focus:ring-red-300 
                    font-medium rounded-lg text-xs px-3 py-2 dark:bg-red-500 dark:hover:bg-red-700 dark:focus:ring-red-900">
                    {{ __('Delete') }}  
                </button>

                    
                </div>
            </div>
        @endforeach
    </div>
</div>

@if (session()->has('message'))
    <div class="fixed bottom-0 right-0 mb-4 mr-4 bg-green-500 text-white px-4 py-2 rounded-md shadow-lg">
        {{ session('message') }}
    </div>
@endif
