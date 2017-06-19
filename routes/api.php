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


// news
Route::get('/getMainNews', 'NewsController@getMainNews');
Route::get('/getFiveNews', 'NewsController@getFiveNews');
Route::get('/getRestNews', 'NewsController@getRestNews');
Route::get('/getLatestNews/{num}', 'NewsController@getLatestNews');
Route::get('/getMostWatchedNews/{num}', 'NewsController@getMostWatchedNews');
Route::get('/getYesterdayNews/{num}', 'NewsController@getYesterdayNews');
Route::get('/getLocalNews', 'NewsController@getLocalNews');
Route::get('/getInternationalNews', 'NewsController@getInternationalNews');
Route::get('/getSingleNews/{id}', 'NewsController@getSingleNews');
Route::get('/getNewsByCategory/{id}', 'NewsController@getNewsByCategory');
Route::get('/getRelatedNews/{id}/{num}', 'NewsController@getRelatedNews');

// quran
Route::get('/pray', 'QuranController@pray');

// comment
Route::get('/getComments/{id}', 'CommentController@getComments');

// cooking
Route::get('/getNumRecipes/{num}', 'NewsController@getNumRecipes');

// currency
Route::get('/currency', 'CurrencyController@index');




