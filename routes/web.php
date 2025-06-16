<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

// Rutas para mostrar los formularios de registro y login

// Ruta para mostrar el formulario de registro
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Ruta para manejar el registro (POST)
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Ruta para mostrar el formulario de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Ruta para manejar el login (POST)
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

// Rutas para la gestión de usuarios (requiere autenticación)
Route::middleware('auth:sanctum')->get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::middleware('auth:sanctum')->get('/usuarios/{id}', [UsuarioController::class, 'show'])->name('usuarios.show');
Route::middleware('auth:sanctum')->put('/usuarios/{id}', [UsuarioController::class, 'update'])->name('usuarios.update');
Route::middleware('auth:sanctum')->delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
