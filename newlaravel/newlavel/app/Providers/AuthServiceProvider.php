<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ProvidersAuthServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ProvidersAuthServiceProvider
{
    /**
     * Register services.
     */
    protected $policies =[
        'App\Model\User' => 'App\Policies\UserPolicy',
    ];

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
         $this->registerPolicies();
        Gate::before(function ($user,$ability){
            if($user->checkRole('SADM')){
                return true;
            }
        });
        Gate::define('Admin', function ($user){
            return $user->checkRole('MOD');
        });
        Gate::define('MOD', function ($user){
            return $user->checkRole('MOD');
        });
        Gate::define('EDT', function ($user){
            return $user->checkRole('EDT');
        });
        Gate::define('VWR', function ($user){
            return $user->checkRole('VWR');
        });
    }
}
