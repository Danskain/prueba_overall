<?php

namespace App\Services;

use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function obtenerUsuariosPorPerfil($perfilId)
    {
        return Usuario::where('ID_PERFIL', $perfilId)->get();
    }

    public function validarCredenciales($usuarioLogin, $usuarioClave)
    {
        $usuario = Usuario::where('USUARIO_LOGIN', $usuarioLogin)->first();

        if ($usuario && Hash::check($usuarioClave, $usuario->USUARIO_CLAVE)) {
            return $usuario;
        }

        return false;
    }
}
