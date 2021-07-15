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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\PostController::class, 'index'])->name('home');
Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create']);
Route::post('post', [App\Http\Controllers\PostController::class, 'store']);
Route::get('posts/{post}/edit', [App\Http\Controllers\PostController::class, 'edit']);
Route::get('posts/{post}', [App\Http\Controllers\PostController::class, 'show']);
Route::put('posts/{post}', [App\Http\Controllers\PostController::class, 'update']);
Route::delete('posts/{post}', [App\Http\Controllers\PostController::class, 'destroy']);