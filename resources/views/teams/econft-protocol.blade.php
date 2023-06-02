
<div class="col-span-6 sm:col-span-4">

    @if(!$team->different && $isDisabled)

    @else

    {{-- ECONFT - DIFFERENT --}}

    {{-- <input wire:click.prevent="submitForm(1)" type="radio" id="hosting-big" name="different" value=1
        wire:model="state.different" class="hidden peer" @if ($isDisabled) disabled @endif> --}}

    <input wire:click.prevent="submitForm(1)" type="radio" id="hosting-big" name="different" value=1
        wire:model="state.different" class="hidden peer" @disabled ($isDisabled)>

        <label for="hosting-big"

            @if ($isDisabled)
                class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800"
            @else
                @if($team->different)
                    class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer
                    dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-blue-600
                    peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                @else
                    class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer
                    dark:hover:text-gray-300 dark:border-gray-700
                    hover:text-gray-600 hover:bg-gray-100 dark:text-gray-600 dark:bg-gray-800
                    dark:hover:bg-gray-200"
                @endif
            @endif>

            <div class="block">
                <div class="w-full text-lg font-semibold">{{ __('Different') }}</div>
                @if ($isDisabled)
                    <div class="w-full">{{ __("This collection has $amountDifferentEcoNFT different EcoNFTs") }}</div>
                @else
                    <div class="w-full">{{ __('Click here if you want a collection made up of many EcoNFTs, one different from the other') }}</div>
                @endif
            </div>
            <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </label>

    @endif


    @if($team->different && $isDisabled)

    @else

        {{-- ECONFT - DUPLICATE AND NOT DISABLED --}}

        <input  class="hidden peer" type="radio" id="hosting-small" name="different" required @disabled ($isDisabled)
                value=0
                wire:model="state.different"
                wire:click.prevent="submitForm(0)">

        <label for="hosting-small"

            @if ($isDisabled)
                class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer dark:border-gray-700  dark:text-gray-400 dark:bg-gray-800"
            @else
                @if(!$team->different)
                    class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer
                    dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-green-500 peer-checked:border-blue-600
                    peer-checked:text-green-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                @else
                    class="inline-flex items-center justify-between w-full p-5 bg-white border border-gray-200 rounded-lg cursor-pointer
                    dark:hover:text-gray-300 dark:border-gray-700
                    hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800
                    dark:hover:bg-gray-200"
                @endif
            @endif

            > {{-- questa chiude la label  --}}

            <div class="block">
                <div class="w-full text-lg font-semibold">{{ __('Duplicate') }}</div>

                <div class="w-full">
                    @if($team->different)
                        <div class="w-full">{{ __('Click here if you want a collection made up of a single EcoNFT duplicated severaltimes') }} </div>
                    @else
                        @if (!$isDisabled)
                            <div class="w-full text-lg font-semibold">{{ __('This is an EcoNFT collection of a single item, duplicated several times.') }}</div>
                        @else
                            <div class="w-full">{{ __("This collection counts $team->econft_number EcoNFT") }}</div>
                        @endif
                    @endif
                </div>

            </div>

            <svg aria-hidden="true" class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </label>

        <div class="block">


            <div class="w-full">
                @if($team->different)

                @else
                    @if (!$isDisabled)
                    {{-- DUPLICATE NOT DISABLED --}}
                        <label for='econft_number'>
                        <div class="w-full text-lg font-semibold">{{ __('Number of duplicate EcoNFT') }}</div>
                        <div class="w-full text-lg font-semibold">{{ __('Write here how many duplicates you want to generate of your unique EcoNFT') }}</div>
                            {{-- INPUT NUMBER OF DUPLICATE ECONFT --}}
                            <x-jet-input id="econft_number" name="econft_number" type="number" class="mt-1 w-1/5"
                                wire:model="state.econft_number"
                                wire:change="save_econft_number"
                                :disabled="!Gate::check('update', $team)" />


                        </label>
                        <x-jet-input-error for="econft_number" class="mt-2" />
                    @else

                    @endif
                @endif
            </div>

        </div>

    @endif

</div>
