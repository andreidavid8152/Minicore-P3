@extends('layouts.app')

@section('title', 'Editar Gasto')

@section('content')
<h1>Editar Gasto</h1>
<form action="{{ route('gastos.update', $gasto) }}" method="POST" class="mt-4">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="monto" class="form-label">Monto</label>
        <input type="number" name="monto" id="monto" class="form-control @error('monto') is-invalid @enderror"
            min="0.01" step="0.01" value="{{ old('monto', $gasto->monto) }}" required>
        @error('monto')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="fecha" class="form-label">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control @error('fecha') is-invalid @enderror"
            value="{{ old('fecha', $gasto->fecha) }}" required>
        @error('fecha')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection