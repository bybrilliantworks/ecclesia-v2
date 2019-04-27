<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();



Route::group(['middleware' => 'auth'], function(){

    Route::get('/home', 'HomeController@index');

    Route::get('/members', 'MemberController@index');
    Route::get('/members/create', 'MemberController@create');
    Route::post('/members', 'MemberController@store');
    Route::get('/members/{id}', 'MemberController@show');
    Route::get('/members/{id}/edit', 'MemberController@edit');
    Route::post('/members/{id}', 'MemberController@update');
    Route::post('/upload/members', 'MemberController@import');

    Route::get('/projects', 'ProjectController@index');
    Route::get('/projects/create', 'ProjectController@create');
    Route::post('/projects', 'ProjectController@store');


    Route::get('/products', 'ProductController@index');
    Route::get('/products/create', 'ProductController@create');
    Route::post('/products', 'ProductController@store');


    Route::get('/assets', 'AssetController@index');
    Route::get('/assets/create', 'AssetController@create');
    Route::post('/assets', 'AssetController@store');


    Route::get('/attendance/store', 'AttendanceController@store');

    Route::get('/groups', 'GroupController@index');
    Route::post('/groups', 'GroupController@store');
    Route::get('/groups/create', 'GroupController@create');

    Route::resource('/events', 'EventController');
    Route::get('/events/{id}/attendance', 'EventController@attendance');
    Route::get('/events/attendance/check_in', 'EventController@checkIn');
    Route::get('/events/attendance/remove_checkin', 'EventController@undoCheckIn');
    Route::resource('/event_types', 'EventTypeController');

    Route::get('/users', 'UserController@index');
    Route::post('/users', 'UserController@store');
    Route::put('users/{id}', 'UserController@update');
    Route::get('users/create', 'UserController@create');

});
