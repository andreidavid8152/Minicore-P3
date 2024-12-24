@extends('layouts.app')

@section('title', 'Filtrar Gastos')

@section('content')
<h1>Filtrar Gastos</h1>

<!-- Formulario de Filtrado -->
<form action="{{ route('gastos.filtrar') }}" method="GET" class="mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" name="fecha_inicio" id="fecha_inicio"
                class="form-control @error('fecha_inicio') is-invalid @enderror"
                value="{{ request('fecha_inicio') }}">
            @error('fecha_inicio')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" name="fecha_fin" id="fecha_fin"
                class="form-control @error('fecha_fin') is-invalid @enderror"
                value="{{ request('fecha_fin') }}">
            @error('fecha_fin')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>

<!-- Resultados del Filtrado -->
@if (!empty($gastos))
<h2 class="mt-4">Resultados</h2>
@if ($gastos->isEmpty())
<p>No se encontraron gastos en el rango de fechas seleccionado.</p>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>Empleado</th>
            <th>Departamento</th>
            <th>Monto</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gastos as $gasto)
        <tr>
            <td>{{ $gasto->empleado->nombre }}</td>
            <td>{{ $gasto->empleado->departamento->nombre }}</td>
            <td>${{ number_format($gasto->monto, 2) }}</td>
            <td>{{ $gasto->fecha }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3 class="mt-3">Total de Gastos: ${{ number_format($total, 2) }}</h3>
@endif
@endif
@endsection