<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    // Obtener todos los favoritos
    public function index()
    {
        return Favorito::all();
    }

    // Agregar un favorito
    public function store(Request $request)
    {
        $request->validate([
            'id_estudiante' => 'required|exists:usuarios,id_usuario',
            'id_residencia' => 'required|exists:residencias,id_residencia',
        ]);

        return Favorito::create($request->all());
    }

}
