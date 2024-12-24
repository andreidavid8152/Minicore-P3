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

// Rutas para Gasto
Route::resource('gastos', GastoController::class)->except(['show']);
Route::get('/gastos/filtrar', [GastoController::class, 'filtrar'])->name('gastos.filtrar');