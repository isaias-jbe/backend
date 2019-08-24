<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->name('api.')->group( function () {

    Route::prefix('/user')->group( function () {
        Route::get('/', 'UserController@index')->name('user.index');
        Route::get('/{id}', 'UserController@show')->name('user.show');
        Route::post('/', 'UserController@store')->name('user.store');
        Route::put('/{id}', 'UserController@update')->name('user.update');
        Route::delete('/{id}', 'UserController@delete')->name('user.delete');
    });

    Route::prefix('/event')->group( function () {
        Route::get('/', 'EventController@index')->name('event.index');
        Route::get('/{id}', 'EventController@show')->name('event.show');
        Route::post('/', 'EventController@store')->name('event.store');
        Route::put('/{id}', 'EventController@update')->name('event.update');
        Route::delete('/{id}', 'EventController@delete')->name('event.delete');
    });
});
