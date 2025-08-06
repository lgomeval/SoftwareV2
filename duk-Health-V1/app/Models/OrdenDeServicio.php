<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenDeServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'orden_numero',
        'tipo_evaluacion',
        'enfasis',
        'medio_venta',
        'paciente_id',
        'cliente_id',
        'prestador_de_salud_id',
        'estado'
    ];
}
