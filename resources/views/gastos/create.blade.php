@extends('layouts.app')

@section('title', 'Registrar Gasto')

@section('content')
<h1>Registrar Gasto</h1>
<form action="{{ route('gastos.store') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <label for="empleado_id" class="form-label">Empleado</label>
        <select name="empleado_id" id="empleado_id" class="form-select @error('empleado_id') is-invalid @enderror" required>
            <option value="">Seleccionar Empleado</option>
            @foreach ($empleados as $empleado)
            <option value="{{ $empleado->id }}">{{ $empleado->nombre }} - {{ $empleado->departamento->nombre }}</option>
            @endforeach
        </select>
        @error('empleado_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="monto" class="form-label">Monto</label>
        <input type="number" name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror" min="0.01" step="0.01" required>
        @error('monto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror" required>
        @error('fecha')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Registrar</button>
    <a href="{{ route('gastos.index') }}" class="btn btn-secondary">Volver</a>
</form>
@endsection