<?php

namespace App\Providers;

use App\Role;
use App\User;
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
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Internal notifications
        Gate::define('internal_notification_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('internal_notification_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('internal_notification_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('internal_notification_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('internal_notification_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Rooms
        Gate::define('room_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('room_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('room_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('room_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('room_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Customers
        Gate::define('customer_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('customer_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('customer_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('customer_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('customer_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Reservations
        Gate::define('reservation_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('reservation_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('reservation_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('reservation_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('reservation_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

    }
}
