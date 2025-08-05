<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
            'nit' => 'required|string|max:255|unique:clientes',
            'razon_social' => 'required|string|max:255',
            'nombre_comercial' => 'required|string|max:255',
            'fecha_inicio_relacion_comercial' => 'nullable',
            'actividad_economica' => 'required|string|max:255',
            'asesor_comercial_asignado' => 'required|string|max:255',
            'tipo_regimen_iva' => 'required|string|max:255',
            'responsabilidad_fiscal' => 'required|string|max:255',
            'departamento' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono_contacto1' => 'required|string|max:255|unique:clientes,telefono_contacto1',
            'telefono_contacto2' => 'nullable|string|max:255|unique:clientes,telefono_contacto2',
            'email' => 'required|email|max:255|unique:especialistas,email',
        ];
    }
}
