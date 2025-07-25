<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultaController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/consultar', [ConsultaController::class, 'consultar']);
Route::post('/consultar2', [ConsultaController::class, 'consultar2']);
