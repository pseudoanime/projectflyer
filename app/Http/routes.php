<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('pages.home');
});

Route::post('/foobar', function () {
    return "test";
} );

Route::resource('flyers', 'FlyersController');

Route::get('{postcode}/{street}', 'FlyersController@show');

Route::post('{postcode}/{street}/photos', 'FlyersController@addPhoto');
