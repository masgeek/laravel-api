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

/** Begin hotel routes  **/
Route::get('/hotels', 'HotelController@index')->name('hotels.index');

Route::post('/hotels', 'HotelController@store')->name('hotels.store');

Route::get('/hotels/{hotel}/hotel', 'HotelController@show')->name('hotels.show');

Route::put('/hotels/{hotel}/update', 'HotelController@update')->name('hotels.update');

Route::delete('/hotels/{hotel}/delete', 'HotelController@destory')->name('hotels.destroy');

