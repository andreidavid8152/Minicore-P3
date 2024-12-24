@extends('layouts.app')

@section('title', 'Lista de Departamentos')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Departamentos</h1>
    <a href="{{ route('departamentos.create') }}" class="btn btn-primary">Crear Departamento</a>
</div>

@if ($departamentos->isEmpty())
<p>No hay departamentos registrados.</p>
@else
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($departamentos as $departamento)
        <tr>
            <td>{{ $departamento->nombre }}</td>
            <td>
                <a href="{{ route('departamentos.edit', $departamento) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('departamentos.destroy', $departamento) }}" method="POST" style="display:inline;">
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