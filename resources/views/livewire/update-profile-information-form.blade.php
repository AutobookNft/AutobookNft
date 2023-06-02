<x-jet-form-section submit="updateProfile">
    
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{$this->user->profile_photo_url }}" title="{{ __('owner photo') }}" alt="{{ $this->user->name }}" class="object-cover w-20 h-20 rounded-full">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- title -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="title" value="{{ __('Title') }}" />
            <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="state.title" autocomplete="title" />
            <x-jet-input-error for="title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <a href="{{ url('user/profile/biographies') }}">
                <button type="button"
                    class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none
                    focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                    {{ __('Biography') }}
                </button>
            </a>
        </div>


        <!-- First Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="first_name" value="{{ __('First Name') }}" />
            <x-jet-input id="first_name" type="text" class="block w-full mt-1" wire:model.defer="state.first_name"
                autocomplete="first_name" />
            <x-jet-input-error for="first_name" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
            <x-jet-input id="last_name" type="text" class="block w-full mt-1" wire:model.defer="state.last_name"
                autocomplete="last_name" />
            <x-jet-input-error for="last_name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="mt-2 text-sm">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="text-sm text-gray-600 underline hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 text-sm font-medium text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>

        <!-- username -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="mt-1 block w-full" wire:model.defer="state.username" autocomplete="username" />
            <x-jet-input-error for="username" class="mt-2" />
        </div>

        <!-- street -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="street" value="{{ __('Street') }}" />
            <x-jet-input id="street" type="text" class="mt-1 block w-full" wire:model.defer="state.street" autocomplete="street" />
            <x-jet-input-error for="street" class="mt-2" />
        </div>

        <!-- zip -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="zip" value="{{ __('Zip') }}" />
            <x-jet-input id="zip" type="text" class="mt-1 block w-full" wire:model.defer="state.zip" autocomplete="zip" />
            <x-jet-input-error for="zip" class="mt-2" />
        </div>

        <!-- Citta -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" type="text" class="mt-1 block w-full" wire:model.defer="state.city" autocomplete="city" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>

        <!-- regionincia -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="region" value="{{ __('Region') }}" />
            <x-jet-input id="region" type="text" class="mt-1 block w-full" wire:model.defer="state.region" autocomplete="region" />
            <x-jet-input-error for="region" class="mt-2" />
        </div>

        <!-- state -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="state" value="{{ __('State') }}" />
            <x-jet-input id="state" type="text" class="mt-1 block w-full" wire:model.defer="state.state" autocomplete="state" />
            <x-jet-input-error for="state" class="mt-2" />
        </div>

        <!-- cell_phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cell_phone" value="{{ __('Mobile phone') }}" />
            <x-jet-input id="cell_phone" type="text" class="mt-1 block w-full" wire:model.defer="state.cell_phone" autocomplete="cell_phone" />
            <x-jet-input-error for="cell_phone" class="mt-2" />
        </div>

        <!-- home_phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="home_phone" value="{{ __('Home phone') }}" />
            <x-jet-input id="home_phone" type="text" class="mt-1 block w-full" wire:model.defer="state.home_phone" autocomplete="home_phone" />
            <x-jet-input-error for="home_phone" class="mt-2" />
        </div>

            <!-- work_phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="work_phone" value="{{ __('Work phone') }}" />
            <x-jet-input id="work_phone" type="text" class="mt-1 block w-full" wire:model.defer="state.work_phone" autocomplete="work_phone" />
            <x-jet-input-error for="work_phone" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>