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
//Home
Route::group(['middleware' => ['web',],'namespace' => 'Home','as' => 'Home::'], function () {
    Route::get('/home/index', [
        'as' => 'index',
        'uses' => 'HomeController@index'
    ]);
});


//Admin
Route::group(['middleware' => ['web','system'],'namespace' => 'Admin','as' => 'Admin::'], function () {
    Route::get('/admin/login', [
        'as' => 'login',
        'uses' => 'LoginController@login'
    ]);

    Route::post('/admin/doLogin', [
        'as' => 'doLogin',
        'uses' => 'LoginController@doLogin'
    ]);

    Route::get('/admin/logout', [
        'as' => 'logout',
        'uses' => 'LoginController@logout'
    ]);
});

Route::group(['middleware' => ['web','admin','system'],'namespace' => 'Admin','as' => 'Admin::'], function () {

    Route::get('/admin/index', [
        'as' => 'index',
        'uses' => 'DashboardController@index'
    ]);

    Route::get('/admin/category', [
        'as' => 'category_show',
        'uses' => 'CategoryController@show'
    ]);


});