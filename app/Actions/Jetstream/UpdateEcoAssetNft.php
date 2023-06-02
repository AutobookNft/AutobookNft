<?php

namespace App\Actions\Jetstream;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UpdatesEcoAssetNfts;

class UpdateEcoAssetNft implements UpdatesEcoAssetNfts
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($team, array $input)
    {
        Gate::forUser(Auth::user())->authorize('update', $team);

        Validator::make($input, [
            'wallet_frangette'  => ['nullable', 'string'],
            'royalty_frangette' => ['nullable', 'numeric', 'max:100'],
            'mint_frangette'    => ['nullable', 'numeric', 'max:100'],

            'wallet_epp'        => ['nullable', 'string'],
            'royalty_epp'       => ['nullable', 'numeric', 'max:100'],
            'mint_epp'          => ['nullable', 'numeric', 'max:100'],

            'mint_owner'        => ['nullable', 'numeric',  'max:100'],
            'wallet_owner'      => ['nullable', 'string'],
            'royalty_owner'     => ['nullable', 'numeric', 'max:100'],

            'mint_creator'      => ['nullable', 'numeric', 'max:100'],
            'wallet_creator'    => ['nullable', 'string'],
            'royalty_creator'   => ['nullable', 'numeric', 'max:100'],

            'econft_number'     => ['nullable', 'numeric'],
            'eco_asset_roles'   => ['nullable', 'string', 'max:4096'],
            'floor_price'       => ['nullable', 'numeric'],

            ])->validateWithBag('updateDataCollection');

        $team->forceFill([

            'eco_asset_roles'   => $input['eco_asset_roles'],
            'econft_number'     => $input['econft_number'],
            
            'url_image_ipfs'    => $input['url_image_ipfs'],

            'wallet_frangette'  => $input['wallet_frangette'],
            'mint_frangette'    => $input['mint_frangette'],
            'royalty_frangette' => $input['royalty_frangette'],

            'wallet_epp'        => $input['wallet_frangette'],
            'mint_epp'          => $input['mint_frangette'],
            'royalty_epp'       => $input['royalty_epp'],

            'wallet_creator'    => $input['wallet_creator'],
            'royalty_creator'   => $input['royalty_creator'],
            'mint_creator'      => $input['mint_creator'],

            'wallet_owner'      => $input['wallet_owner'],
            'mint_owner'        => $input['mint_owner'],
            'royalty_owner'     => $input['royalty_owner'],


        ])->save();
    }
}
