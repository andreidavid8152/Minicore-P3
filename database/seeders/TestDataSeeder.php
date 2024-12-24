<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;
use App\Models\Empleado;
use App\Models\Gasto;

class TestDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamento = Departamento::create(['nombre' => 'Finanzas']);
        $empleado = Empleado::create(['nombre' => 'Juan Pérez', 'departamento_id' => $departamento->id]);
        Gasto::create(['monto' => 150.50, 'empleado_id' => $empleado->id, 'fecha' => now()]);
    }
}
