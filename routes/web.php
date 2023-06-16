<?php

use App\Http\Controllers\todoController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/login', function(){ return view('/login');})->name("login");
Route::get('/register', function(){ return view('/register');});

Route::post('/login',[userController::class, 'authenticate']);
Route::post('/register',[userController::class, 'register']);
Route::get('/logout',[userController::class, 'logout']);

Route::get('/', [todoController::class, 'index'])->middleware(['auth'])->name("home");
Route::post('/create', [todoController::class, 'create'])->middleware(['auth']);
Route::delete('/del', [todoController::class, 'delete'])->middleware(['auth']);
Route::get('/edit/{id}', [todoController::class, 'edit'])->middleware(['auth']);
Route::put('/update', [todoController::class, 'update'])->middleware(['auth']);
