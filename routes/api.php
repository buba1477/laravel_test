<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/people',  App\Http\Controllers\API\GetPeopleController::class);
Route::get('/{person}',  App\Http\Controllers\API\GetUserController::class);
Route::post('/people',  App\Http\Controllers\API\PeopleController::class);
Route::patch('/{person}',  App\Http\Controllers\API\EditPeopleController::class);
