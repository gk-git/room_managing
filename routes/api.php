<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

    Route::resource('rooms', 'RoomsController', ['except' => ['create', 'edit']]);

    Route::resource('customers', 'CustomersController', ['except' => ['create', 'edit']]);

    Route::resource('reservations', 'ReservationsController', ['except' => ['create', 'edit']]);


    Route::post('reservations_new', 'ReservationsController@newReservation');
    Route::post('reservations_delete', 'ReservationsController@deleteReservation');
    Route::post('reservations_update', 'ReservationsController@updateReservations');
    Route::post('reservations_get', 'ReservationsController@getReservations');
    Route::post('reservations_move', 'ReservationsController@moveReservation');
    Route::post('reservations_resize', 'ReservationsController@resizeReservation');

    Route::post('room_new', 'RoomsController@newRoom');
    Route::post('room_update', 'RoomsController@room_update');
    Route::post('rooms_get', 'RoomsController@getRooms');
});
