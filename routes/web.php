<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecitalController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('recitals', RecitalController::class);