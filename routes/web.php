<?php

use App\Http\Controllers\ArsipController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('/')->group(function () {
    Route::controller(ArsipController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/store', 'store');
        Route::post('/update/{arsip}', 'update');
        Route::post('/delete/{arsip}', 'delete');
    });
});
