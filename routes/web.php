<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Departamento
Route::resource('departamentos', DepartamentoController::class);

// Rutas para Empleado
Route::resource('empleados', EmpleadoController::class);

Route::get('/gastos', [GastoController::class, 'filtrarGastos'])->name('gastos');