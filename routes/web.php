<?php

use App\Http\Controllers\FreeGameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
