<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FreeGameController;
use App\Http\Controllers\Api\FreeGameThreadController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ThreadController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::apiResource('freegames', FreeGameController::class)->only(['index', 'show']);
Route::apiResource('freegames.threads', FreeGameThreadController::class)->only(['index']);
Route::apiResource('threads', ThreadController::class)->only(['index', 'show']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('me', [UserController::class, 'show']);

    Route::apiResource('freegames.threads', FreeGameThreadController::class)->only(['store']);
    Route::apiResource('threads.posts', PostController::class)->only(['store']);
    Route::delete('threads/{thread}', [ThreadController::class, 'destroy']);
    Route::delete('posts/{post}', [PostController::class, 'destroy']);
});
