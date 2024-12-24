@extends('layouts.app')

@section('title', 'Editar Empleado')

@section('content')
    <h1>Editar Empleado</h1>
    <form action="{{ route('empleados.update', $empleado) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Empleado</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $empleado->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="departamento_id" class="form-label">Departamento</label>
            <select name="departamento_id" id="departamento_id" class="form-select" required>
                @foreach ($departamentos as $departamento)
                    <option value="{{ $departamento->id }}" {{ $empleado->departamento_id == $departamento->id ? 'selected' : '' }}>
                        {{ $departamento->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
