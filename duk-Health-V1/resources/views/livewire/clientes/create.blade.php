<?php

use Livewire\Volt\Component;
use App\Models\Cliente;
use App\Http\Requests\ClienteRequest;

new class extends Component {
    public $nit, $razon_social, $fecha_inicio_relacion_comercial, $nombre_comercial, $asesor_comercial_asignado, $actividad_economica, $tipo_regimen_iva, $departamento, $responsabilidad_fiscal, $ciudad, $direccion, $telefono_contacto1, $telefono_contacto2, $email;

    public function rules(): array
    {
        return (new ClienteRequest())->rules();
    }

    public function crearCliente()
    {
        $this->validate();

        Cliente::create([
            'nit' => $this->nit,
            'razon_social' => $this->razon_social,
            'fecha_inicio_relacion_comercial' => $this->fecha_inicio_relacion_comercial,
            'nombre_comercial' => $this->nombre_comercial,
            'asesor_comercial_asignado' => $this->asesor_comercial_asignado,
            'tipo_regimen_iva' => $this->tipo_regimen_iva,
            'actividad_economica' => $this->actividad_economica,
            'responsabilidad_fiscal' => $this->responsabilidad_fiscal,
            'departamento' => $this->departamento,
            'ciudad' => $this->ciudad,
            'direccion' => $this->direccion,
            'telefono_contacto1' => $this->telefono_contacto1,
            'telefono_contacto2' => $this->telefono_contacto2,
            'email' => $this->email,
        ]);

        return redirect(route('clientes.index'))->with('success', 'Cliente creado con éxito');
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ __('Formulario de Creación de Clientes.') }}
        </h1>
        <br>
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='crearCliente' enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="nit" label="NIT" type="text" model="nit" />

                <x-input-field name="razon_social" label="Razón Social" type="text" model="razon_social" />

                <x-input-field name="nombre_comercial" label="Nombre Comercial" type="text"
                    model="nombre_comercial" />

                <x-input-field name="fecha_inicio_relacion_comercial" label="Inicio Relación Comercial" type="date"
                    model="fecha_inicio_relacion_comercial" />
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="actividad_economica" label="Actividad Economica" model="actividad_economica" />

                <x-input-field name="asesor_comercial_asignado" label="Asesor Comercial Asignado"
                    model="asesor_comercial_asignado" />

                <x-select-field name="tipo_regimen_iva" label="Regimen IVA" model="tipo_regimen_iva"
                    :options="[
                        '' => 'Seleccione',
                        'Responsable IVA' => 'Responsable IVA',
                        'No responsable IVA' => 'No responsable IVA',
                    ]" />

                <x-select-field name="responsabilidad_fiscal" label="Responsabilidad Fiscal" type="text"
                    model="responsabilidad_fiscal" :options="[
                        '' => 'Seleccione',
                        'Gran Contribuyente' => 'Gran Contribuyente',
                        'Autoretenedor' => 'Autoretenedor',
                        'Agente retenedor IVA' => 'Agente retenedor IVA',
                        'Regimen simple de tributacion' => 'Regimen simple de tributacion',
                        'No aplica - Otros' => 'No aplica - Otros',
                    ]" />



            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name=" departamento
                " label="Departamento" model="departamento" />

                <x-input-field name="ciudad" label="Ciudad" model="ciudad" />

                <x-input-field name="direccion" label="Dirección" model="direccion" />

                <x-input-field name="telefono_contacto1" label="Teléfono" type="text" model="telefono_contacto1" />

            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="email" label="Email" type="email" model="email" />

                <x-input-field name="telefono_contacto2" label="Teléfono 2" type="text" model="telefono_contacto2" />

            </div>

            <!-- Botón -->
            <x-action-button label="Crear Cliente" variant="success" />
        </form>
    </div>
</div>
