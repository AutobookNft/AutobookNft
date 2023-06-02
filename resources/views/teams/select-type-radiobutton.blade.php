 <!-- Type -->
<div class="col-span-6 sm:col-span-4">
<x-jet-label class='text-lg' for="" value="{{ __('Determine what kind of collection it is') }}"/>
<ul
    class="items-center w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input wire:model.defer="state.type" id="horizontal-list-radio-license" type="radio" value="Image" name="type"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-license"
                class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Image') }} </label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input wire:model.defer="state.type" id="horizontal-list-radio-id" type="radio" value="Audio" name="type"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-id"
                class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Audio') }}</label>
        </div>
    </li>
    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input wire:model.defer="state.type" id="horizontal-list-radio-millitary" type="radio" value="E-book" name="type"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-millitary"
                class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('E-book') }}</label>
        </div>
    </li>
    <li class="w-full dark:border-gray-600">
        <div class="flex items-center pl-3">
            <input wire:model.defer="state.type" id="horizontal-list-radio-passport" type="radio" value="Video" name="type"
                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="horizontal-list-radio-passport"
                class="w-full py-3 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('Video') }}</label>
        </div>
    </li>
</ul>
</div>
