<?php

namespace App\Providers;

use App\CheckAge;
use App\Http\Middleware\CacheResponseMiddleware;
use App\Models\City;
use App\Models\Product;
use App\Observers\ProductOvserver;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        JsonResource::withoutWrapping();
        app()->singleton('CheckAge', function () {
            return new CheckAge;
        });

        Product::observe(ProductOvserver::class);

        $this->app->singleton(CacheResponseMiddleware::class);
    }
}
