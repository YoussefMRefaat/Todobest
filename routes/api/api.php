<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Include authentication routes
require __DIR__ . '/auth.php';


/**
 * @fallback Return not found if an unknown URI is requested
 */
Route::fallback(function(){
    abort(404 , 'Not found');
});

