<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
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
        // filter
        view()->composer('pages.includes.filters', 'App\Http\Controllers\publicController@menu');

        // navigation
        view()->composer('pages.includes.navigation', 'App\Http\Controllers\publicController@menu');

        // navigation
        view()->composer('pages.includes.searchnav', 'App\Http\Controllers\publicController@menu');

         // footer
        view()->composer('pages.includes.footer', 'App\Http\Controllers\publicController@menu');

        
        
        // view()->composer('pages.includes.filters', function($view)
        // {
        //     $view->with('categories', Category::WHERE('parent', 0)->WHERE('country_id','=', 1)->WHERE('publish','=', "Yes")->with('subCategories')->get());

        // });
    }
}
