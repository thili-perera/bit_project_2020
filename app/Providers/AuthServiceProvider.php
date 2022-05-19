<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('super-user', function ($user) {
            return $user->hasRole('Admin');
        });

        Gate::define('manage-users', function ($user) {
            return $user->hasAnyRoles(['Admin', 'Staff']);
        });

        Gate::define('dashboard-users', function ($user) {
            return $user->hasAnyRoles(['Admin', 'Staff', 'Delivery Officer']);
        });

        Gate::define('allusers', function ($user) {
            return $user->hasAnyRoles(['Admin', 'Staff', 'Delivery Officer', 'Customer']);
        });

        Gate::define('delivery', function ($user) {
            return $user->hasAnyRoles(['Delivery Officer']);
        });

        Gate::define('customer', function ($user) {
            return $user->hasRole('Customer');
        });
    }
}
