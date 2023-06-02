<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UpdatesDataCollections;

class UpdateDataCollection implements UpdatesDataCollections
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($team, array $input, array $image_ipfs, array $image_avatar,array $image_banner,array $image_card)
       {

        Gate::forUser(Auth::user())->authorize('update', $team);

        $user_id = Auth::id();

        Validator::make($input, [
            'description'           => ['nullable'],
            'name'                  => ['nullable', 'string', 'max:255'],
            //mi assicuro che non vengano inseriti caratteri non supportati dal filesystem
            'type'                  => ['nullable', 'string', 'max:10'],
            'url_collection_site'   => ['nullable', 'URL'],
            'image_ipfs'            => ['nullable', 'image', 'max:4096'],
            'image_card'            => ['nullable', 'image', 'max:4096'],
            'image_banner'          => ['nullable', 'image', 'max:4096'],
            'image_avatar'          => ['nullable', 'image', 'max:4096'],
            'floor_price'           => ['nullable', 'numeric'],

            ])->validateWithBag('updateDataCollection');

        if (isset($image_ipfs['image_econft'])) {
            $team->updateCollectionEcoNftPhoto($image_ipfs['image_econft'], $input['id']);
        }

        if (isset($image_card['image_card'])) {
            $team->updateCollectionCard($image_card['image_card'], $input['id']);
        }

        if (isset($image_banner['image_banner'])) {
            $team->updateCollectionBanner($image_banner['image_banner'], $input['id']);
        }

        if (isset($image_avatar['image_avatar'])) {
            $team->updateCollectionAvatar($image_avatar['image_avatar'], $input['id']);
        }

        // Cambia il nome della cartella
        //Storage::disk('public')->move('image/' . $user_id . '/collections/' . $team->name, 'image/' . $user_id . '/collections/' . $input['name']);


        $team->forceFill([

            'name'              => $input['name'],
            'description'       => $input['description'],
            'eco_asset_nft_id'  => $input['eco_asset_nft_id'],
            'url_collection_site'=> $input['url_collection_site'],
            'econft_number'     => $input['econft_number'],
            'type'              => $input['type'],
            'position'          => $input['position'],
            'show'              => $input['show'],
            'token'             => $input['token'],
            'owner_id'          => $input['owner_id'],
            'wallet_frangette'  => $input['wallet_frangette'],
            'wallet_epp'        => $input['wallet_epp'],
            'mint_frangette'    => $input['mint_frangette'],
            'mint_epp'          => $input['mint_epp'],
            'royalty_frangette' => $input['royalty_frangette'],
            'royalty_epp'       => $input['royalty_epp'],
            'floor_price'       => $input['floor_price'],

        ])->save();

    }
}
