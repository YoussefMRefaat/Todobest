<?php

use Illuminate\Support\Facades\Route;

/**
 * @patch Update user's information
 */
Route::patch('/update' , 'UpdateController@update');

/**
 * @patch Update the user's password
 */
Route::patch('/update/password' , 'UpdateController@updatePassword');
