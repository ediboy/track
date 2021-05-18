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

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['middleware' => ['auth']], function () {

    // Controllers
    Route::group(['prefix' => 'api'], function () {
        Route::resource('users', 'UserController');
        Route::resource('teams', 'TeamController');
        Route::resource('projects', 'ProjectController');
    });

    // Pages
    Route::get('/{any?}', function () {
        return view('app');
    })->where('any', '.*');
});
