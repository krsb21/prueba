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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Prefix api route predefined by Laravel
//Prefix users routes
Route::prefix('users')
->group(function () {
    Route::get('/', 'App\Http\Controllers\UserController@getUsers');
    Route::get('/{id}/tasks', 'App\Http\Controllers\UserController@getUserTasks');
});
//Prefix tasks routes
Route::prefix('tasks')->group(function () {
    Route::post('/', 'App\Http\Controllers\TaskController@store');
    Route::put('/{id}', 'App\Http\Controllers\TaskController@update');
    Route::delete('/{id}', 'App\Http\Controllers\TaskController@destroy');
});
