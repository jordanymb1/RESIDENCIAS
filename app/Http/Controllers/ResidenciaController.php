<?php

namespace App\Http\Controllers;

use App\Models\Residencia;
use Illuminate\Http\Request;

class ResidenciaController extends Controller
{
    // Obtener todas las residencias
    public function index()
    {
        return Residencia::all();
    }

    // Crear una nueva residencia
    public function store(Request $request)
    {
        $request->validate([
            'id_propietario' => 'required|exists:usuarios,id_usuario',
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'precio_mensual' => 'required|numeric|min:0',
            'disponibilidad' => 'required|boolean',
        ]);

        return Residencia::create($request->all());
    }

}
