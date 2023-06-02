<div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
    <!-- Collection Photo File Input -->
    <input type="file" class="hidden"
                wire:model="image_econft"
                x-ref="image_econft"
                x-on:change="
                        photoName = $refs.image_econft.files[0].name;
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL($refs.image_econft.files[0]);
                " />

    <x-jet-label for="image_econft" value="{{ __('Image for NFT collection') }}" />
    <x-jet-label for="image_econft" value="{{ __('This is the image that represents the entire collection') }}" />

    <!-- Current Collection Photo -->
    <div class="mt-2" x-show="! photoPreview">
        <img src="{{$this->team->path_image_econft }}" title="{{ $this->team->path_image_econft}}" alt="{{ 'photo for NFT collection' }}" class="object-cover w-20 h-20 rounded-full">
    </div>

    <!-- New Collection Photo Preview -->
    <div class="mt-2" x-show="photoPreview" style="display: none;">
        <span class="block w-20 h-20 bg-center bg-no-repeat bg-cover rounded-full"
                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
        </span>
    </div>

    <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.image_econft.click()">
        {{ __('Select A New EcoNFT Photo') }}
    </x-jet-secondary-button>

    @if ($this->team->path_image_econft)
        <x-jet-secondary-button type="button" class="mt-2" wire:click="delete_path_image_econft()">
            {{ __('Remove Photo') }}
        </x-jet-secondary-button>
    @endif

    <x-jet-input-error for="image_econft" class="mt-2" />
</div>
