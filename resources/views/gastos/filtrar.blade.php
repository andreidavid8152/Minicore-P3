<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtrar Gastos</title>
</head>

<body>
    <h1>Filtrar Gastos</h1>
    <form action="{{ route('gastos.filtrar') }}" method="GET">
        @csrf
        <label for="fecha_inicio">Fecha Inicio:</label>
        <input type="date" name="fecha_inicio" required>
        <label for="fecha_fin">Fecha Fin:</label>
        <input type="date" name="fecha_fin" required>
        <button type="submit">Filtrar</button>
    </form>

    @if(isset($gastos))
    <h2>Resultados</h2>
    <ul>
        @foreach($gastos as $gasto)
        <li>
            Monto: ${{ $gasto->monto }} | Fecha: {{ $gasto->fecha }} |
            Empleado: {{ $gasto->empleado->nombre }} |
            Departamento: {{ $gasto->empleado->departamento->nombre }}
        </li>
        @endforeach
    </ul>
    <h3>Total Gastos: ${{ $total }}</h3>
    @endif
</body>

</html>