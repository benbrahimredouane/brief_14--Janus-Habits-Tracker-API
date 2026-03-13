<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HabitController;
use App\Http\Controllers\LogsController;
use Illuminate\Support\Facades\Route;

// Public authentication routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth routes
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);

    // Habit CRUD routes
    Route::apiResource('habits', HabitController::class);

    // Habit log routes
    Route::get('/habits/{habit}/logs', [LogsController::class, 'index']);
    Route::post('/habits/{habit}/logs', [LogsController::class, 'store']);

    Route::get('/logs/{log}', [LogsController::class, 'show']);
    Route::put('/logs/{log}', [LogsController::class, 'update']);
    Route::delete('/logs/{log}', [LogsController::class, 'destroy']);

    // Habit stats route
    // Route::get('/habits/{habit}/stats', [HabitController::class, 'stats']);
});