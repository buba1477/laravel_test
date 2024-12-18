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

Route::get('/oauth', App\Http\Controllers\API\OauthController::class);

//Route::group(['middleware' => 'auth:sanctum'], function () {
//
//
//
//});



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

    Route::group(['middleware' => 'jwt.auth'], function() {

        Route::get('/people',  App\Http\Controllers\API\GetPeopleController::class);
        Route::get('/download',  App\Http\Controllers\API\DownloadController::class);
        Route::delete('/{file}',  App\Http\Controllers\API\DeleteFileController::class);
        Route::delete('/people/{person}',  App\Http\Controllers\API\DeletePeopleController::class);
        Route::post('/people',  App\Http\Controllers\API\PeopleController::class);
        Route::post('/peoples/{person}',  App\Http\Controllers\API\EditPeopleController::class);
        Route::get('/{person}',  App\Http\Controllers\API\GetUserController::class);

    });

});
