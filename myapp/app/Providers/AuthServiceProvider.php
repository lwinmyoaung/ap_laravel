<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Example gate: only allow admin users (adjust to your app)
        // Gate::define('admin', function ($user) {
        //     return isset($user->is_admin) && $user->is_admin;
        // });

        // Gate::before // Super Admin ပုံစံဖြစ်နေမယ်
        // Gate::before(function ($user) {
        //     return $user->id === 2;
        // });
    }
}
