<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Map API Routes (Public)
Route::get('/markers', [\App\Http\Controllers\Api\MapController::class, 'getMarkers']);
Route::get('/stats', [\App\Http\Controllers\Api\MapController::class, 'getStats']);
