<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category\Category;
use App\Models\Color\Color;
use App\Models\Size;

use Illuminate\Support\Facades\View;

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
        View::composer('*', function(){
            $categories = Category::get()->toArray();
            $colors = Color::get()->toArray();
            $sizes = Size::get()->toArray();

            View::share('categories', $categories);
            View::share('colors', $colors);
            View::share('sizes', $sizes);
        });
    }
}
