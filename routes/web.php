<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/movies', [App\Http\Controllers\HomeController::class, 'movies'])->name('movies');
Route::get('/movie/{id}', [App\Http\Controllers\HomeController::class, 'movie_detail'])->name('movie_detail');
Route::get('/actors', [App\Http\Controllers\HomeController::class, 'actors'])->name('actors');
Route::get('/actor/{id}', [App\Http\Controllers\HomeController::class, 'actor_detail'])->name('actor_detail');

Auth::routes(['reset' => false]);

Route::middleware(['auth'])->group(function () {
Route::get('/watch_lists', [App\Http\Controllers\UserController::class, 'watch_lists'])->name('watch_lists');
Route::get('/watch_lists_add/{id}', [App\Http\Controllers\UserController::class, 'watch_lists_add'])->name('watch_lists_add');
Route::post('/watch_lists_update', [App\Http\Controllers\UserController::class, 'watch_lists_update'])->name('watch_lists_update');
Route::get('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile');
Route::post('/profile_update', [App\Http\Controllers\UserController::class, 'profile_update'])->name('profile_update');
    Route::middleware(['admin'])->group(function () {
        Route::get('/movie_form', [App\Http\Controllers\MovieController::class, 'form'])->name('movie_form');
        Route::get('/movie_form_edit/{id}', [App\Http\Controllers\MovieController::class, 'edit'])->name('movie_form_edit');
        Route::get('/movie_delete/{id}', [App\Http\Controllers\MovieController::class, 'delete'])->name('movie_delete');
        Route::post('/movie_add', [App\Http\Controllers\MovieController::class, 'add'])->name('movie_add');

        Route::get('/actor_form', [App\Http\Controllers\ActorController::class, 'form'])->name('actor_form');
        Route::get('/actor_form_edit/{id}', [App\Http\Controllers\ActorController::class, 'edit'])->name('actor_form_edit');
        Route::get('/actor_delete/{id}', [App\Http\Controllers\ActorController::class, 'delete'])->name('actor_delete');
        Route::post('/actor_add', [App\Http\Controllers\ActorController::class, 'add'])->name('actor_add');
    });
});
