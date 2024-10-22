<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Services\LoginService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    protected $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function getPerfiles()
    {
        $perfiles = \App\Models\Perfil::all();
        return response()->json($perfiles);
    }

    public function listarUsuariosPorPerfil(Request $request)
    {
        $usuarios = $this->loginService->obtenerUsuariosPorPerfil($request->perfilId);
        return response()->json($usuarios);
    }

    public function validarLogin(Request $request)
    {
        $usuario = $this->loginService->validarCredenciales($request->usuarioLogin, $request->usuarioClave);

        if ($usuario) {
            return response()->json(['status' => 'success', 'usuario' => $usuario]);
        }

        return response()->json(['status' => 'error', 'message' => 'Credenciales incorrectas']);
    }

    public function obtenerUsuarios()
    {
        $usuarios = Usuario::with('perfil')->get(); // Incluye la relación con la tabla perfil
        return response()->json($usuarios);
    }
}
