<?php



Route::namespace('Api')->name('api.')->group( function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

    Route::apiResource('/user', 'UserController');

    Route::apiResource('/event', 'EventController');
});
