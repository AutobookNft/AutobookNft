<?php

namespace App\Contracts;

interface UploadsImagesToIpfs
{
    /**
     * Validate and update the given team's name.
     *
     * @param  mixed  $team
     * @param  array  $input
     * @return void
     */
    public function update($team, array $input_photo);
}
