<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    // Obtener todas las reservas
    public function index()
    {
        return Reserva::all();
    }

    // Crear una nueva reserva
    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:usuarios,id_usuario',
            'id_residencia' => 'required|exists:residencias,id_residencia',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            'estado' => 'required|string|max:50',
        ]);

        return Reserva::create($request->all());
    }

}
