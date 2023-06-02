<div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Doc Photo front -->
    <input type="file" accept= {{$acceptedTypes}} class="hidden"
                wire:model="photo_doc_retro"
                x-ref="photo_doc_retro"
                x-on:change="
                        photoName = $refs.photo_doc_retro.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo_doc_retro.files[0]);
                " />

    <x-jet-label for="photo_doc_retro" value="{{ __('Retro photograph of the document') }}" />

    <!-- Current Banner image -->
    <div class="mt-2" x-show="! photoPreview">
        <img src="{{$this->user->doc_photo_path_r }}" title="{{ $this->user->doc_photo_path_r}}"
        alt="{{ 'Retro photograph of the document' }}" class="object-cover w-40 h-20 rounded-3xl">
    </div>

    <!-- New Banner image Preview -->
    <div class="mt-2" x-show="photoPreview" style="display: none;">
        <span class="block w-40 h-20 rounded-3xl bg-center bg-no-repeat bg-cover"
                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>

    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo_doc_retro.click()">
        {{ __('Upload Photo') }}
    </x-jet-secondary-button>

    @if ($this->user->doc_photo_path_r)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="delete_photo_doc_retro()">
            {{ __('Remove Photo') }}
        </x-jet-secondary-button>
    @endif

    @if ($error)
    <p class="text-red-500">{{ $error }}</p>
    @endif
    {{-- <x-jet-input-error for="photo_doc_retro" class="mt-2" /> --}}
</div>

