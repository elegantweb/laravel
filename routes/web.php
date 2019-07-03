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

Route::group([
    'as' => 'admin.',
    'prefix' => config('admin.routes.prefix'),
    'middleware' => config('admin.routes.middleware'),
    'namespace' => 'Admin',
], function () {

    require('web.admin.php');

});

Route::get('/', 'HomeController@show')->name('home');
