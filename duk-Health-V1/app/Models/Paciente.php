<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres',
        'apellidos',
        'tipo_identificacion',
        'numero_identificacion',
        'genero',
        'fecha_de_nacimiento',
        'tipo_sangre',
        'factor_rh',
        'grupo_etnico',
        'nivel_estudio',
        'estado_civil',
        'path_fotografia',
        'departamento_residencia',
        'ciudad_residencia',
        'direccion_residencia',
        'estrato',
        'zona_residencial',
        'comuna',
        'telefono',
        'email',
        'eps',
        'arl',
        'afp',
        'cargo_a_desempenar',
        'acompanante',
        'path_firma',
        'estado',
        'observaciones',
        'paciente_id',
    ];

    public function scopeBuscar($query, $valor)
    {
        return $query->where('nombres', 'LIKE', "%$valor%")
            ->orWhere('email', 'LIKE', "%$valor%");
    }
}
