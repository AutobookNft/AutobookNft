<x-jet-form-section submit="updateDataCollection">
    <x-slot name="title">

    </x-slot>

    <x-slot name="description">

    </x-slot>

    <x-slot name="form" id='form'>

        <!-- Team Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name"
                value="{{ __('Collection name') }}" />

            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                :disabled="! Gate::check('update', $team)" />

            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Collection ID VISIBILE SOLO PER GLI ADMIN -->
        @can('isAdmin')
            <div class="col-span-6 sm:col-span-4">
                <x-jet-label for="id" value="{{ __('Collection id') }}" />
                <x-jet-input type="text" class="mt-1 block w-1/8" id="id" name="id" wire:model.defer="state.id"/>
            </div>
        @endcan

        <!-- EPP id-->
        @if(
            (isset(Auth::user()->currentTeam->epp_id) || property_exists(Auth::user()->currentTeam,'epp_id'))
            && (Auth::user()->currentTeam->epp_id<>0))

            @php
                $dontShow=false;
            @endphp

            <div class="col-span-6 sm:col-span-4 border-2">
                @php
                    if (!isset($epp_id)){
                        $epp_id = Auth::user()->currentTeam->epp_id;
                    }
                    $user = App\Models\User::find($epp_id) // l'epp è un record nella tabella user. Ricordatelo!
                @endphp
                @if ($user)
                    <label class="block text-gres-700 text-lg font-bold m-2 "> {{ __('Your Epp is ') }} </label>
                    <label class="block text-green-700 text-lg font-bold m-2"> {{ $user->org_name }} </label>
                @endif
            </div>
        @else

            @php
                $dontShow=true;
            @endphp

            <div class="col-span-6 sm:col-span-6">
                <x-jet-secondary-button type="button" class="mt-2 bg-red-700" wire:click="openModal()">
                        {{ __('Add Epp') }}
                </x-jet-secondary-button>
                <label> <- {{ __('Fino a quando non avrai associato la tua galleria ad un EPP non potrai pubblicarla') }} </label>

                @if ($isOpen)
                    @include('teams.bind_epp')
                @endif

            </div>

        @endif

        <!-- Floor price Asset-->
        <div class="col-span-8 sm:col-span-6">
            <x-jet-label for="floor_price" value="{{ __('Set a base price that you want to write for each new EcoNFT of this collection') }}" />
            <x-jet-input id="floor_price" type="number" class="mt-1 block w-1/5" wire:model.defer="state.floor_price"
                :disabled="!Gate::check('update', $team)" />
            <x-jet-input-error for="floor_price" class="mt-2" />
        </div>

        @include('teams.path-image-EcoNFT')

        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <label for="description" class="block text-gray-700 text-lg font-bold mb-2">{{ __('Description') }}:</label>
            <textarea rows="10"
                class="shadow appearance-none border rounded text-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="description" wire:model.defer="state.description" :disabled="!Gate::check('update', $team)" placeholder="{{ __('Enter description') }}">

            </textarea>
            @error('description') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>

        {{-- @include('teams.select-type-radiobutton') --}}

        @include('teams.path-image-banner')

        @include('teams.path-image-avatar')

        @include('teams.path-image-card')

        <!-- URL of the collection -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="url_collection_site" value="{{ __('Collection site URL') }}" />
            <x-jet-input id="url_collection_site" type="url" class="mt-1 block w-full"
                wire:model.defer="state.url_collection_site" :disabled="!Gate::check('update', $team)" />
            <x-jet-input-error for="url_collection_site" class="mt-2" />
        </div>

        <!-- Position -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="position" value="{{ __('If you have more than one gallery you can decide in which position to insert this one') }}" />
            <input type="text" id="position" wire:model.defer="state.position" :disabled="!Gate::check('update', $team)"
                    class="block w-1/3 p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                    sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <x-jet-input-error for="position" class="mt-2" />
        </div>

        {{-- HO DECISO DI NON GESTIRE IL PROTOCOLLO 1155 @include('teams.econft-protocol') --}}

        {{-- Opzione per pubblicare o non pubblicare la galleria --}}
        @if(!$dontShow)
            <div class="col-span-6 sm:col-span-4">

                <x-jet-section-border />

                <label for="show" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" id="show" name="show" class="sr-only peer" checked wire:model.defer="state.show"
                        :disabled="!Gate::check('update', $team)">
                    <div
                        class="w-11 h-6 bg-gray-600 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-600">{{ __('Publish the collection') }}</span>
                </label>
            </div>
        @endif

    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
               <label class='text-green-800 font-bold'> {{ __('Saved!') }} </label>
            </x-jet-action-message>

            <x-jet-button wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-button>
        </x-slot>
    @endif


</x-jet-form-section>

