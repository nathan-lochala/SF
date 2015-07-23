<?php

namespace App\Providers;

use App\Member\Family;
use App\Member\Member;
use App\Member\PrintList;
use App\StudyGroup\StudyGroup;
use App\Team\Team;
use App\User;
use App\Visitor\Visitor;
use Illuminate\Routing\Router;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to the controller routes in your routes file.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(Router $router)
    {
        //
        parent::boot($router);

        $router->model('team', Team::class);
        $router->model('member', Member::class);
        $router->model('user', User::class);
        $router->model('id_card', PrintList::class);
        $router->model('family', Family::class);
        $router->model('study_group', StudyGroup::class);
        $router->model('visitor', Visitor::class);
    }

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(['namespace' => $this->namespace], function ($router) {
            require app_path('Http/routes.php');
        });
    }
}
