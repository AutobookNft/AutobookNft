<?php

namespace App\Actions\Jetstream;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use App\Contracts\UploadsImagesCards;


class UploadImageCard implements UploadsImagesCards
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

            'image_card' => ['nullable', 'image', 'max:4096'],

            ])->validateWithBag('updateDataCollection');

        if (isset($input['image_card'])) {

            $team->updateCollectionCard($input['image_card'], $input['collection_name']);

        }
    }
}
