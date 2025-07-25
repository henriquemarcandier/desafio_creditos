<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

Route::get('/', function () {
    return view('consulta');
});

Route::get('/consulta', function () {
    return view('consulta');
});

Route::get('/consultas', [ConsultaController::class, 'listarConsultas']);
