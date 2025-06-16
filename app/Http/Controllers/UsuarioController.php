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

    // Obtener un usuario por su ID
    public function show($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    // Actualizar un usuario
    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Validar los datos recibidos para la actualización
        $request->validate([
            'nombre' => 'string',
            'correo' => 'email|unique:usuarios,correo,' . $id,
            'tipo_usuario' => 'string',
            'telefono' => 'nullable|string',
        ]);

        // Actualizar los campos proporcionados
        $usuario->update($request->only('nombre', 'correo', 'tipo_usuario', 'telefono'));

        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['error' => 'Usuario no encontrado'], 404);
        }

        // Eliminar al usuario
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
