<?php

use Livewire\Volt\Component;
use App\Models\Cliente;

new class extends Component {
    public $cliente;

    public $nit, $razon_social, $fecha_inicio_relacion_comercial, $nombre_comercial, $asesor_comercial_asignado, $actividad_economica, $tipo_regimen_iva, $departamento, $responsabilidad_fiscal, $ciudad, $direccion, $telefono_contacto1, $telefono_contacto2, $email, $estado;

    public function mount(Cliente $cliente)
    {
        $this->cliente = $cliente;

        foreach (['nit', 'razon_social', 'fecha_inicio_relacion_comercial', 'nombre_comercial', 'asesor_comercial_asignado', 'actividad_economica', 'tipo_regimen_iva', 'departamento', 'responsabilidad_fiscal', 'ciudad', 'direccion', 'telefono_contacto1', 'telefono_contacto2', 'email', 'estado'] as $prop) {
            if (property_exists($this, $prop)) {
                $this->$prop = $cliente->$prop;
            }
        }
    }

    public function actualizarCliente()
    {
        $this->cliente->update([
            'nit' => $this->nit,
            'razon_social' => $this->razon_social,
            'fecha_inicio_relacion_comercial' => $this->fecha_inicio_relacion_comercial,
            'nombre_comercial' => $this->nombre_comercial,
            'asesor_comercial_asignado' => $this->asesor_comercial_asignado,
            'actividad_economica' => $this->actividad_economica,
            'tipo_regimen_iva' => $this->tipo_regimen_iva,
            'departamento' => $this->departamento,
            'responsabilidad_fiscal' => $this->responsabilidad_fiscal,
            'ciudad' => $this->ciudad,
            'direccion' => $this->direccion,
            'telefono_contacto1' => $this->telefono_contacto1,
            'telefono_contacto2' => $this->telefono_contacto2,
            'email' => $this->email,
            'estado' => $this->estado,
        ]);

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado correctamente.');
    }
}; ?>

<div>
    <x-form-edit :model="$cliente" submitAction="actualizarCliente" :fields="[
        ['name' => 'nit', 'label' => 'Nit'],
        ['name' => 'razon_social', 'label' => 'Razón Social'],
        ['name' => 'nombre_comercial', 'label' => 'Nombre Comercial'],
        ['name' => 'asesor_comercial_asignado', 'label' => 'Asesor Asignado'],
        ['name' => 'fecha_inicio_relacion_comercial', 'label' => 'Inicio Relación Comercial', 'type' => 'date', 'readonly' => true],
        ['name' => 'actividad_economica', 'label' => 'Actividad Economica'],
        ['name' => 'tipo_regimen_iva', 'label' => 'Regimen IVA'],
        ['name' => 'responsabilidad_fiscal', 'label' => 'Responsabilidad Fiscal'],
        ['name' => 'departamento', 'label' => 'Departamento'],
        ['name' => 'ciudad', 'label' => 'Ciudad'],
        ['name' => 'direccion', 'label' => 'Dirección'],
        ['name' => 'telefono_contacto2', 'label' => 'Teléfono 2'],
        ['name' => 'telefono_contacto1', 'label' => 'Teléfono 1'],
        ['name' => 'email', 'label' => 'Email', 'type' => 'Correo Electrónico'],
        ['name' => 'estado', 'label' => 'Estado', 'readonly' => true],
    ]" />
</div>
