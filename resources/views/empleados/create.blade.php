@extends('layouts.app')

@section('title', 'Crear Empleado')

@section('content')
<h1>Crear Empleado</h1>
<form action="{{ route('empleados.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Empleado</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
        @error('nombre')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="departamento_id" class="form-label">Departamento</label>
        <select name="departamento_id" id="departamento_id" class="form-select" required>
            @foreach ($departamentos as $departamento)
            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>
@endsection