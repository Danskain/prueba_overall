<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        DB::table('usuarios')->insert([
            ['ID_USUARIO' => 1, 'ID_PERFIL' => 1, 'TRABAJADOR' => 'JUAN PEREZ LOPEZ', 'USUARIO_LOGIN' => 'JPEREZ', 'USUARIO_CLAVE' => bcrypt('12345')],
            ['ID_USUARIO' => 2, 'ID_PERFIL' => 1, 'TRABAJADOR' => 'JOSE ROBLES JAUJO', 'USUARIO_LOGIN' => 'JROBLES', 'USUARIO_CLAVE' => bcrypt('43432')],
            ['ID_USUARIO' => 3, 'ID_PERFIL' => 2, 'TRABAJADOR' => 'MARIA ROJAS VILLAFANE', 'USUARIO_LOGIN' => 'MROJAS', 'USUARIO_CLAVE' => bcrypt('23454')],
            ['ID_USUARIO' => 4, 'ID_PERFIL' => 3, 'TRABAJADOR' => 'MIGUEL CASAS LEGUIA', 'USUARIO_LOGIN' => 'MCASAS', 'USUARIO_CLAVE' => bcrypt('98775')],
        ]);
    }
}
