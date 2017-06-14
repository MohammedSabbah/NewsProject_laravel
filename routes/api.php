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

Route::get('/test', 'NewsController@test');

Route::get('/getMainNews', 'NewsController@getMainNews');
Route::get('/getFiveNews', 'NewsController@getFiveNews');
Route::get('/getRestNews', 'NewsController@getRestNews');
Route::get('/getLocalNews', 'NewsController@getLocalNews');
Route::get('/getInternationalNews', 'NewsController@getInternationalNews');
Route::get('/getSingleNews/{id}', 'NewsController@getSingleNews');
Route::get('/pray', 'NewsController@pray');

Route::get('/currency', 'CurrencyController@index');


