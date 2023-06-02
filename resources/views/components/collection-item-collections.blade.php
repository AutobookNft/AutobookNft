@php
    $epp_id=$item->epp_id ? $item->epp_id : 0;
@endphp


<div class="flex ml-2 rounded-xl">

    <form method="POST" action="{{ route('current-team.update') }}" id="form-id" x-data>
        @method('PUT')
        @csrf

        <!-- Hidden Team ID -->
        <input type="hidden" name="team_id" value="{{ $item['id'] }}">

        <div class = 'grid grid-cols-2 rounded-2xl'>

            <div class='grid grid-cols-1 grid-flow-row rounded-2xl'>

                {{-- IMAGE --}}
                <div class="col-span-1">
                    <a href='#'  x-on:click.prevent="$root.submit();">
                        @if($item['path_image_econft']=='')
                            <img class="p-1 mt-2 max-h-32 rounded-2xl" src='/storage/images/default/logo_t.png'>
                        @else
                            <img class="p-1 mt-2 max-h-32 rounded-2xl" src={{ $item['path_image_econft'] }} alt="product image"
                            title="{{ $item['path_image_econft'] }}" />
                        @endif
                    </a>

                    {{-- COLLECTION NAME --}}
                    <p class="pl-2 mt-3 text-md text-gray-100 font-normal"> {{ $item['name'] }}
                        <img src='/storage/images/default/logo_t.png' class="w-10 h-10 inline">
                    </p>
                </div>

                {{-- EPP --}}
                @if($epp_id<>0)
                    @php
                        $epp_user = App\Models\User::find($epp_id);
                    @endphp
                    <div class='col-span-1'>
                        <div class ="inline">
                            <span class="ml-1 material-icons text-yellow-400 text-sm">
                                wb_sunny
                            </span>
                        </div>
                        <div class="ml-1 mt-1 absolute inline text-sm font-font-extralight tracking-tight text-green-400">
                            {{ "EPP: $epp_user->org_name" }}
                        </div>
                    </div>
                @endif

                {{-- QTA ITEMS --}}
                @php ($qta_item=count(App\Models\Teams_item::where('team_id',$item['id'])->get()))
                @if($qta_item>0)
                    @if(Auth::user()->usertype != 'epp')
                        <div class='col-span-1'>
                            <div class="inline pl-2 mt-3 text-md text-gray-100 font-normal">
                                {{ 'Items n.:' }} 
                            </div>
                            <div class="ml-1 mt-1 inline text-sm font-font-extralight tracking-tight text-green-400">
                                {{ $qta_item }}
                            </div>    
                        </div>
                    @endif
                @endif

               
                <div class='col-span-1'>
                    <div class="inline pl-2 mt-3 text-md text-gray-100 font-normal">
                        {{ 'ID team:' }} 
                    </div>
                    <div class="ml-1 mt-1 inline text-sm font-font-extralight tracking-tight text-green-400">
                        {{ $item['id'] }}
                    </div>    
                </div>
        
            </div>



            <div class=' mt-4 grid grid-cols-1 grid-flow-row rounded-2xl'>
                @php($wallets=App\Models\Team_wallet::where('team_id',$item['id'])->get())
                @foreach($wallets as $wallet)
                    <p class="block pl-2 text-xs font-font-extralight tracking-tight text-gray-100 ">{{ Str::limit($wallet->address, 15, '...') }} </p>
                @endforeach
            </div>

        </div>

        {{-- <p class="mt-5 text-lg italic font-semibold tracking-tight text-gray-100">{{ $item['description'] }}</p> --}}

        {{-- <div class="flex justify-end">
            <button type="button" wire:click="confirmCollectionRemoval({{ $item->id }})"
                focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                {{ __('Delete') }}
            </button>
        </div> --}}

    </form>

</div>

