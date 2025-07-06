<?php

use App\Http\Controllers\OAuth2Controller;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Routes publiques OAuth2
Route::post('/oauth/register', [OAuth2Controller::class, 'register']);
Route::post('/oauth/login', [OAuth2Controller::class, 'login']);

// Routes protégées OAuth2
Route::middleware('auth:oauth')->group(function () {
    Route::post('/oauth/logout', [OAuth2Controller::class, 'logout']);
    Route::prefix('oauth')->group(function () {
        Route::apiResource('tasks', TaskController::class);
    });
});