<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::apiResource('order', OrderController::class);

    Route::get('/exchange-rate/{currencyCode?}', [ExchangeRateController::class, 'getRates']);

});

Route::post('user/login', [AuthController::class, 'login']);
Route::post('user/register', [AuthController::class, 'register']);
