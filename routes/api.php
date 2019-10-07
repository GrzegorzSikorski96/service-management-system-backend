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
Route::get('/ticket/{ticketId}', 'TicketController@ticket');
Route::get('/ticket/{id}/notes', 'TicketController@notes');
Route::post('/ticket', 'TicketController@create');
Route::put('/ticket/{ticketId}', 'TicketController@edit');
Route::delete('/ticket/{ticketId}', 'TicketController@remove');

Route::get('/clients', 'ClientController@clients');
Route::get('/client/{clientId}', 'ClientController@client');
Route::post('/client', 'ClientController@create');
Route::put('/client/{clientId}', 'ClientController@edit');
Route::delete('/client/{clientId}', 'ClientController@remove');

Route::get('/devices', 'DeviceController@devices');
Route::get('/device/{deviceId}', 'DeviceController@device');
Route::post('/device', 'DeviceController@create');
Route::put('/device/{deviceId}', 'DeviceController@edit');
Route::delete('/device/{deviceId}', 'DeviceController@remove');

Route::get('/service', 'ServiceController@service');
Route::post('/service', 'ServiceController@initialize');
Route::put('/service', 'ServiceController@edit');

Route::get('/agency/{agencyId}', 'AgencyController@agency');
Route::get('/agencies', 'AgencyController@agencies');
Route::post('/agency', 'AgencyController@create');
Route::put('/agency/{agencyId}', 'AgencyController@edit');
Route::delete('/agency/{agencyId}', 'AgencyController@remove');

Route::get('/note/{id}', 'NoteController@note');
Route::post('/note', 'NoteController@create');
Route::put('/note/{id}', 'NoteController@edit');
Route::delete('/note/{id}', 'NoteController@remove');

Route::get('/user/{id}', 'UserController@user');
Route::get('/users', 'UserController@users');
Route::get('/user/{id}/notes', 'UserController@notes');
Route::post('/user', 'UserController@create');
Route::put('/user/{id}', 'UserController@edit');
Route::post('/user/{id}/block', 'UserController@block');
Route::post('/user/{id}/unblock', 'UserController@unblock');
Route::delete('/user/{id}', 'UserController@remove');
