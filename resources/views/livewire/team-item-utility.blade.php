<x-sidebar wichsidebar='utility_edit'>

    <x-slot:head>
        <x-sidebarhead image="{{$item->file_cover}}" name="{{ $item->title }}" type=""
            pagename="{{ 'Manage utility' }}" />
    </x-slot:head>

    <x-slot:search>
        <x-inputsearc />
    </x-slot:search>

    <x-slot:dashboard>
        <a href="{{ url('/dashboard/') }}">
            <x-sidebar-item item="{{ __('Dashboard') }}" />
        </a>
    </x-slot:dashboard>

    <x-slot:back_to_utility_list>
        <a href="{{ url('/dashboard/collection/items_edit/'. $item->id) }}">
            <x-sidebar-leftarrow item="{{ __('Back to item') }}" />
        </a>
    </x-slot:back_to_utility_list>

    <x-slot:items>

    <div class="absolute top-20 xs:left-60 xl:left-80 grid grid-cols-3 rounded">

        @if ($isOpen)
            @include('livewire.collections.create')
        @endif

        <div class="col-span-1 gap-6 mb-1 mr-3 px-4 py-5 bg-white sm:p-6 shadow rounded">
            <form x-data="{ isDisabled: true }"> @csrf

                <div class="grid grid-cols-3 mb-3">

                    <div class="col-span-3 auto justify-center">
                        <p class='font-semibold text-xl'>
                            {{ __('Enter the data of the utility or product you want to combine with your EcoNFT') }}
                        </p>
                    </div>

                </div>

                <div class="grid grid-cols-3 mb-3">

                    <div class="col-span-3">
                        <x-jet-label for="description" value="{{ __('Description') }}" />
                        <x-jet-input @keydown="isDisabled=false" id="description" type="text" class="block w-full mt-1" wire:model.defer="util_description" />
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>

                </div>
                <div class="grid grid-cols-2 mb-3">

                    <div class="col-span-1">
                        <x-jet-label for="code" value="{{ __('Code') }}" />
                        <x-jet-input @keydown="isDisabled=false" id="code" type="text" class="block w-full mt-1" wire:model.defer="util_code" />
                        <x-jet-input-error for="code" class="mt-2" />
                    </div>

                    <div class="col-span-1">
                        <x-jet-label for="creation_data" value="{{ __('Date') }}" />
                        <x-jet-input @keydown="isDisabled=false" id="creation_data" type="date" class="block w-full mt-1" wire:model.defer="util_data" />
                        <x-jet-input-error for="creation_data" class="mt-2" />
                    </div>

                </div>

                <div class="w-full mb-3">
                    <x-jet-label for="util_spec_1" value="{{ __('Specification 1') }}" />
                    <x-jet-input  @keydown="isDisabled=false" id="util_spec_1" type="text" class="block w-full mt-1" wire:model.defer="util_spec_1"/>
                    <x-jet-input-error for="util_spec_1" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <x-jet-label for="util_spec_2" value="{{ __('Specification 2') }}" />
                    <x-jet-input  @keydown="isDisabled=false" id="util_spec_2" type="text" class="block w-full mt-1" wire:model.defer="util_spec_2"/>
                    <x-jet-input-error for="util_spec_2" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <x-jet-label for="util_spec_3" value="{{ __('Specification 3') }}" />
                    <x-jet-input @keydown="isDisabled=false" id="util_spec_3" type="text" class="block w-full mt-1" wire:model.defer="util_spec_3" />
                    <x-jet-input-error for="util_spec_3" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <x-jet-label for="util_spec_4" value="{{ __('Specification 4') }}" />
                    <x-jet-input  @keydown="isDisabled=false" id="util_spec_4" type="text" class="block w-full mt-1" wire:model.defer="util_spec_4" />
                    <x-jet-input-error for="util_spec_4" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <x-jet-label for="util_spec_5" value="{{ __('Specification 5') }}" />
                    <x-jet-input  @keydown="isDisabled=false" id="util_spec_5" type="text" class="block w-full mt-1" wire:model.defer="util_spec_5" />
                    <x-jet-input-error for="util_spec_5" class="mt-2" />
                </div>

                <div class="w-full mb-3">
                    <div class="flex item-center sm:col-span-4">
                        <div class="w-3/6 pl-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @keydown="isDisabled=false"id="joint-1" type="radio" name="joint"
                            wire:model.defer="util_joint" value='1'
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500
                            dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                            dark:border-gray-600">
                            <label for="bordered-radio-1"
                                class="w-full py-4 ml-2 text-sm font-medium text-red-900 dark:text-red-600">{{
                                __('Joint')
                                }}</label>
                        </div>
                        <div class="w-3/6 pl-4 border border-gray-200 rounded dark:border-gray-700">
                            <input @keydown="isDisabled=false" checked id="joint-2" type="radio" name="joint"
                            wire:model.defer="util_joint" value='0'
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500
                            dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700
                            dark:border-gray-600">
                            <label for="bordered-radio-2"
                                class="w-full py-4 ml-2 text-sm font-medium text-green-900 dark:text-green-600">
                                {{__('Not joint') }}</label>
                        </div>
                    </div>
                    <p class='text-red-700 font-extrabold text-2xl justify-items-center' x-show='!isDisabled'>{{__('Remember to save')}}</p>
                </div>

                <x-jet-action-message class="flex col-span-6 sm:col-span-4" on="errore">
                    <label class='inline-flex text-red-600 font-bold text-xl'> {{ __($msgError . ' / ' . $codError) }}
                    </label>
                </x-jet-action-message>

                <div class="mt-8 flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">

                    <x-jet-secondary-button wire:click="openModal" class='mr-3 mb-3'>
                        {{ __('Add attachment files') }}
                    </x-jet-secondary-button>

                    <div class="mb-3 flex items-center justify-end bg-white">

                        <x-jet-action-message on="saved">
                            <label class='text-green-800 font-bold'> {{ __('Saved!') }} </label>
                        </x-jet-action-message>

                        <x-jet-button x-bind:disabled="isDisabled" @click="isDisabled=true" wire:click.prevent="store" wire:loading.attr="disabled">
                            {{ __('Save') }}
                        </x-jet-button>

                    </div>
                </div>
            </form>
        </div>

        <div class="col-span-2 gap-6 mb-1 px-4 py-5 bg-white sm:p-6 shadow">
            <div class="grid grid-cols-6">
                @foreach ($attachments as $item)
                    <div class="col-span-1 gap-6 mb-1 px-4 py-5 bg-white sm:p-6 shadow">
                        <div class ="border border-red-500">

                            @include('livewire.item-file')

                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>


    </x-slot:items>

</x-sidebar>
