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

        view()->composer(['study_group/*'],function($view){
            $view->with('menu_study_groups','menu-open');
        });

        view()->composer(['idcard/*'],function($view){
            $view->with('menu_idcards','menu-open');
        });

        view()->composer(['user/*'],function($view){
            $view->with('menu_user','menu-open');
        });

        view()->composer(['visitor/*'],function($view){
            $view->with('menu_visitor','menu-open');
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
