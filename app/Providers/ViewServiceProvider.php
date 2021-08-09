<?php

namespace App\Providers;

use App\Models\City;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\CityComposer;
use App\View\Components\User\UserComponent;

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

        Blade::directive('datetime', function ($expression) {
            return "<?php echo ($expression)->format('m/d/Y'); ?>";
        });
        Blade::directive('ars', function ($expression) {

            return "<?php echo strtoupper($expression)?>";
        });
        Blade::directive('route', function ($expression) {
            //dd($expression);
            return "<?php echo route($expression); ?>";
        });

        # Component
        // Blade::component('my-custom-user', UserComponent::class);
    }
}
