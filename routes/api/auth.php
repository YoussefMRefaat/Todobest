<?php

use Illuminate\Support\Facades\Route;

/**
 * @group Divide routes into two groups based on user's authentication status.
 */
Route::group([
    'namespace' => 'App\\Http\\Controllers\\ApiControllers\\Auth',
] , function(){

    /**
     * @group Routes for guests' requests
     */
    Route::group([
        'middleware' => 'api.guest',
    ] , function(){

        /**
         * @post Send a register request
         */
        Route::post('/register' , 'RegisterController@store');

        /**
         * @post Send a login request
         */
        Route::post('/login' , 'AuthController@login');

        /**
         * @get Send a reset password request
         */
        Route::get('/forgot-password' , 'AuthController@forgotPassword');
    });

    /**
     * @group Routes for authenticated users' requests
     */
    Route::group([
        'middleware' => 'auth:sanctum',
    ] , function(){

        /**
         * @delete Send a logout request
         */
        Route::delete('/logout' , 'AuthController@logout');

        /**
         * @get Send a verify email request
         */
        Route::get('/verify-email' , 'AuthController@verifyEmail');
    });
});
