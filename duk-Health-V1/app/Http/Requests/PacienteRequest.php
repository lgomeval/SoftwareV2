<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombres'=> 'required|string|max:255',
            'apellidos'=> 'required|string|max:255',
            'tipo_identificacion' => 'required|string|max:255',
            'numero_identificacion' => 'required|string|max:255',
            'genero'=> 'required|string|max:255',
            'fecha_de_nacimiento'=> 'required|date',
            'tipo_sangre'=> 'required|string|max:255',
            'factor_rh'=> 'required|string|max:255',
            'grupo_etnico'=> 'required|string|max:255',
            'nivel_estudio'=> 'required|string|max:255',
            'estado_civil'=> 'required|string|max:255',
            'path_fotografia'=> 'nullable',
            'departamento_residencia'=> 'required|string|max:255',
            'ciudad_residencia'=> 'required|string|max:255',
            'direccion_residencia'=> 'required|string|max:255',
            'estrato'=> 'required|string|max:255',
            'zona_residencial'=> 'nullable',
            'comuna'=> 'nullable',
            'telefono'=> 'required|string|max:255|unique:pacientes,telefono',
            'email'=> 'required|email|max:255|unique:pacientes,email',
            'eps'=> 'required|string|max:255',
            'arl'=> 'required|string|max:255',
            'afp'=> 'required|string|max:255',
            'cargo_a_desempenar'=> 'required|string|max:255',
            'acompanante'=> 'required|string|max:255',
            'path_firma'=> 'nullable',
            'observaciones'=> 'nullable',
        ];
    }
}
