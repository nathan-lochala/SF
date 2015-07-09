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

        view()->composer(['study_groups/*'],function($view){
            $view->with('menu_study_groups','menu-open');
        });

        view()->composer(['idcard/*'],function($view){
            $view->with('menu_idcards','menu-open');
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
