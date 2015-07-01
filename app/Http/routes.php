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
Route::get('member/search','MemberController@search');
Route::post('member/search','MemberController@searchResults');

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