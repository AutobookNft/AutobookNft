<?php

namespace App\Providers;

use App\Contracts\MyUpdatesUserProfileInformation;
use Illuminate\Console\View\Components\Component;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

use App\Actions\Fortify\UpdateUserProfileInformation;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
             


    }
}
