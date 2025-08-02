<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EspecialistaRequest extends FormRequest
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
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'tipo_identificacion' => 'required|string|max:255',
            'numero_identificacion' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'fecha_de_nacimiento' => 'required|date',
            'path_fotografia' => 'nullable|string|max:255',
            'direccion_residencia' => 'required|string|max:255',
            'telefono_contacto1' => 'required|string|max:255|unique:especialistas,telefono_contacto1',
            'telefono_contacto2' => 'nullable|string|max:255|unique:especialistas,telefono_contacto2',
            'email' => 'required|email|max:255|unique:especialistas,email',
            'especialidad_medica' => 'required|string|max:255',
            'registro_medico' => 'required|string|max:255|unique:especialistas,registro_medico',
            'fecha_inicio_labor' => 'nullable|date',
            'experiencia' => 'required|string|max:255',
            'certificaciones' => 'nullable|string|max:255',
        ];
    }
}
