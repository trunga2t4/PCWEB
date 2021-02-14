<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/', function () {
    return redirect('/home');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'create']);

    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'store'])->name('profile.store');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);

    Route::post('/profile/{id}/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');


    Route::get('changepassword', [App\Http\Controllers\ChangePasswordController::class, 'index']);
    Route::post('changepassword', [App\Http\Controllers\ChangePasswordController::class, 'store'])->name('changepassword');


    Route::resource('post', App\Http\Controllers\PostController::class);
    Route::resource('relation', App\Http\Controllers\RelationsController::class);
    Route::resource('review', App\Http\Controllers\ReviewsController::class);
    Route::resource('bookmark', App\Http\Controllers\BookmarksController::class);
});
