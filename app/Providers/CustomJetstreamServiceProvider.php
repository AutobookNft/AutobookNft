<?php

namespace App\Providers;

use App\Actions\Jetstream\UpdateDataCollection;
use App\Actions\Jetstream\UpdateDataItem;
use App\Actions\Jetstream\UpdateEcoAssetNft;
use App\Actions\Jetstream\UpdateProfileSocialmedia;
use App\Actions\Jetstream\UpdateUserTaxData;
use App\Actions\Jetstream\UploadImageAvatar;
use App\Actions\Jetstream\UploadImageBanner;
use App\Actions\Jetstream\UploadImageCard;
use App\Actions\Jetstream\UploadImageToIpfs;
use App\Actions\Jetstream\UploadPhotoDocfront;
use App\Actions\Jetstream\UploadPhotoDocretro;

use App\Http\Livewire\JeatStreamForms\UpdateProfileTaxDataForms;
use App\Http\Livewire\JeatStreamForms\UpdateDataCollectionForm;
use App\Http\Livewire\JeatStreamForms\UpdateEcoAssetNftForm;
use App\Http\Livewire\JeatStreamForms\UpdateProfileCompanyDatasheetForms;
use App\Http\Livewire\JeatStreamForms\UpdateProfileSocialmediaForm;
use App\Http\Livewire\JeatStreamForms\UploadImageAvatarForm;
use App\Http\Livewire\JeatStreamForms\UploadImageBannerForm;
use App\Http\Livewire\JeatStreamForms\UploadImageCardForm;
use App\Http\Livewire\JeatStreamForms\UploadImageToIpfsForm;

use App\Http\Livewire\JeatStreamForms\UploadPhotoDocfrontForm;
use App\Http\Livewire\JeatStreamForms\UploadPhotoDocretroForm;

use App\Http\Livewire\UpdateProfileInformationForm;
use Illuminate\Support\Facades\Blade;
use Illuminate\View\Compilers\BladeCompiler;
use Laravel\Jetstream\Features;
use Laravel\Jetstream\Jetstream;
use Livewire\Livewire;


use App\Providers\CustomJetstream;
//use Laravel\Jetstream\JetstreamServiceProvider as BaseJetstreamServiceProvider;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\JetstreamServiceProvider;

class CustomJetstreamServiceProvider extends JetstreamServiceProvider
{
// Aggiungi qui eventuali metodi personalizzati che vorrai includere
// nella tua classe di servizio.


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->mergeConfigFrom(__DIR__ . '/../config/jetstream.php', 'jetstream');

        $this->app->afterResolving(BladeCompiler::class, function () {

            if (config('jetstream.stack') === 'livewire' && class_exists(Livewire::class)) {

                Livewire::component('profile.update-profile-company-datasheet-forms', UpdateProfileCompanyDatasheetForms::class);
                Livewire::component('livewire.update-profile-information-form', UpdateProfileInformationForm::class);
                Livewire::component('profile.update-profile-socialmedia-form', UpdateProfileSocialmediaForm::class);
                Livewire::component('profile.upload-photo-docfront-form', UploadPhotoDocfrontForm::class);
                Livewire::component('profile.upload-photo-docretro-form', UploadPhotoDocretroForm::class);
                Livewire::component('profile.update-profile-tax-data-forms', UpdateProfileTaxDataForms::class);

                if (Features::hasApiFeatures()) {
                    Livewire::component('api.api-token-manager', ApiTokenManager::class);
                }

                if (Features::hasTeamFeatures()) {
                    Livewire::component('teams.update-data-collection-form', UpdateDataCollectionForm::class);
                    Livewire::component('teams.upload-image-to-ipfs-form', UploadImageToIpfsForm::class);
                    Livewire::component('collections.upload-image-banner-form', UploadImageBannerForm::class);
                    Livewire::component('collections.upload-image-avatar-form', UploadImageAvatarForm::class);
                    Livewire::component('collections.upload-image-card-form', UploadImageCardForm::class);
                    Livewire::component('ecoassetnfts.update-eco-asset-nft-form', UpdateEcoAssetNftForm::class);

                }

            }
        });
    }



    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'jetstream');

        CustomJetstream::updateDataItemsUsing(UpdateDataItem::class);
        CustomJetstream::updateDataCollectionUsing(UpdateDataCollection::class);
        CustomJetstream::uploadImageToIpfsUsing(UploadImageToIpfs::class);
        CustomJetstream::uploadImageBannerUsing(UploadImageBanner::class);
        CustomJetstream::uploadImageAvatarUsing(UploadImageAvatar::class);
        CustomJetstream::uploadImageCardUsing(UploadImageCard::class);
        CustomJetstream::updateEcoAssetNftUsing(UpdateEcoAssetNft::class);


    }

    // protected function configureComponents()
    // {
    //     parent::configureComponents();
    //     $this->callAfterResolving(BladeCompiler::class, function () {

    //         $this->registerComponent('choose-team');
    //     });
    // }

}
