<?php

namespace App\Contracts;

interface UpdatesEcoAssetNfts
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $user
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($team, array $input);
}
