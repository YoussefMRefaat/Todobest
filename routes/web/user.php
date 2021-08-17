<?php

use Illuminate\Support\Facades\Route;

/**
 * @get Show an update user form
 */
Route::get('/' , 'UpdateController@edit')->name('updateUser');

/**
 * @patch Update user's information
 */
Route::patch('/' , 'UpdateController@update')->name('storeUpdateUser');

/**
 * @get Show an update user's password form
 */
Route::get('/password' , 'UpdateController@editPassword')->name('updatePassword');

/**
 * @patch Update the user's password
 */
Route::patch('/password' , 'UpdateController@updatePassword')->name('storeUpdatePassword');
