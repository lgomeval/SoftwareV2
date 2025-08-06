<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrestadorSalud extends Model
{
    use HasFactory;

    protected $fillable = [
        'razon_social',
        'nombre_comercial',
        'nit',
        'email',
        'departamento',
        'ciudad',
        'direccion',
        'telefono_celular',
        'telefono_fijo',
        'licencia',
    ];
}
