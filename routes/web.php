
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FareController;
use App\Http\Controllers\TripController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/users', [UserController::class, 'store']);
Route::post('/users/{user}', [UserController::class, 'show']);
Route::post('/fares', [FareController::class, 'store']);
Route::post('/fares/{fare}', [FareController::class, 'show']);
Route::post('/trips', [TripController::class, 'store']);
Route::post('/trips/{trip}', [TripController::class, 'show']);

Route::put('/users/{user}', [UserController::class, 'update']);
Route::put('/fares/{fare}', [FareController::class, 'update']);
Route::put('/trips/{trip}', [TripController::class, 'update']);

Route::delete('/users/{user}', [UserController::class, 'destroy']);
Route::delete('/fares/{fare}', [FareController::class, 'destroy']);
Route::delete('/trips/{trip}', [TripController::class, 'destroy']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::get('/fares', [FareController::class, 'index']);
Route::get('/fares/{fare}', [FareController::class, 'show']);
Route::get('/trips', [TripController::class, 'index']);
Route::get('/trips/{trip}', [TripController::class, 'show']);
