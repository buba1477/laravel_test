<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Post\DestroyController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth;
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


Route::get('{page}', 'App\Http\Controllers\HomeController@index')->where('page', '.*');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');
//
Route::get('/register', function () {
    return view('auth.register');
})->name('register');
//
//
//Route::get('/my_page', 'App\Http\Controllers\MyFirstController@index');
//
//
Route::get('/about', 'App\Http\Controllers\MyAboutController@index')->name('about.index');
Route::get('/contacts', 'App\Http\Controllers\MyContactsController@index')->name('contact.index');
Route::get('/main', 'App\Http\Controllers\MyMainController@index')->name('main.index');

//
Route::post('/author', 'App\Http\Controllers\Post\MyAutorController@store')->name('author.store');
Route::get('/author/create', 'App\Http\Controllers\MyAutorController@create')->name('author.create');
Route::get('/author', 'App\Http\Controllers\MyAutorController@index')->name('author.index');

Route::get('/author/{author}', 'App\Http\Controllers\MyAutorController@show')->name('author.show');

Route::get('/author/{author}/edit', 'App\Http\Controllers\MyAutorController@edit')->name('author.edit');
Route::patch('/author/{author}', 'App\Http\Controllers\MyAutorController@update')->name('author.update');
Route::delete('/author/{author}', 'App\Http\Controllers\MyAutorController@destroy')->name('author.delete');

//
Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
    Route::get('/posts', 'IndexController')->name('post.index');
    Route::get('/posts/create', 'CreateController')->name('post.create');
    Route::get('/posts/{post}', 'ShowController')->name('post.show');
    Route::post('/posts/create', 'StoreController')->name('post.store');
    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
});
//
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' =>'admin', 'middleware' => 'admin'], function () {

    Route::group(['namespace' => 'Post'], function () {
        Route::get('post', 'IndexController')->name('admin.post.index');
    });
});

//    Route::get('/posts', 'IndexController')->name('post.index');
//    Route::post('/posts', 'StoreController')->name('post.store');
//    Route::get('/posts/create', 'CreateController')->name('post.create');
//    Route::get('/posts/update', 'App\Http\Controllers\MyPostController');
//    Route::get('/posts/delete', 'App\Http\Controllers\MyPostController');
//    Route::get('/posts/{post}', 'ShowController')->name('post.show');
//    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
//    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
//    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');


//Route::get('/posts', 'App\Http\Controllers\MyPostController@index')->name('post.index');
//Route::post('/posts', 'App\Http\Controllers\MyPostController@store')->name('post.storhttp://localhost/e');
//Route::get('/posts/create', 'App\Http\Controllers\MyPostController@create')->name('post.create');
////Route::get('/posts/update', 'App\Http\Controllers\MyPostController@update');
////Route::get('/posts/delete', 'App\Http\Controllers\MyPostController@delete');
////Route::get('/posts/first_or_create', 'App\Http\Controllers\MyPostController@firstOrCreate');
////Route::get('/posts/update_or_create', 'App\Http\Controllers\MyPostController@updateOrCreate');
//Route::get('/posts/{post}', 'App\Http\Controllers\MyPostController@show')->name('post.show');
//Route::get('/posts/{post}/edit', 'App\Http\Controllers\MyPostController@edit')->name('post.edit');
//Route::patch('/posts/{post}', 'App\Http\Controllers\MyPostController@update')->name('post.update');
//Route::delete('/posts/{post}', 'App\Http\Controllers\MyPostController@destroy')->name('post.delete');
//Route::group(['namespace' => 'App\Http\Controllers\Post'], function () {
//    Route::get('/posts', 'IndexController')->name('post.index');
//    Route::get('/posts/create', 'CreateController')->name('post.create');
//    Route::get('/posts/{post}', 'ShowController')->name('post.show');
//    Route::post('/posts/create', 'StoreController')->name('post.store');
//    Route::get('/posts/{post}/edit', 'EditController')->name('post.edit');
//    Route::patch('/posts/{post}', 'UpdateController')->name('post.update');
//    Route::delete('/posts/{post}', 'DestroyController')->name('post.delete');
//});
//
Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' =>'admin'], function () {

    Route::group(['namespace' => 'Post'], function () {
        Route::get('post', 'IndexController')->name('admin.post.index');
    });
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Auth::routes();

//Route::get('/home', [HomeController::class, 'index'])->name('home');
