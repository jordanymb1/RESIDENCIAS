<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Método para el registro de usuario
    public function register(Request $request)
    {
        // Validar los datos recibidos
        $request->validate([
            'nombre' => 'required|string',
            'correo' => 'required|email|unique:usuarios',  // Asegurarse que el correo sea único
            'contraseña' => 'required|string|min:6',
            'tipo_usuario' => 'required|string',
            'telefono' => 'nullable|string',
        ]);

        // Encriptar la contraseña antes de guardarla
        $request['contraseña'] = Hash::make($request['contraseña']);
        
        // Asignar automáticamente `fecha_registro` con la fecha y hora actual
        $request['fecha_registro'] = now();  // Usamos Carbon para obtener la fecha y hora actuales

        try {
            // Crear el usuario
            $usuario = Usuario::create([
                'nombre' => $request['nombre'],
                'correo' => $request['correo'],
                'contraseña' => $request['contraseña'],
                'tipo_usuario' => $request['tipo_usuario'],
                'telefono' => $request['telefono'],  // Este campo es opcional
                'fecha_registro' => $request['fecha_registro']
            ]);

            // Generar el token de Sanctum para el nuevo usuario
            $token = $usuario->createToken('TokenName')->plainTextToken;

            // Si la solicitud viene de Postman (API), responder con JSON
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Usuario registrado con éxito!',
                    'token' => $token,
                    'usuario' => $usuario
                ]);
            }

            // Si la solicitud viene del navegador, redirigir con el mensaje de éxito
            return redirect()->route('register')->with('success', 'Usuario registrado con éxito!');

        } catch (\Exception $e) {
            // En caso de error, mostrar mensaje de error
            if ($request->wantsJson()) {
                return response()->json([
                    'message' => 'Hubo un problema al registrar el usuario. Inténtalo nuevamente.',
                    'error' => $e->getMessage()
                ], 500);
            }

            // Si la solicitud viene del navegador, redirigir con el mensaje de error
            return redirect()->route('register')->with('error', 'Hubo un problema al registrar el usuario. Inténtalo nuevamente.');
        }
    }

    // Método para el login de usuario
    public function login(Request $request)
    {
        // Validar que se reciban los datos necesarios (correo y contraseña)
        $request->validate([
            'correo' => 'required|email',
            'contraseña' => 'required',
        ]);

        // Buscar al usuario con el correo proporcionado
        $usuario = Usuario::where('correo', $request->correo)->first();

        // Verificar si el usuario existe y si la contraseña es correcta
        if (!$usuario || !Hash::check($request->contraseña, $usuario->contraseña)) {
            throw ValidationException::withMessages([
                'correo' => ['Las credenciales son incorrectas'],
            ]);
        }

        // Generar el token de Sanctum
        $token = $usuario->createToken('TokenName')->plainTextToken;

        // Si la solicitud viene de Postman (API), devolver la respuesta en JSON
        return response()->json([
            'token' => $token,
            'usuario' => $usuario
        ]);
    }
}
