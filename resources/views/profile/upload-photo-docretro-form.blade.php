<x-jet-form-section submit="uploadPhotoDocRetro">
    <x-slot name="title">
        {{ __('Retro photograph of the document') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Upload the retro part of your document\'s photograph, make sure it is perfectly in focus') }}
    </x-slot>

    <x-slot name="form">

        @include('profile.path-photo-docretro')

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
