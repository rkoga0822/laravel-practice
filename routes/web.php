<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//新規登録
Route::get('/register',[AuthController::class,'showRegister'])->name('register');
Route::post('/register',[AuthController::class,'register'])->name('register.store');

//ログイン
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.store');

//ログアウト
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

//resourceはすべてのcrudのルーティングを持っている
Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoController::class)->except(['show']);
});

