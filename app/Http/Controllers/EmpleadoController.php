<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;
use App\Models\Departamento;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('departamento')->get();
        return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        return view('empleados.create', compact('departamentos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:empleados,nombre',
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');
    }

    public function edit(Empleado $empleado)
    {
        $departamentos = Departamento::all();
        return view('empleados.edit', compact('empleado', 'departamentos'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:empleados,nombre,' . $empleado->id,
            'departamento_id' => 'required|exists:departamentos,id',
        ]);

        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado exitosamente.');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado exitosamente.');
    }
}
