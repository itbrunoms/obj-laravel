<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('/conta', [App\Http\Controllers\Api\AccountController::class, 'store']);
