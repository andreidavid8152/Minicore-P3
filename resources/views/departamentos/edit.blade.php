@extends('layouts.app')

@section('title', 'Editar Departamento')

@section('content')
<h1>Editar Departamento</h1>
<form action="{{ route('departamentos.update', $departamento) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre del Departamento</label>
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $departamento->nombre }}" required>
        @error('nombre')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection