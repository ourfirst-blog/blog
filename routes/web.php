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
Route::get('/', function(){ 
    return view('welcome');}
);


Route::group(['middleware' => ['web'],'namespace' => 'Admin','as' => 'Admin::'], function () {
    Route::any('/admin/login', [
        'as' => 'login',
        'uses' => 'LoginController@login'
    ]);

    Route::any('/admin/doLogin', [
        'as' => 'doLogin',
        'uses' => 'LoginController@doLogin'
    ]);

    Route::get('/admin/logout', [
        'as' => 'logout',
        'uses' => 'LoginController@logout'
    ]);
});

Route::group(['middleware' => ['web','admin'],'namespace' => 'Admin','as' => 'Admin::'], function () {
    Route::any('/admin/index', [
        'as' => 'index',
        'uses' => 'DashboardController@index'
    ]);
});