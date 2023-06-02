<div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Doc Photo front -->
    <input type="file" accept= {{$acceptedTypes}} class="hidden"
                wire:model="photo_doc_front"
                x-ref="photo_doc_front"
                x-on:change="
                        photoName = $refs.photo_doc_front.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.photo_doc_front.files[0]);"/>

    <x-jet-label for="photo_doc_front" value="{{ __('Front photograph of the document') }}" />

    <!-- Current Banner image -->
    <div class="mt-2" x-show="! photoPreview">
        <img src="{{$this->user->doc_photo_path_f }}" title="{{ $this->user->doc_photo_path_f}}"
        alt="{{ 'Front photograph of the document' }}" class="object-cover w-40 h-20 rounded-3xl">
    </div>

    <!-- New Banner image Preview -->
    <div class="mt-2" x-show="photoPreview" style="display: none;">
        <span class="block w-40 h-20 rounded-3xl bg-center bg-no-repeat bg-cover"
                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>

    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo_doc_front.click()">
        {{ __('Upload Photo') }}
    </x-jet-secondary-button>

    @if ($this->user->doc_photo_path_f)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="delete_photo_doc_front()">
            {{ __('Remove Photo') }}
        </x-jet-secondary-button>
    @endif

    <x-jet-input-error for="photo_doc_front" class="mt-2" />

</div>

