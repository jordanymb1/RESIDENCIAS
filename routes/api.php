<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;

// Rutas públicas para registro y login
Route::post('register', [AuthController::class, 'register']);  // Ruta de registro
Route::post('login', [AuthController::class, 'login']);        // Ruta de login

// Rutas protegidas por autenticación con Sanctum
Route::middleware('auth:sanctum')->apiResource('usuarios', UsuarioController::class);
Route::middleware('auth:sanctum')->apiResource('usuarios', UsuarioController::class);
