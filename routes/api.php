<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/games/browse', [GameController::class, 'browse',])->middleware('auth:sanctum');

Route::post('/games', [GameController::class, 'create'])->middleware('auth:sanctum');

Route::put('/games/{id}', [GameController::class, 'update'])->middleware('auth:sanctum');

Route::get('/games/{id}', [GameController::class, 'read'])->middleware('auth:sanctum');

Route::delete('/games/{id}', [GameController::class, 'delete'])->name('games')->middleware('auth:sanctum');