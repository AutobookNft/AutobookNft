<?php

namespace App\Contracts;

interface UpdatesDataItem
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $team
     * @param  mixed  $state
     * @param  mixed  $fileCover
     * @param  mixed  $fileMedia
     * @return void
     */
    public function update($team, array $state, $fileCover, $fileMedia);
}
