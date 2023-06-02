<x-jet-form-section submit="updatePhotoDoc">
    <x-slot name="title">
        {{ __('Front photograph of the document') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Upload the front part of your document\'s photograph, make sure it is perfectly in focus') }}
    </x-slot>

    <x-slot name="form">

        @include('profile.path-photo-docfront')
        <br>
        @include('profile.path-photo-docfront')

    </x-slot>


    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>

</x-jet-form-section>
