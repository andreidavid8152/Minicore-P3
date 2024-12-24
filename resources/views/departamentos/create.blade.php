@extends('layouts.app')

@section('title', 'Crear Departamento')

@section('content')
<h1>Crear Departamento</h1>
<form action="{{ route('departamentos.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Departamento</label>
        <input type="text" name="nombre" id="nombre" class="form-control" required>
        @error('nombre')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="{{ route('departamentos.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection