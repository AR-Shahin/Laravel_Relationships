<?php

namespace App\Providers;

use App\Http\View\Composers\CityComposer;
use App\Models\City;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        # Options 1
        // View::share('globalValue', 'I am global view variable!');

        # Options 2
        // View::composer(['welcome', 'view.*'], function ($view) {
        //     $view->with('globalCity', City::get());
        // });

        # Option 3
        View::composer(['welcome', 'view.*'], CityComposer::class);
    }
}
