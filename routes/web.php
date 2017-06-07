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

    //文章路由
    Route::get('admin/posts', [
        'as' => 'posts',
        'uses' => 'PostController@index'
        ]);

    Route::get('admin/add_post', [
        'as' => 'add_post',
        'uses' => 'PostController@add'
        ]);

    Route::get('admin/save_post', [
        'as' => 'save_post',
        'uses' => 'PostController@store'
        ]);

    Route::get('admin/edit_post', [
        'as' => 'edit_post',
        'uses' => 'PostController@edit'
        ]);

    Route::post('admin/delete_post', [
        'as' => 'delete_post',
        'uses' => 'PostController@delete'
        ]);
//分类路由
    Route::get('admin/categories', [
            'as' => 'categories',
            'uses' => 'CategoryController@index'
            ]);

        Route::get('admin/add_category', [
            'as' => 'add_category',
            'uses' => 'CategoryController@add'
            ]);

        Route::get('admin/save_category', [
            'as' => 'save_category',
            'uses' => 'CategoryController@store'
            ]);

        Route::get('admin/edit_category', [
            'as' => 'edit_category',
            'uses' => 'CategoryController@edit'
            ]);

        Route::post('admin/delete_category', [
            'as' => 'delete_category',
            'uses' => 'CategoryController@delete'
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