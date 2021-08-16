<?php

use Illuminate\Support\Facades\Route;

/**
 * @get get user's information
 */
Route::get('/' , 'ShowController@Show');

/**
 * @patch Update user's information
 */
Route::patch('/' , 'UpdateController@update');

/**
 * @patch Update the user's password
 */
Route::patch('/password' , 'UpdateController@updatePassword');
