<x-jet-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team management') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Here you can invite new users as team members, you can assign them the role and you can delete them') }}
    </x-slot>

    <x-slot name="form">
        <!-- Team Owner Information -->
        <div class="col-span-6">
            <x-jet-label value="{{ __('Collection Owner') }}" />

            <div class="flex items-center mt-2">
                <img class="w-24 h-24 rounded-full object-cover" src="{{ $team->owner->profile_photo_path }}" alt="{{ $team->owner->name }}">

                <div class="ml-4 leading-tight">
                    <div>{{ $team->owner->name }}</div>
                    <div class="text-gray-700 text-sm">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>

    </x-slot>

</x-jet-form-section>
