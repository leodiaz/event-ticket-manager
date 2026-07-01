<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecitalController;
use App\Http\Controllers\PresaleOrderController;
use App\Http\Controllers\DoorSaleController;
use App\Http\Controllers\CheckInController;


Route::get('/', function () {
    return view('home');
});


Route::resource('recitals', RecitalController::class);

Route::resource('presale-orders', PresaleOrderController::class);

Route::resource('door-sales', DoorSaleController::class);

Route::get('/check-in',[CheckInController::class, 'index'])->name('check-in.index');

Route::get('/check-in/search',[CheckInController::class, 'search'])->name('check-in.search');

Route::post('/check-in/{presaleOrder}/validate',[CheckInController::class, 'validate'])->name('check-in.validate');