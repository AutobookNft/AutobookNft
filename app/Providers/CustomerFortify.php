<?php

namespace App\Providers;

use App\Contracts\MyUpdatesUserProfileInformation;
use App\Contracts\UpdatesProfilesCompanyDatasheet;
use App\Contracts\UpdatesProfilesSocialmedia;
use App\Contracts\UpdatesUserTaxData;
use Laravel\Fortify\Fortify;


class CustomerFortify extends Fortify
{

    public function isDeferred()
    {
        return false;
    }

    /**
     * Register a class / callback that should be used to update user profile information.
     *
     * @param  string  $callback
     * @return void
     **/
    public static function updateUserProfileInformationUsing(string $callback)
    {
        return app()->singleton(MyUpdatesUserProfileInformation::class, $callback);
    }

    public static function updateProfileCompanyDatasheetUsing(string $class)
    {
        return app()->singleton(UpdatesProfilesCompanyDatasheet::class, $class);
    }

    public static function updateProfileSocialmediaUsing(string $class)
    {
        return app()->singleton(UpdatesProfilesSocialmedia::class, $class);
    }

    public static function updateUserTaxDataUsing(string $class)
    {
        return app()->singleton(UpdatesUserTaxData::class, $class);
    }

}
