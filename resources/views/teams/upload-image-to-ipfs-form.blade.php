<x-jet-form-section submit="updateDataCollection">
    <x-slot name="title">
        {{ __('Data of the Collection: ').$team->collection_name }}
    </x-slot>

    <x-slot name="description">
        {{ __('Enter all collection data please, be very accurate, remember that your collection will be your source of income.') }}
    </x-slot>

    <x-slot name="form">

        @include('teams.path-image-EcoNFT')

    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __('Saved.') }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif
</x-jet-form-section>
