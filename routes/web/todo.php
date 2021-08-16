<?php

use Illuminate\Support\Facades\Route;

/**
 * @get Show the main view with all user's todos
 */
Route::get('/' , 'ShowController@index')->name('home');

/**
 * @post Create a new todo
 */
Route::post('/' , 'CreateController@store');

/**
 * @patch Mark a todo as done or undone
 *
 * @param int $id - ID of the todo
 */
Route::patch('/{id}/done' , 'UpdateController@doneHandle');

/**
 * @delete Delete a todo
 *
 *  @param int $id - ID of the todo
 */
Route::delete('/{id}' , 'DeleteController@destroy');
