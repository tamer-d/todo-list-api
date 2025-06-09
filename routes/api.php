<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Routes publiques pour l'authentification
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Routes protégées nécessitant une authentification
Route::middleware('auth:sanctum')->group(function () {
    // Route de déconnexion
    Route::post('/logout', [AuthController::class, 'logout']);
});