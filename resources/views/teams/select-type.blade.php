 <!-- Type -->
<div class="col-span-6 sm:col-span-4">
    <label for="type"
        class="block text-gray-700 text-sm font-bold mb-2">{{ __('Collection type') }}:</label>
    <select name="type" id="type" wire:model.defer="state.type"
        class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
        <option value="Image">{{ __('Image') }}</option>
        <option value="Audio">{{ __('Audio') }}</option>
        <option value="Ebook">{{ __('E-book') }}</option>
        <option value="Video">{{ __('Video') }}</option>
    </select>
    @error('type')
        <span class="text-red-500">{{ $message }}</span>
    @enderror
</div>
