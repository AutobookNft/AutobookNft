<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            @can('view-epp-or-company-content')

                <div class="mt-10 sm:mt-0">
                    @livewire('livewire.update-profile-information-form')
                    <livewire:livewire.update-profile-information-form />
                    @livewire('profile.update-profile-company-datasheet-forms')
                </div>

            @else

                @if(Laravel\Fortify\Features::canUpdateProfileInformation())
                    <div class="mt-10 sm:mt-0">
                                   
                        {{-- @livewire('livewire.update-profile-information-form') --}}
                        <div>
                        <livewire:livewire.update-profile-information-form />
                        </div>
                        <x-jet-section-border />
                        @livewire('profile.update-profile-tax-data-forms')
                        {{-- <x-jet-section-border />
                        @livewire('profile.upload-photo-docfront-form')
                        <x-jet-section-border />
                        @livewire('profile.upload-photo-docretro-form') --}}

                    </div>
                @endif

            @endcan

            @can('isAdmin')
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-profile-company-datasheet-forms')
                </div>
            @endcan

            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <x-jet-section-border />
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-profile-socialmedia-form')
                </div>
            @endif

           <x-jet-section-border />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-jet-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-jet-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-jet-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif

        </div>

    </div>

</x-app-layout>
