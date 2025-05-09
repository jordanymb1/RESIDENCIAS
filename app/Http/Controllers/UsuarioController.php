<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // Obtener todos los usuarios
    public function index()
    {
        return Usuario::all();
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email|unique:usuarios',
            'contraseña' => 'required|string|min:6',
            'tipo_usuario' => 'required|string',
            'telefono' => 'nullable|string',
            'fecha_registro' => 'nullable|date',
        ]);

        return Usuario::create($request->all());
    }

}
