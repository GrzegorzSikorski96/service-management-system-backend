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
    }
);

Route::group(
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
                Route::get('/user/{userId}', 'UserController@user');
                Route::put('/user/{userId}', 'UserController@edit');

                Route::get('/user/{userId}/notes', 'UserDataController@notes');

                Route::get('/ticket/{ticketId}', 'TicketController@ticket');
                Route::put('/ticket', 'TicketController@edit');
                Route::post('/ticket', 'TicketController@create');
                Route::delete('/ticket/{ticketId}', 'TicketController@remove');

                Route::get('/ticket/{id}/notes', 'TicketDataController@notes');

                Route::get('/note/{noteId}', 'NoteController@note');
                Route::put('/note/{noteId}', 'NoteController@edit');
                Route::post('/note', 'NoteController@create');
                Route::delete('/note/{noteId}', 'NoteController@remove');

                Route::get('/device/{deviceId}', 'DeviceController@device');
                Route::put('/device/', 'DeviceController@edit');
                Route::post('/device', 'DeviceController@create');
                Route::post('/device/serialNumber', 'DeviceController@addBySerialNumber');
                Route::delete('/device/{deviceId}', 'DeviceController@remove');

                Route::get('/device/{deviceId}/tickets', 'DeviceDataController@tickets');

                Route::get('/client/{clientId}', 'ClientController@client');
                Route::put('/client', 'ClientController@edit');
                Route::post('/client', 'ClientController@create');
                Route::post('/client/number', 'ClientController@addByNumber');
                Route::delete('/client/{clientId}', 'ClientController@remove');


                Route::get('/clients', 'ClientController@clients');
                Route::get('/devices', 'DeviceController@devices');
                Route::get('/tickets', 'TicketController@tickets');

                Route::get('/client/{clientId}/tickets', 'ClientDataController@tickets');

                Route::get('/agency/{agencyId}/clients', 'AgencyDataController@clients');
                Route::get('/agency/{agencyId}/tickets', 'AgencyDataController@tickets');
                Route::get('/agency/{agencyId}/devices', 'AgencyDataController@devices');

                Route::get('/ticketStatuses', 'TicketStatusController@statuses');
            }
        );

        Route::group(
            [
                'middleware' => 'role.administrator',
            ],
            function (): void {
                Route::get('/agencies', 'AgencyController@agencies');

                Route::get('/service', 'ServiceController@service');
                Route::put('/service', 'ServiceController@edit');
                Route::post('/service', 'ServiceController@initialize');


                Route::post('/agency', 'AgencyController@create');

                Route::get('/agency/roles', 'AgencyRoleController@roles');
                Route::delete('/agency/{agencyId}', 'AgencyController@remove');
                Route::get('/agency/{agencyId}/employees', 'AgencyDataController@employees');
            }
        );

        Route::group(
            [
                'middleware' => 'role.manager'
            ],
            function (): void {
                Route::get('/users', 'UserController@users');
                Route::post('/user', 'UserController@create');
                Route::delete('/user/{userId}', 'UserController@remove');

                Route::get('/agency/{agencyId}', 'AgencyController@agency');
                Route::put('/agency/{agencyId}', 'AgencyController@edit');

                Route::post('/user/{userId}/block', 'UserController@block');
                Route::post('/user/{userId}/unblock', 'UserController@unblock');
            }
        );
    }
);
