<!-- {{-- <div class="absolute top-20 left-32 w-5/6 gap-2 ml-5 mr-5 grid grid-cols-10 grid-rows-4 bg-center bg-cover bg-no-repeat" style="background-image: url('/storage/images/default/universe.jpg')"> --}} -->
<div class="absolute top-20 left-32 w-5/6 gap-2 ml-5 mr-5 grid grid-cols-10 grid-rows-4 bg-stone-900 ">

            @if(Auth::user()->usertype!='epp')
                <img class="col-span-1 row-span-1 row-start-1 col-start-10 mt-10 mr-12 object-cover w-32 h-32 rounded-3xl"
                src=" {{Auth::user()->profile_photo_path }}" alt="image" title="" />
            @endif

            <div class="ml-20 col-span-3 row-span-3 row-start-1 col-start-1">
                <img class="flex" src='/storage/images/default/natan4.webp'>
            </div>

            <!-- {{-- YOUR ECO NFT MARKETPLACE --}} -->
            <div class  = "col-span-3 row-start-2 col-start-3">
                @if(Auth::user()->usertype!='epp')
                    <p class ='font-bold text-yellow-200 text-4xl'>
                    {{ __('Your EcoNFT marketplace for your market') }}</p>
                @else
                    <p class ='font-bold text-white sm:text-2xl xl:text-4xl mt-5'> {{ __('Project data') }}</p>

                @endif
            </div>

            <!-- {{-- LOGO --}} -->
            <div class= "ml-28 -mr-44 mt-16 col-span-2 row-span-2 col-start-5 row-start-1">
                <img class="w-96 h-96" src='/storage/images/default/logo_t.webp'>
            </div>

            <!-- {{-- BUTTON CREATE YOUR COLLECTION --}} -->
            <div class="col-span-1 mt-24 row-start-2 col-start-3">
                <a href="{{ route('teams.create') }}">
                    <x-jet-secondary-button>
                        {{ __('Create your collection') }}
                    </x-jet-secondary-button>
                </a>
            </div>

            <div class = "right-96 top-64 grid row-span-1 col-span-2 rounded-xl bg-gray-900 border bg-opacity-50 border-gray-600 col-start-8 row-start-2">

                <div class ="p-4">
                    <p class ="text-white p-1">
                        <svg class = "inline" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px"  fill="#FFFF00">
                            <rect fill="none" height="24" width="24" />
                            <path d="M18,2H6C4.9,2,4,2.9,4,4v16c0,1.1,0.9,2,2,2h12c1.1,0,2-0.9,2-2V4C20,2.9,19.1,2,18,2z M18,20H6V4h5v7l2.5-1.5L16,11V4h2V20 z M13.62,13.5L17,18H7l2.38-3.17L11,17L13.62,13.5z" />
                        </svg>
                        {{__('Collection: ') }} {{ $qtaTeams }}
                    </p>
                    <p class="text-white p-1">
                        <svg class ="inline" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#800080">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M19 5v14H5V5h14m0-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-4.86 8.86l-3 3.87L9 13.14 6 17h12l-3.86-5.14z" />
                            </svg>
                    {{__('Items: ')}}{{ $qtaItems }}
                    </p>
                    <p class="text-white p-1">
                        <svg class = "inline" xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#06b967">
                            <path d="M0 0h24v24H0V0z" fill="none" />
                            <path d="M16 6l2.29 2.29-4.88 4.88-4-4L2 16.59 3.41 18l6-6 4 4 6.3-6.29L22 12V6h-6z" />
                        </svg>
                        {{ __('Floor: ') }} {{ $averageFloorPrice }}
                    </p>

                    <x-jet-section-border />

                    <p class="text-white p-1">
                       {{ __('Blockchain: ALGORAND') }}
                    </p>
                </div>

            </div>

