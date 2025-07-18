<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\SportsController;

// Route::middleware('auth:sanctum')->get('/sports', [SportsController::class, 'index']);

// Temporary open route for testing
Route::get('/sports', [SportsController::class, 'index']);
Route::get('/scores', [SportsController::class, 'scores']);
Route::get('/leagues', [SportsController::class, 'leagues']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
