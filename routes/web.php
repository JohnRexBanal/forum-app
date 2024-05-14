<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthenticationController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/create', function () {
    return view('posts.create');
})->name('posts.create');

// Registration routes
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// login routes
Route::get('login', [AuthenticationController::class, 'index'])->name('login');
Route::post('login/process', [AuthenticationController::class, 'authenticateUser']);
Route::post('logout', [AuthenticationController::class, 'logout']);


// posts routes
Route::get('/posts', [PostController::class, 'index'])->name('home');
Route::post('/create', [PostController::class, 'store'])->name('create');
Route::get('/show/{id}', [PostController::class, 'show'])->name('show');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [PostController::class, 'update'])->name('update');
Route::delete('/delete/{id}', [PostController::class, 'destroy'])->name('delete');

