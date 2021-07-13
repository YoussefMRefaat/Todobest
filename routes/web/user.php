<?php

use Illuminate\Support\Facades\Route;

/**
 * @get Show an update user form
 */
Route::get('/update' , 'UpdateController@update')->name('updateUser');

/**
 * @patch Update user's information
 */
Route::patch('/update' , 'UpdateController@store')->name('storeUpdateUser');

/**
 * @get Show an update user's password form
 */
Route::get('/update/password' , 'UpdateController@updatePassword')->name('updatePassword');

/**
 * @patch Update the user's password
 */
Route::patch('/update/password' , 'UpdateController@storePassword')->name('storeUpdatePassword');
