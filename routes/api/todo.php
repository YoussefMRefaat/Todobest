<?php

use Illuminate\Support\Facades\Route;


/**
 * Validate date param in routes that exist in the current file
 */
Route::pattern('date' , '[a-z_]+');

/**
 * @post Add a todo
 */
Route::post('/' , 'CreateController@store');

/**
 * @get Get all user's todos
 */
Route::get('/' , 'ShowController@index');

/**
 * @get Get a specific todo
 *
 * @param int $id - ID of the todo
 */
Route::get('/{id}' , 'ShowController@show');

/**
 * @patch Mark a todo as done
 *
 * @param int $id - ID of the todo
 */
Route::patch('/{id}/done' , 'UpdateController@toDone');

/**
 * @patch Mark a todo as undone
 *
 * @param int $id - ID of the todo
 */
Route::patch('/{id}/undone' , 'UpdateController@toUndone');

/**
 * @patch Update a todo
 *
 * @param int $id
 */
Route::patch('/{id}' , 'UpdateController@update');

/**
 * @patch Clear a date value - set it to null
 *
 * @param string $date - name of the column
 * @param int $id - ID of the todo
 */
Route::patch('/{id}/clear-{date}' , 'UpdateController@clearDate');

/**
 * @delete Delete a todo
 *
 * @param int $id - ID of the todo
 */
Route::delete('/{id}' , 'DeleteController@destroy');
