<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::group(['prefix' => 'admin'], function() {
        Route::auth();

        Route::group(['middleware' => 'auth'], function () {
            Route::get('/', 'HomeController@index');

            Route::group(['prefix' => 'street'], function () {
                Route::get('{student}/delete',          'StreetController@destroy')->name('street.delete');
                Route::get('{student}/confirm-delete',  'StreetController@getModalDelete')->name('street.confirm-delete');
            });
            Route::resource('street', 'StreetController');

            Route::get('request/download-csv', 'RequestController@downloadCSV')->name('request.download-csv');
            Route::resource('request', 'RequestController');

        });
    });

    Route::get('/', 'FrontController@index');
    Route::get('/test', 'FrontController@test');
});

Route::group(['middleware' => 'api', 'prefix' => 'api'], function () {
    Route::post('/request', 'Api\RequestController@create');
});


