<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return redirect(url('member/create'));
});

Route::get('home', function () {
    return redirect(url('member/create'));
});

Route::get('test', 'TestController@index');

/*
    |--------------------------------------------------------------------------
    | AUTHENTICATION
    |--------------------------------------------------------------------------
*/
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::post('user/{user}/password_reset','UserController@passwordReset');
Route::post('user/{member}/create','UserController@store');


/*
    |--------------------------------------------------------------------------
    | MEMBERS
    |--------------------------------------------------------------------------
*/
    //Search
Route::get('member/search','MemberController@search');
Route::post('member/search','MemberController@searchResults');

    //View All
Route::get('member/view_all','MemberController@viewAll');

    //Family Management
Route::get('member/{member}/remove_family','MemberController@removeFamily');

    //Member Methods
Route::get('member','MemberController@index');
Route::get('member/create','MemberController@create');
Route::post('member/create','MemberController@store');
Route::get('member/{member}','MemberController@show');
Route::get('member/{member}/edit','MemberController@edit');
Route::patch('member/{member}','MemberController@update');

/*
    |--------------------------------------------------------------------------
    | TEAMS
    |--------------------------------------------------------------------------
*/
Route::get('team','TeamController@index');
Route::get('team/create','TeamController@create');
Route::post('team/create','TeamController@store');
Route::get('team/{team}/edit','TeamController@edit');
Route::patch('team/{team}','TeamController@update');
Route::get('team/{team}/delete','TeamController@destroy');

/*
    |--------------------------------------------------------------------------
    | PRINT ID CARDS
    |--------------------------------------------------------------------------
*/
ROUTE::get('print/store','IdCardController@store');
ROUTE::get('print/{id_card}/reprint','IdCardController@reprint');
ROUTE::get('print/{id_card}/printed','IdCardController@printed');
ROUTE::get('print/{id_card}/received','IdCardController@received');

/*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
*/
ROUTE::get('family/create','FamilyController@create');
ROUTE::post('family/create','FamilyController@store');