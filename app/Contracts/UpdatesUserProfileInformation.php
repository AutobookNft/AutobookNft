<?php

namespace App\Contracts;

/**
 * @method void update(\Illuminate\Foundation\Auth\User $user, array $input)
 */
interface UpdatesUserProfileInformation
{
 /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input);
}
