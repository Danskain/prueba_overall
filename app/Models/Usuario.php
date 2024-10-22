<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $primaryKey = 'ID_USUARIO';

    public function perfil()
    {
        return $this->belongsTo(Perfil::class, 'ID_PERFIL', 'ID_PERFIL');
    }
}
