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

Route::middleware('auth')->group(function () {
    Route::resource('todos', TodoController::class)->except(['index' ]);
});

//トップ画面
Route::get('/todos',[TodoController::class,'index'])->name('todos.index');

//todo新規作成
Route::get('/todos/create',[TodoController::class,'create'])->name('todos.create');
Route::post('/todos',[TodoController::class,'store'])->name('todos.store');

//todo編集
Route::get('/todos/update',[TodoController::class,'update'])->name('todos.update');
Route::post('/todos',[TodoController::class,'edit'])->name('todos.edit');