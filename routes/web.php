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
Route::group(['middleware' => ['web'],'namespace' => 'Admin','as' => 'Admin::'], function () {
    Route::any('/', [
        'as' => 'login',
        'uses' => 'LoginController@login'
    ]);

    Route::any('/doLogin', [
        'as' => 'doLogin',
        'uses' => 'LoginController@doLogin'
    ]);

    Route::get('/logout', [
        'as' => 'logout',
        'uses' => 'LoginController@logout'
    ]);
});
