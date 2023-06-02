<x-jet-form-section submit="updateUserTaxData">

    <x-slot name="title">
        {{ __('Document data') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Please enter your ID details.') }}
    </x-slot>

    <x-slot name="form">

        @include('profile.checkbox-doc-type')

        <!-- Numero di documento -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="doc_num" value="{{ __('Document number') }}" />
            <x-jet-input id="doc_num" type="text" class="mt-1 block w-full" wire:model.defer="state.doc_num"
                autocomplete="doc_num" />
            <x-jet-input-error for="doc_num" class="mt-2" />
        </div>

        <!-- Doc issue date -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="doc_issue_date" value="{{ __('Date of issue')}}" />
            <x-jet-input id="doc_issue_date" type="date" class="mt-1 block w-full" wire:model.defer="state.doc_issue_date"
                autocomplete="doc_issue_date" />
            <x-jet-input-error for="doc_issue_date" class="mt-2" />
        </div>

        <!-- Doc expired date-->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="doc_expired_date" value="{{ __('Expiration date') }}" />
            <x-jet-input id="doc_expired_date" type="date" class="mt-1 block w-full" wire:model.defer="state.doc_expired_date"
                autocomplete="doc_expired_date" />
            <x-jet-input-error for="doc_expired_date" class="mt-2" />
        </div>

         <!-- Doc issue from -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="doc_issue_from" value="{{ __('Document issued from') }}" />
            <x-jet-input id="doc_issue_from" type="text" class="mt-1 block w-full" wire:model.defer="state.doc_issue_from"
                autocomplete="doc_issue_from" />
            <x-jet-input-error for="doc_issue_from" class="mt-2" />
        </div>

        @include('profile.path-photo-docfront')
        <br>
        @include('profile.path-photo-docretro')

    </x-slot>

    <x-slot name="actions">

        <x-jet-action-message class="mr-3" on="saved">
            <label class='text-green-800 font-bold'> {{ __('Saved!') }} </label>
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>

    </x-slot>

</x-jet-form-section>
