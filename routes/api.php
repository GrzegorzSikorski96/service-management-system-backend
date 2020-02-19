<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::group(
    [
        'middleware' => 'api',
    ],
    function (): void {
        Route::get('/', 'ExceptionController@getEmptyResponse');
        Route::get('/ticket/{token}/status', 'TicketDataController@status');
        Route::get('/service', 'ServiceController@service');
        Route::get('/agencies', 'AgencyController@agencies');
        Route::get('/service/initialized', 'ServiceController@isInitialized');
    }
);

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth'
    ],
    function (): void {
        Route::post('/register', 'Auth\RegisterController@register');
        Route::post('/login', 'AuthController@login');
        Route::post('/logout', 'AuthController@logout');
        Route::post('/refresh', 'AuthController@refresh');
        Route::post('/me', 'AuthController@me');
    }
);

Route::group(
    [
        'middleware' => ['auth', 'api']
    ],
    function (): void {
        Route::group(
            [
                'middleware' => 'role.serviceman',
            ],
            function (): void {
                Route::get('/user/{userId}', 'UserController@user')->where('id', '[0-9]+');
                Route::put('/user/{userId}', 'UserController@edit')->where('id', '[0-9]+');

                Route::get('/user/{userId}/notes', 'UserDataController@notes')->where('userId', '[0-9]+');

                Route::get('/ticket/{ticketId}', 'TicketController@ticket')->where('ticketId', '[0-9]+');
                Route::put('/ticket', 'TicketController@edit');
                Route::post('/ticket', 'TicketController@create');
                Route::delete('/ticket/{ticketId}', 'TicketController@remove')->where('ticketId', '[0-9]+');

                Route::get('/ticket/{ticketId}/notes', 'TicketDataController@notes')->where('ticketId', '[0-9]+');

                Route::get('/note/{noteId}', 'NoteController@note')->where('noteId', '[0-9]+');
                Route::put('/note', 'NoteController@edit');
                Route::post('/note', 'NoteController@create');
                Route::delete('/note/{noteId}', 'NoteController@remove')->where('noteId', '[0-9]+');

                Route::get('/device/{deviceId}', 'DeviceController@device')->where('deviceId', '[0-9]+');
                Route::put('/device/', 'DeviceController@edit');
                Route::post('/device', 'DeviceController@create');
                Route::post('/device/serialNumber', 'DeviceController@addBySerialNumber');
                Route::delete('/device/{deviceId}', 'DeviceController@remove')->where('deviceId', '[0-9]+');

                Route::get('/device/{deviceId}/tickets', 'DeviceDataController@tickets')->where('deviceId', '[0-9]+');

                Route::get('/client/{clientId}', 'ClientController@client')->where('clientId', '[0-9]+');
                Route::put('/client', 'ClientController@edit');
                Route::post('/client', 'ClientController@create');
                Route::post('/client/number', 'ClientController@addByNumber');
                Route::delete('/client/{clientId}', 'ClientController@remove')->where('clientId', '[0-9]+');

                Route::get('/clients', 'ClientController@clients');
                Route::get('/devices', 'DeviceController@devices');
                Route::get('/tickets', 'TicketController@tickets');

                Route::get('/client/{clientId}/tickets', 'ClientDataController@tickets')->where('clientId', '[0-9]+');

                Route::get('/agency/{agencyId}/clients', 'AgencyDataController@clients')->where('agencyId', '[0-9]+');
                Route::get('/agency/{agencyId}/tickets', 'AgencyDataController@tickets')->where('agencyId', '[0-9]+');
                Route::get('/agency/{agencyId}/devices', 'AgencyDataController@devices')->where('agencyId', '[0-9]+');

                Route::put('/ticket/{ticketId}/status/{statusId}', 'TicketStatusController@changeTicketStatus');
                Route::get('/ticket/{ticketId}/statuses', 'TicketStatusController@availableTicketStatuses')->where('ticketId', '[0-9]+');

                Route::get('/document/{ticketId}/{type}', 'DocumentController@creation');
            }
        );

        Route::group(
            [
                'middleware' => 'role.manager'
            ],
            function (): void {
                Route::get('/users', 'UserController@users');
                Route::put('/user', 'UserController@edit');
                Route::post('/user', 'UserController@create');
                Route::delete('/user/{userId}', 'UserController@remove')->where('userId', '[0-9]+');

                Route::get('/agency/{agencyId}', 'AgencyController@agency')->where('agencyId', '[0-9]+');
                Route::get('/agency/{agencyId}/statistics', 'AgencyDataController@statistics')->where('agencyId', '[0-9]+');
                Route::get('/agency/{agencyId}/employees', 'AgencyDataController@employees')->where('agencyId', '[0-9]+');
                Route::put('/agency', 'AgencyController@edit');

                Route::post('/user/{userId}/block', 'UserController@block')->where('userId', '[0-9]+');
                Route::post('/user/{userId}/unblock', 'UserController@unblock')->where('userId', '[0-9]+');
            }
        );

        Route::group(
            [
                'middleware' => 'role.administrator',
            ],
            function (): void {
                Route::put('/service', 'ServiceController@edit');
                Route::post('/service/initialize', 'ServiceController@initialize');

                Route::post('/agency', 'AgencyController@create');

                Route::get('/agency/roles', 'AgencyRoleController@roles');
                Route::delete('/agency/{agencyId}', 'AgencyController@remove')->where('agencyId', '[0-9]+');
            }
        );
    }
);
