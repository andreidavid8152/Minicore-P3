<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function filtrarGastos(Request $request)
    {
        $request->validate([
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $gastos = Gasto::with('empleado.departamento')
        ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
            ->get();

        $total = $gastos->sum('monto');

        return view('gastos.filtrar', compact('gastos', 'total'));
    }
}
