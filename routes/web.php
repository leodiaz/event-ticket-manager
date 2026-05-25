<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecitalController;
use App\Http\Controllers\PresaleOrderController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('recitals', RecitalController::class);

Route::resource('presale-orders', PresaleOrderController::class);