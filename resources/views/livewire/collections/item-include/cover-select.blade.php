 <!-- Type -->
<div class="{{ $class_input }}">
    <label for="type"
        class="block text-white text-sm font-bold mb-2">{{ __('Select a cover file') }}:</label>

        <select @change="isDisabled = false" name="filecover" id="filecover" wire:model.defer="state.fileCover" wire:change="bind"

            class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
            <option value="empty">{{ __('Empty') }}</option>

            {{-- @foreach($items as $item)
                <option value="{{ $item->hash_file }}">{{ '['. $item->id .'] ' . $item->title }}</option>
            @endforeach --}}


            @foreach($items as $item)
                <option value="{{ $item->id }}">{{ $item->id .' ' .  $item->title }}</option>
            @endforeach


        </select>

        @error('type')
            <span class="text-red-500">{{ $message }}</span>
        @enderror

</div>
