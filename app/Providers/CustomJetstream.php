<?php

namespace App\Providers;

use App\Contracts\UpdatesDataItem;
use App\Contracts\UpdatesEcoAssetNfts;
use App\Contracts\UploadsImagesAvatars;
use App\Contracts\UploadsImagesCards;
use Laravel\Jetstream\Jetstream;

use App\Contracts\UpdatesDataCollections;
use App\Contracts\UpdatesProfilesCompanyDatasheet;
use App\Contracts\UpdatesProfileSocialmedia;
use App\Contracts\UploadsPhotoDocfront;
use App\Contracts\UploadsPhotoDocretro;
use App\Contracts\UpdatesUserTaxData;
use App\Contracts\UploadsImageToIpfs;
use App\Contracts\UploadsImagesBanners;
use App\Contracts\UploadsImageAvatar;
use App\Contracts\UploadsImageCard;
use App\Contracts\UpdatesEcoAssetNft;

class CustomJetstream extends Jetstream
{

    public function isDeferred()
    {
        return false;
    }

    public function register()
    {
        //
    }

    public function boot()
    {
        //
    }

    public static function updateDataItemsUsing(string $class)
    {
        return app()->singleton(UpdatesDataItem::class, $class);
    }


    public static function updateDataCollectionUsing(string $class)
    {
        return app()->singleton(UpdatesDataCollections::class, $class);
    }


    public static function uploadImageToIpfsUsing(string $class)
    {
        return app()->singleton(UploadsImagesToIpfs::class, $class);
    }

    public static function uploadImageBannerUsing(string $class)
    {
        return app()->singleton(UploadsImagesBanners::class, $class);
    }

    public static function uploadImageAvatarUsing(string $class)
    {
        return app()->singleton(UploadsImagesAvatars::class, $class);
    }

    public static function uploadImageCardUsing(string $class)
    {
        return app()->singleton(UploadsImagesCards::class, $class);
    }

    public static function updateEcoAssetNftUsing(string $class)
    {
        return app()->singleton(UpdatesEcoAssetNfts::class, $class);
    }
}
