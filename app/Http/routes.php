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

Route::get('/', 'InitialController@index');

Route::get('home', 'InitialController@index');

/*
    |--------------------------------------------------------------------------
    | TESTING
    |--------------------------------------------------------------------------
*/


Route::get('test', 'TestController@index');

/*
    |--------------------------------------------------------------------------
    | AUTHENTICATION / USERS
    |--------------------------------------------------------------------------
*/
Route::controllers([
    'auth'     => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::post('user/{user}/password_reset','UserController@passwordReset');
Route::post('user/{member}/create','UserController@store');

    //Edit
Route::get('user/{user}/edit','UserController@edit');
Route::patch('user/{user}','UserController@update');

    //Manage
Route::get('user/manage','UserController@index');


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
Route::get('member/{member}/delete','MemberController@destroy');

/*
    |--------------------------------------------------------------------------
    | PRINT ID CARDS
    |--------------------------------------------------------------------------
*/

    //Modify ID Cards
Route::get('idcard/{id_card}/reprint','IdCardController@reprint');
Route::get('idcard/{id_card}/printed','IdCardController@printed');
Route::get('idcard/{id_card}/received','IdCardController@received');

    //Export
Route::get('idcard/export','IdCardController@export');

    //Import
Route::get('idcard/import','IdCardController@import');
Route::post('idcard/import','IdCardController@importStore');

    //Index
Route::get('idcard','IdCardController@index');
Route::get('idcard/store','IdCardController@store');

/*
    |--------------------------------------------------------------------------
    | FAMILY
    |--------------------------------------------------------------------------
*/
Route::get('family/create','FamilyController@create');
Route::post('family/create','FamilyController@store');

/*
    |--------------------------------------------------------------------------
    | STUDY GROUPS
    |--------------------------------------------------------------------------
*/
    //Manage Members
Route::get('study_group/{study_group}/add_members','StudyGroupController@addMembers');
Route::post('study_group/{study_group}/add_members','StudyGroupController@storeAddMembers');
Route::get('study_group/{study_group}/remove_member/{member}','StudyGroupController@removeMember');
    //Create
Route::get('study_group/create','StudyGroupController@create');
Route::post('study_group/create','StudyGroupController@store');
    //Edit
Route::get('study_group/{study_group}/edit','StudyGroupController@edit');
Route::patch('study_group/{study_group}','StudyGroupController@update');
    //Delete
Route::get('study_group/{study_group}/delete','StudyGroupController@destroy');
    //View
Route::get('study_group/{study_group}','StudyGroupController@show');
    //Index
Route::get('study_group','StudyGroupController@index');

/*
    |--------------------------------------------------------------------------
    | TEAMS
    |--------------------------------------------------------------------------
*/
    //Manage Members
Route::get('team/{team}/add/{member}','TeamController@addMember');
Route::get('team/{team}/clear_interests','TeamController@removeInterestedMembers');
Route::get('team/{team}/add_members','TeamController@addMembers');
Route::get('team/{team}/remove_member/{member}','TeamController@removeMember');
Route::post('team/{team}/add_members','TeamController@storeAddMembers');
    //Create
Route::get('team/create','TeamController@create');
Route::post('team/create','TeamController@store');
    //Edit
Route::get('team/{team}/edit','TeamController@edit');
Route::patch('team/{team}','TeamController@update');
    //Delete
Route::get('team/{team}/delete','TeamController@destroy');
    //View
Route::get('team/{team}','TeamController@show');
    //Index
Route::get('team','TeamController@index');

/*
    |--------------------------------------------------------------------------
    | VISITORS
    |--------------------------------------------------------------------------
*/
//Statistics
Route::get('visitor/statistics','VisitorController@statistics');

//Create
Route::get('visitor/create','VisitorController@create');
Route::post('visitor/create','VisitorController@store');
//Edit
Route::get('visitor/{visitor}/edit','VisitorController@edit');
Route::patch('visitor/{visitor}','VisitorController@update');
//Delete
Route::get('visitor/{visitor}/delete','VisitorController@destroy');
//View
Route::get('visitor/{visitor}','VisitorController@show');
//Index
Route::get('visitor','VisitorController@index');