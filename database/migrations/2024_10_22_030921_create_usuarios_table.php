<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('ID_USUARIO');
            $table->unsignedBigInteger('ID_PERFIL');
            $table->string('TRABAJADOR');
            $table->string('USUARIO_LOGIN');
            $table->string('USUARIO_CLAVE');
            $table->timestamps();

            $table->foreign('ID_PERFIL')->references('ID_PERFIL')->on('perfiles');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
