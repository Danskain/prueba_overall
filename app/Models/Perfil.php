<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfiles';
    protected $primaryKey = 'ID_PERFIL';

    public function usuarios()
    {
        return $this->hasMany(Usuario::class, 'ID_PERFIL', 'ID_PERFIL');
    }
}