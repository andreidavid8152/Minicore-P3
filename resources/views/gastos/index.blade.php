@extends('layouts.app')

@section('title', 'Lista de Gastos')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Gastos</h1>
    <a href="{{ route('gastos.create') }}" class="btn btn-primary">Registrar Gasto</a>
</div>

@if ($gastos->isEmpty())
<p>No hay gastos registrados.</p>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>Empleado</th>
            <th>Departamento</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($gastos as $gasto)
        <tr>
            <td>{{ $gasto->empleado->nombre }}</td>
            <td>{{ $gasto->empleado->departamento->nombre }}</td>
            <td>${{ $gasto->monto }}</td>
            <td>{{ $gasto->fecha }}</td>
            <td>
                <a href="{{ route('gastos.edit', $gasto) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('gastos.destroy', $gasto) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection