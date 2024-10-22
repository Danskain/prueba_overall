<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('loginUser');
});

Route::get('/loginUser', function () {
    return view('loginUser');
});
Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/perfiles', [LoginController::class, 'getPerfiles']);
Route::post('/login', [LoginController::class, 'validarLogin']);
Route::get('/usuarios-por-perfil', [LoginController::class, 'listarUsuariosPorPerfil']);
Route::get('/usuarios', [LoginController::class, 'obtenerUsuarios']);
