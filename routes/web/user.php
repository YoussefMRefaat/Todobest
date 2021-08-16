<?php

use Illuminate\Support\Facades\Route;

/**
 * @get Show an update user form
 */
Route::get('/' , 'UpdateController@update')->name('updateUser');

/**
 * @patch Update user's information
 */
Route::patch('/' , 'UpdateController@store')->name('storeUpdateUser');

/**
 * @get Show an update user's password form
 */
Route::get('/password' , 'UpdateController@updatePassword')->name('updatePassword');

/**
 * @patch Update the user's password
 */
Route::patch('/password' , 'UpdateController@storePassword')->name('storeUpdatePassword');
