<?php

use Illuminate\Support\Facades\Route;


/**
 * Validate date param in routes that exist in the current file
 */
Route::pattern('date' , '[a-z_]+');

/**
 * @post Add a todo
 */
Route::post('/add' , 'CreateController@store');

/**
 * @get Get all user's todos
 */
Route::get('/all' , 'ShowController@index');

/**
 * @get Get a specific todo
 *
 * @param int $id - ID of the todo
 */
Route::get('/show/{id}' , 'ShowController@show');

/**
 * @patch Mark a todo as done
 *
 * @param int $id - ID of the todo
 */
Route::patch('/done/{id}' , 'UpdateController@toDone');

/**
 * @patch Mark a todo as undone
 *
 * @param int $id - ID of the todo
 */
Route::patch('/undone/{id}' , 'UpdateController@toUndone');

/**
 * @patch Update a todo
 *
 * @param int $id
 */
Route::patch('/update/{id}' , 'UpdateController@update');

/**
 * @patch Clear a date value - set it to null
 *
 * @param string $date - name of the column
 * @param int $id - ID of the todo
 */
Route::patch('/update/clear-{date}/{id}' , 'UpdateController@clearDate');

/**
 * @delete Delete a todo
 *
 * @param int $id - ID of the todo
 */
Route::delete('/delete/{id}' , 'DeleteController@destroy');
