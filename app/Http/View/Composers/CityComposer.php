<?php

namespace App\Http\View\Composers;

use App\Models\City;
use Illuminate\View\View;

class CityComposer
{
    public function compose(View $view)
    {
        $view->with('globalCity', City::get());
    }
}
