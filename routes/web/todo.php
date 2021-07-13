<?php

use Illuminate\Support\Facades\Route;

/**
 * @get Show the main view with all user's todos
 */
Route::get('/index' , 'ShowController@index')->name('home');

/**
 * @post Create a new todo
 */
Route::post('/create' , 'CreateController@store');

/**
 * @patch Mark a todo as done or undone
 *
 * @param int $id - ID of the todo
 */
Route::patch('/done/{id}' , 'UpdateController@doneHandle');

/**
 * @delete Delete a todo
 *
 *  @param int $id - ID of the todo
 */
Route::delete('/delete/{id}' , 'DeleteController@destroy');
