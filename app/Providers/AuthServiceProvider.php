<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Product;
use App\Policies\PostPolicy;
use App\Policies\ProductPolicy;
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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        Post::class => PostPolicy::class,
        Product::class => ProductPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function ($user) {
            // info($user->role);
            return $user->role === 'admin';
        });

        Gate::define('isUser', fn ($user) => $user->role === 'user');

        Gate::define('update-post', [PostPolicy::class, 'update']);
    }
}
