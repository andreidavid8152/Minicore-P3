<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Empleado;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index()
    {
        $gastos = Gasto::with('empleado.departamento')->get();
        return view('gastos.index', compact('gastos'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        return view('gastos.create', compact('empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'empleado_id' => 'required|exists:empleados,id',
            'fecha' => 'required|date',
        ]);

        Gasto::create($request->all());
        return redirect()->route('gastos.index')->with('success', 'Gasto registrado exitosamente.');
    }

    public function edit(Gasto $gasto)
    {
        return view('gastos.edit', compact('gasto'));
    }

    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'monto' => 'required|numeric|min:0.01',
            'fecha' => 'required|date',
        ]);

        $gasto->update($request->only(['monto', 'fecha']));
        return redirect()->route('gastos.index')->with('success', 'Gasto actualizado exitosamente.');
    }

    public function destroy(Gasto $gasto)
    {
        $gasto->delete();
        return redirect()->route('gastos.index')->with('success', 'Gasto eliminado exitosamente.');
    }

    public function filtrar(Request $request)
    {
        $gastos = [];
        $total = 0;

        if ($request->filled(['fecha_inicio', 'fecha_fin'])) {
            $request->validate([
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
            ]);

            $gastos = Gasto::with('empleado.departamento')
            ->whereBetween('fecha', [$request->fecha_inicio, $request->fecha_fin])
                ->get();

            $total = $gastos->sum('monto');
        }

        return view('gastos.filtrar', compact('gastos', 'total'));
    }
}