</div>


        {{-- <div class="absolute top-52 xs:left-10 lg:w-6/6 md:2/6 bg-black border-red-900
                        grid xs:grid-cols-1 sm:grid-cols-2 ll:grid-cols-3 lg:grid-cols-5 1500:grid-cols-5 1700:grid-cols-5
                        gap-8 p-2 rounded grid-flow-row"> --}}

        {{-- <div class="absolute top-52 xs:left-10 lg:w-6/6 md:2/6 bg-black border border-red-900
                                grid xl:grid-cols-6 gap-8 p-2 grid-flow-row rounded-2xl"> --}}

        <div class="mt-64 ml-5 mr-5 bg-black absolute rounded-2xl top-96 left-32 grid grid-cols-1 w-5/6 gap-2">

            @foreach($items as $item)
                <div class="bg-gray-900 hover:bg-gray-800 grid grid-cols-4 rounded-2xl gap-2">

                    @include('components.collection-item-collections')

                    @php
                        $items_1 = App\Models\Teams_item::where('team_id', $item->id)->orderBy('position', 'ASC')->get();
                    @endphp

                    <div class="gap-2 col-span-3 pt-2 pb-2">
                        <div class="grid xl:grid-cols-9 sm:grid-cols-2">
                            @foreach ($items_1 as $item_1)
                                @if ($loop->index<27)
                                    @if (!$item_1->bind)

                                        @php($itemType=$item_1->type)
                                        @php($fileCover=$item_1->file_cover)

                                        @switch($itemType)
                                            @case('image')
                                                @php($cardType='show')
                                                @php($image=$item_1->thumbnail)
                                                @php($borderColor='border border-white hover:border-green-800')
                                                @break
                                            @case('audio')
                                                @php($cardType='show')
                                                @php($image=$item_1->file_cover)
                                                @php($borderColor='border border-red-500 hover:border-green-800')
                                                @break
                                            @case('e-book')
                                                @php($cardType='show')
                                                @break
                                            @case('video')
                                                @php($cardType='show')
                                                @break
                                            @default
                                        @endswitch

                                        <div class= "relative mt-7 flex justify-center w-3/4 max-h-32 rounded-xl {{$borderColor}}">
                                            {{-- IMAGE --}}
                                            <a href="{{ url('dashboard/collection/items_edit/'. $item_1->id ) }}">
                                                <img class= "transform hover:scale-110 max-w-32 max-h-28 min-w-32 min-h-32 object-contain p-1 rounded-xl" src="{{ $image }}" alt="imag" title="" />
                                            </a>
                                            @if($item_1->show)
                                            {{-- PUBLISHED --}}
                                            <p style="color: #06b967">
                                                <svg class='absolute right-0' xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 96 960 960" width="24">
                                                    <path
                                                        d="M440 974q-76-8-141.5-41.5t-114-87Q136 792 108 723T80 576q0-91 36.5-168T216 276h-96v-80h240v240h-80V327q-55 44-87.5 108.5T160 576q0 123 80.5 212.5T440 893v81Zm-17-214L254 590l56-56 113 113 227-227 56 57-283 283Zm177 196V716h80v109q55-45 87.5-109T800 576q0-123-80.5-212.5T520 259v-81q152 15 256 128t104 270q0 91-36.5 168T744 876h96v80H600Z"
                                                        fill="#06b967" />
                                                </svg>
                                            </p>
                                            @else
                                            {{-- UNPUBLISHED --}}
                                            <p style="color:#ff0000">
                                                <svg class='absolute right-0' xmlns="http://www.w3.org/2000/svg" height="24" width="24">
                                                    <path
                                                        d="m20.475 23.3-2.95-2.95q-1.2.8-2.587 1.225Q13.55 22 12 22q-2.075 0-3.9-.788-1.825-.787-3.175-2.137-1.35-1.35-2.137-3.175Q2 14.075 2 12q0-1.55.425-2.938.425-1.387 1.225-2.587L.675 3.5 2.1 2.075l19.8 19.8ZM12 20q1.125 0 2.137-.3 1.013-.3 1.913-.825L12.175 15 10.6 16.6l-4.25-4.25 1.4-1.4 2.85 2.85.175-.2-5.65-5.65q-.525.9-.825 1.913Q4 10.875 4 12q0 3.325 2.338 5.663Q8.675 20 12 20Zm8.375-2.5L18.9 16.025q.525-.875.812-1.888Q20 13.125 20 12q0-3.325-2.337-5.663Q15.325 4 12 4q-1.125 0-2.137.287-1.013.288-1.888.813L6.5 3.625q1.2-.775 2.588-1.2Q10.475 2 12 2q2.075 0 3.9.787 1.825.788 3.175 2.138 1.35 1.35 2.137 3.175Q22 9.925 22 12q0 1.525-.425 2.912-.425 1.388-1.2 2.588Zm-5.325-5.35-1.4-1.4 2.6-2.6 1.4 1.4Zm-1.6-1.6ZM10.6 13.4Z"
                                                        fill="#ff0000" />
                                                </svg>
                                            </p>
                                            @endif
                                            {{-- UTILITY --}}
                                            @if($item_1->util_description)
                                                <a href="{{ url('dashboard/collection/item/utility/'. $item_1->id ) }}">
                                                    <svg class ="transform hover:scale-150 absolute bottom-5 left-1 right-1"  xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px"
                                                        fill="#FFFF00">
                                                        <g>
                                                            <rect fill="none" height="24" width="24" x="0" />
                                                        </g>
                                                        <g>
                                                            <g>
                                                                <polygon opacity=".3"
                                                                    points="9.99,11.01 9,8.83 8.01,11.01 5.83,12 8.01,12.99 9,15.17 9.99,12.99 12.17,12" />
                                                                <polygon points="19,9 20.25,6.25 23,5 20.25,3.75 19,1 17.75,3.75 15,5 17.75,6.25" />
                                                                <polygon points="19,15 17.75,17.75 15,19 17.75,20.25 19,23 20.25,20.25 23,19 20.25,17.75" />
                                                                <path
                                                                    d="M11.5,9.5L9,4L6.5,9.5L1,12l5.5,2.5L9,20l2.5-5.5L17,12L11.5,9.5z M9.99,12.99L9,15.17l-0.99-2.18L5.83,12l2.18-0.99 L9,8.83l0.99,2.18L12.17,12L9.99,12.99z" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                </a>
                                            @endif
                                            {{-- TITLE --}}
                                            <div class="bg-blue-300 max-w-20 rounded-xl bg-opacity-60 text-xs font-semibold text-yellow-100 absolute top-2 left-1 right-0">{{ $item_1->title }}</div>
                                            @if($item_1->price)
                                                <div
                                                    {{-- PRICE --}}
                                                    class="bg-blue-300 flex justify-center max-w-20 rounded-xl bg-opacity-60 text-xs font-semibold text-yellow-100 absolute bottom-1 left-1 right-1 P-1">
                                                    {{ $item_1->price . __(' ALGO') }}
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                @endif  {{-- End if di limite massimo di 20 item --}}
                                
                            @endforeach
                        </div>
                    </div>

                </div>
            @endforeach

        </div>

        </div>

        <x-jet-confirmation-modal wire:model="confirmingCollectionDelete">
            <x-slot name="title">
                {{ __('Remove a collection') }}
            </x-slot>

            <x-slot name="message">
                <x-jet-action-message class="mr-3" on="errore">
                    <label class='text-red-800 font-bold text-xl'> {{ __('This collection cannot be deleted because there are items associated with it') }} </label>
                </x-jet-action-message>
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you would like to remove this collection?') }}
            </x-slot>

            <x-slot name="footer">

                <x-jet-secondary-button wire:click="$toggle('confirmingCollectionDelete')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Remove') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>

