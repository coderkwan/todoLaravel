<?php

use App\Http\Controllers\todoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [todoController::class, 'index']);
Route::post('/create', [todoController::class, 'create']);
Route::delete('/del', [todoController::class, 'delete']);
Route::get('/edit/{id}', [todoController::class, 'edit']);
Route::put('/update', [todoController::class, 'update']);
