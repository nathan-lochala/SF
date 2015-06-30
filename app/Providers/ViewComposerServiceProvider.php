<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer(['member/*'],function($view){
            $view->with('menu_member','menu-open');
        });

        view()->composer(['team/*'],function($view){
            $view->with('menu_team','menu-open');
        });

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
