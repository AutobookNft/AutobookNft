<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Contracts\UpdatesProfilesSocialmedia;


class  UpdateProfileSocialmedia implements UpdatesProfilesSocialmedia
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {

        Validator::make($input, [
            'site_url'      => ['nullable'],
            'facebook' => ['nullable'],
            'twitter' => ['nullable'],
            'snapchat' => ['nullable'],
            'twitch' => ['nullable'],
            'oder' => ['nullable'],


            ])->validateWithBag('updateProfileSocialmedia');


        $user->forceFill([
            'site_url' => $input['site_url'],
            'facebook' => $input['facebook'],
            'twitter' => $input['twitter'],
            'snapchat' => $input['snapchat'],
            'twitch' => $input['twitch'],
            'oder' => $input['oder'],
        ])->save();

    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
       //
    }

    /**
     */
    public function __construct() {
    }
}
