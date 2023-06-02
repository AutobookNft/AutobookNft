 <!-- Type -->
<div class="col-span-6 sm:col-span-4">
    <label for="doc_typo"
        class="block text-gray-700 text-sm font-bold mb-2">{{ __('Doc type') }}:
    </label>


    <select name="doc_typo" id="doc_typo" wire:model.defer="state.doc_typo"
        class="shadow appearance-none w-full border text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">

        <option value="">{{ __('Choose type') }}</option>
        <option value="drive_l">{{ __('Drive licence') }}</option>
        <option value="passport">{{ __('Passport') }}</option>
        <option value="id_card">{{ __('Identity card') }}</option>


    </select>

    @error('doc_typo')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

</div>
