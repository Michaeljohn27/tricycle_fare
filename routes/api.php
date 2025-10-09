<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FareController;
use App\Http\Controllers\TripController;

Route::apiResource('users', UserController::class);
Route::apiResource('fares', FareController::class);
Route::apiResource('trips', TripController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
