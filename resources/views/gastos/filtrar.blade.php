@extends('layouts.app')

@section('title', 'Filtrar Gastos')

@section('content')
<h1>Filtrar Gastos</h1>
<form action="{{ route('gastos.filtrar') }}" method="GET" class="mt-4">
    <div class="mb-3">
        <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
    </div>
    <div class="mb-3">
        <label for="fecha_fin" class="form-label">Fecha Fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
    </div>
    <button type="submit" class="btn btn-primary">Filtrar</button>
</form>

@if ($gastos)
<h2 class="mt-4">Resultados</h2>
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
            <td>${{ $gasto->monto }}</td>
            <td>{{ $gasto->fecha }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<h3>Total Gastos: ${{ $total }}</h3>
@endif
@endsection