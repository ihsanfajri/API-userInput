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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/persons',[App\Http\Controllers\PersonController::class, 'get']);

Route::get('/person/{id}',[App\Http\Controllers\PersonController::class, 'getById']);

Route::post('/person',[App\Http\Controllers\PersonController::class, 'post']);

Route::put('/person/{id}',[App\Http\Controllers\PersonController::class, 'put']);

Route::delete('/person/{id}',[App\Http\Controllers\PersonController::class, 'delete']);


