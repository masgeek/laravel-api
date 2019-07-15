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

/** begin hotel bookings **/
Route::get('/hotel-bookings', 'HotelBookingController@index')->name('hotel-bookings.index');

Route::post('/hotel-bookings', 'HotelBookingController@store')->name('hotel-bookings.store');

Route::get('/hotel-bookings/{id}', 'HotelBookingController@show')->name('hotel-bookings.show');

Route::put('/hotel-bookings/{id}', 'HotelBookingController@update')->name('hotel-bookings.update');

Route::delete('/hotel-bookings/{id}', 'HotelBookingController@destroy')->name('hotel-bookings.destroy');

/** Begin hotel routes  **/
Route::get('/hotels', 'HotelController@index')->name('hotels.index');

Route::post('/hotels', 'HotelController@store')->name('hotels.store');

Route::get('/hotels/{id}', 'HotelController@show')->name('hotels.show');

Route::put('/hotels/{id}', 'HotelController@update')->name('hotels.update');

Route::delete('/hotels/{id}', 'HotelController@destroy')->name('hotels.destroy');

//Hotel rooms
Route::get('/hotel-rooms', 'HotelRoomController@index')->name('hotel-rooms.index');

Route::post('/hotel-rooms', 'HotelRoomController@store')->name('hotel-rooms.store');

Route::get('/hotel-rooms/{id}', 'HotelRoomController@show')->name('hotel-rooms.show');

Route::put('/hotel-rooms/{id}', 'HotelRoomController@update')->name('hotel-rooms.update');

Route::delete('/hotel-rooms/{id}', 'HotelRoomController@destroy')->name('hotel-rooms.destroy');

//room types route
Route::get('/room-types', 'RoomTypeController@index')->name('room-types.index');

Route::post('/room-types', 'RoomTypeController@store')->name('room-types.store');

Route::get('/room-types/{id}', 'RoomTypeController@show')->name('room-types.show');

Route::put('/room-types/{id}', 'RoomTypeController@update')->name('room-types.update');

Route::delete('/room-types/{id}', 'RoomTypeController@destroy')->name('room-types.destroy');

//room type prices
Route::get('/room-type-prices', 'RoomTypePriceController@index')->name('room-type-prices.index');

Route::post('/room-type-prices', 'RoomTypePriceController@store')->name('room-type-prices.store');

Route::get('/room-type-prices/{id}', 'RoomTypePriceController@show')->name('room-type-prices.show');

Route::put('/room-type-prices/{id}', 'RoomTypePriceController@update')->name('room-type-prices.update');

Route::delete('/room-type-prices/{id}', 'RoomTypePriceController@destroy')->name('room-type-prices.destroy');


//routes fallback
Route::fallback(function () {
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact info@website.com'], 404);
});
