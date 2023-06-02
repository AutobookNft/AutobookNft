{{-- il controller di questa view è items_show --}}
{{-- Route::middleware(['auth:sanctum', 'verified'])->get('dashboard/collection/preview',
Items_show::class)->name('preview'); --}}

    <x-slot name="header">
        <h1 class="font-semibold text-2xl text-purple-800 leading-tight">
            {{ __('Collection: '. auth()->user()->currentTeam->name) . $epp_name}}
        </h1>
    </x-slot>

    <div class="py-12 bg-white bg-cover" style="background-image: url('/storage/image/125/collections/9/banner/D95RasbtGPAE4ztiMtZrUPoSsfto9QhC6YukXIAO.jpg');">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8 border-2 sm:rounded-lg border-purple-900 ml-3 mr-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mt-6 mb-6 -ml-3 -mr-3">
                @livewire('collection-item', ['items'=>$items, 'audio_file' => $audio_file])
            </div>
        </div>
    </div>

