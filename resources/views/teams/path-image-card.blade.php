<div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Collection Photo File Input -->
    <input type="file" class="hidden"
                wire:model="image_card"
                x-ref="image_card"
                x-on:change="
                        photoName = $refs.image_card.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.image_card.files[0]);
                " />

    <x-jet-label for="image_card" value="{{ __('Image for the avatar') }}" />

    <!-- Current Banner image -->
    <div class="mt-2" x-show="! photoPreview">
        <img src="{{$this->team->path_image_card }}" title="{{ $this->team->path_image_card}}" alt="{{ 'image for the card' }}" class="object-cover w-20 h-20 rounded-full">
    </div>

    <!-- New Banner image Preview -->
    <div class="mt-2" x-show="photoPreview" style="display: none;">
        <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>

    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image_card.click()">
        {{ __('Select a card image') }}
    </x-jet-secondary-button>

    @if ($this->team->path_image_card)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="delete_Path_Image_Card()">
            {{ __('Remove Photo') }}
        </x-jet-secondary-button>
    @endif

    <x-jet-input-error for="image_card" class="mt-2" />
</div>


