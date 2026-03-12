<?php

use App\Http\Controllers\HabitController;
use App\Http\Controllers\LogsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//all  the routes we need for habit model
Route::apiResource('habits', HabitController::class);

//all  the routes we need for Logs model
Route::apiResource('Logs',LogsController::class);


// Route::get('/',function(){
//     return "api ";
// });
