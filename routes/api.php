<?php

use App\Http\Controllers\FreeGameController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::get('/games', [FreeGameController::class, 'index']);
