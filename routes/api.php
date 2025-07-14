<?php

use App\Http\Controllers\FreeGameController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('/games', FreeGameController::class)->only(['index']);
Route::apiResource('users', UserController::class)->only(['store']);
