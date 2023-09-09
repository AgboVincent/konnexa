<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Posts\PostsController;
use \App\Http\Controllers\Posts\PostLikeController;
use \App\Http\Controllers\UserPostsController;
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

//Route::get('/posts', function () {
//    return view('posts.index');
//});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('users/{user:username}/posts', [UserPostsController::class, 'index'])->name('users.posts');
Route::get('posts', [PostsController::class, 'index'])->name('posts');
Route::get('posts/{post}', [PostsController::class, 'show'])->name('posts.show');
Route::post('posts', [PostsController::class, 'store']);
Route::delete('posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
Route::post('posts/{post}/likes', [PostLikeController::class, 'store'])
    ->name('posts.likes');
Route::delete('posts/{post}/likes', [PostLikeController::class, 'destroy'])
    ->name('posts.likes');

