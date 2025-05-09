<?php

namespace App\Http\Controllers;

use App\Models\DetalleResidencia;
use Illuminate\Http\Request;

class DetalleResidenciaController extends Controller
{
    // Obtener todos los detalles de residencia
    public function index()
    {
        return DetalleResidencia::all();
    }

    // Crear un nuevo detalle de residencia
    public function store(Request $request)
    {
        $request->validate([
            'id_residencia' => 'required|exists:residencias,id_residencia|unique:detalle_residencias',
            'habitaciones' => 'required|integer|min:0',
            'plazas_totales' => 'required|integer|min:0',
            'baños' => 'required|integer|min:0',
            'cocina' => 'required|boolean',
            'sala' => 'required|boolean',
            'wifi' => 'required|boolean',
            'amueblado' => 'required|boolean',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        return DetalleResidencia::create($request->all());
    }

}
