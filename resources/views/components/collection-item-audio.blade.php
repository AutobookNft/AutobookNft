<x-collections.layout-item
    itemId={{ .$item['id'] }}
    imagefile={{ $item['hash_file'] }}
    audiofile={{ $audio_file }}
    description={{ $item['description'] }}
    pathfile={{ $item['item'] }}
    filename={{ $filename }}
    price={{ $item['price']  }}
>

    <form method="POST" action="{{ route('current-team.update') }}" x-data> @csrf

        <div class = "grid grid-cols-1">
            <div class="col-span-12">
            <x-jet-label for="title"
                value="{{ __('Title') }}" />
            <input type="text" id="title" wire:model.defer="state.title" :disabled="!Gate::check('update', $team)" class= "{{ $class_input }}">

            <x-jet-input-error for="title" class="mt-2" />
            </div>
        </div>

    </form>


