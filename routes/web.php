<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/home', function () {
    return view('home');
});

Route::get('/startordering', [App\Http\Controllers\FoodpostController::class, 'showallfood'])->name('startordering');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

Route::get('/profile/create', [App\Http\Controllers\ProfileController::class, 'createprofile']);

Route::post('/profile/create', [App\Http\Controllers\ProfileController::class, 'storeprofile'])->name('storeprofile');

Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit']);

Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'update'])->name('updateprofile');

Route::get('/post/create', [App\Http\Controllers\FoodpostController::class, 'index'])->name('post.createfood');

Route::post('/post/create', [App\Http\Controllers\FoodpostController::class, 'storefood'])->name('post.storefood');

Route::get('/post/{id}', [App\Http\Controllers\FoodpostController::class, 'showfood'])->name('post.showfood');

Route::get('/orders/{id}', [App\Http\Controllers\FoodpostController::class, 'showorder'])->name('showorder');
//Route::get('/posts', [App\Http\Controllers\FoodpostController::class, 'showallfood'])->name('post.showallfood');

Route::get('/post/edit/{id}', [App\Http\Controllers\FoodpostController::class, 'editfood'])->name('post.editfood');

Route::post('/post/edit', [App\Http\Controllers\FoodpostController::class, 'updatefood'])->name('post.storeedits');

Route::get('/post/delete/{id}', [App\Http\Controllers\FoodpostController::class, 'deletefood']);

Route::get('/post/comment/{id}', [App\Http\Controllers\CommentController::class, 'index'])->name('comment.create');

Route::post('/post/comment', [App\Http\Controllers\CommentController::class, 'storecomment'])->name('comment.store');