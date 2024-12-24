<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    protected $fillable = ['monto', 'empleado_id', 'fecha'];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
