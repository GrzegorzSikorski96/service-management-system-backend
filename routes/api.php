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
