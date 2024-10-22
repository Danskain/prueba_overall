<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerfilSeeder extends Seeder
{
    public function run()
    {
        DB::table('perfiles')->insert([
            ['ID_PERFIL' => 1, 'PERFIL' => 'PROMOTOR'],
            ['ID_PERFIL' => 2, 'PERFIL' => 'SUPERVISOR'],
            ['ID_PERFIL' => 3, 'PERFIL' => 'ADMINISTRADOR'],
        ]);
    }
}
