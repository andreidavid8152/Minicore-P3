<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $fillable = ['nombre', 'departamento_id'];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function gastos()
    {
        return $this->hasMany(Gasto::class);
    }
}
