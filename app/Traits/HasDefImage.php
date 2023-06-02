<?php

namespace App\Traits;

trait HasDefImage
{

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function defImage()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : config('jetstream.profile_photo_disk', 'public');
    }
}
