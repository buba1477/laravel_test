<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('{page}', 'App\Http\Controllers\MainController')->where('page', '.*');

Route::group(['prefix'=>'post'], function(){
    Route::get('/', 'App\Http\Controllers\Admin\Post\IndexController')->name('admin');
    Route::get('/create', 'App\Http\Controllers\Post\CreateController')->name('create.post');
    Route::post('/', 'App\Http\Controllers\Post\StoreController')->name('store.post');
});


require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
