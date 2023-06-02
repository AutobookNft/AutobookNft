<?php

namespace App\Contracts;

interface UpdatesDataCollections
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($team, array $input, array $image_econft, array $image_avatar, array $image_banner, array $image_card);
}
