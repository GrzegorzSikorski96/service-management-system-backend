<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(
    /**
     * @param $router
     */
    [
        'middleware' => 'api',
        'prefix' => 'auth'
    ],
    function ($router): void {
        Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/login', 'AuthController@login');
        Route::post('/logout', 'AuthController@logout');
        Route::post('/refresh', 'AuthController@refresh');
        Route::post('/me', 'AuthController@me');
    }
);
Route::get('/tickets', 'TicketController@tickets');
Route::get('/ticket/{id}', 'TicketController@ticket');
Route::post('/ticket', 'TicketController@create');
Route::put('/ticket/{id}', 'TicketController@edit');
Route::delete('/ticket/{id}', 'TicketController@remove');

Route::get('/clients', 'ClientController@clients');
Route::get('/client/{id}', 'ClientController@client');
Route::post('/client', 'ClientController@create');
Route::put('/client/{id}', 'ClientController@edit');
Route::delete('/client/{id}', 'ClientController@remove');

Route::get('/devices', 'DeviceController@devices');
Route::get('/device/{id}', 'DeviceController@device');
Route::post('/device', 'DeviceController@create');
Route::put('/device/{id}', 'DeviceController@edit');
Route::delete('/device/{id}', 'DeviceController@remove');
