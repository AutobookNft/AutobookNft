<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\Teams_item;
use App\Models\User;
use App\Policies\TeamPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Team::class => TeamPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //Gate::policy(Teams_item::class, TeamItemsPolicy::class);

        Gate::define('view-epp-or-company-content', function ($user) {
            return Cache::remember(
                'user.' . $user->id . '.canViewEppOrCompanyContent',
                config('app.cache_expiration'),
                // durata della cache in minuti
                function () use ($user) {
                    return $user->usertype == 'epp' || $user->usertype == 'company';
                }
            );
        });

        Gate::define('isAdmin', function ($user) {
            return Cache::remember(
                'user.' . $user->id . '.canisAdminContent',
                config('app.cache_expiration'),
                // durata della cache in minuti
                function () use ($user) {
                    return $user->usertype == 'admin';
                }
            );
        });

        Gate::define('isSuperadmin', function ($user) {
            return Cache::remember(
                'user.' . $user->id . '.canisSuperadminContent',
                config('app.cache_expiration'),
                // durata della cache in minuti
                function () use ($user) {
                    return $user->usertype == 'Superadmin';
                }
            );
        });


        Gate::define('view-wallet-manager', function ($user) {
            return Cache::remember(
                'user.' . $user->id . '.canViewWalletManager',
                config('app.cache_expiration'),
                // durata della cache in minuti
                function () use ($user) {
                    return !is_null($user->token);
                }
            );
        });

    }
}
