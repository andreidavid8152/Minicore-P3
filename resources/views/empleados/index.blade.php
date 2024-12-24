@extends('layouts.app')

@section('title', 'Lista de Empleados')

@section('content')

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Empleados</h1>
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Empleado</a>
</div>

@if ($empleados->isEmpty())
<p>No hay empleados registrados.</p>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Departamento</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{ $empleado->nombre }}</td>
            <td>{{ $empleado->departamento->nombre }}</td>
            <td>
                <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display:inline;">
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