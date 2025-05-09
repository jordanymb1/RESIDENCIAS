<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\DetalleResidenciaController;
use App\Http\Controllers\FavoritoController;
use App\Http\Controllers\ReservaController;

Route::apiResource('usuarios', UsuarioController::class);
Route::apiResource('residencias', ResidenciaController::class);
Route::apiResource('detalles', DetalleResidenciaController::class);
Route::apiResource('favoritos', FavoritoController::class);
Route::apiResource('reservas', ReservaController::class);

/*Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');*/
