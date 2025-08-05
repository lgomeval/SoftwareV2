<?php

use Livewire\Volt\Component;
use App\Models\Cliente;

new class extends Component {
    public $search;
    protected $listeners = ['disable'];

    public function with(): array
    {
        return [
            'clientes' => Cliente::buscar($this->search)->where('estado', 'activo')->orderBy('id', 'desc')->paginate(7),
        ];
    }

    public function disable($clienteId)
    {
        Cliente::where('id', $clienteId)->update(['estado' => 'inactivo']);

        return redirect()->route('clientes.index')->with('success', 'Cliente desactivado');
    }
}; ?>

<div class="px-4 sm:px-6 lg:px-8">
    <x-slot name="header">
        <h1 class="text-2xl text-center font-semibold text-gray-900 dark:text-white">
            {{ __('Lista de Clientes Registrados.') }}
        </h1>
        <br>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
        <div>
            <a href="{{ route('clientes.create') }}"
                class="inline-block px-3 py-1.5 bg-green-900 text-white rounded-md hover:bg-green-600 transition">
                <i class="fas fa-plus"></i> {{ __('Nuevo Cliente') }}
            </a>
        </div>

        <div class="w-full max-w-md mx-auto">
            <input wire:model.live="search"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white"
                placeholder="Búsqueda por nombre o email" />
            <div wire:loading>
                <span>Buscando Cliente ......</span>
            </div>
        </div>
    </div>

    @if ($clientes->count() == 0)
        <div class="mt-4">
            <h5>{{ $search }}!</h5>
            <p>No se encontraron registros con los criterios de búsqueda ingresados.</p>
        </div>
    @else
        <div class="w-full mt-4 overflow-x-auto">
            <x-table :items="$clientes" :columns="[
                'nit',
                // 'razon social',
                // 'inicio relacion comercial',
                'nombre comercial',
                'asesor comercial asignado',
                'actividad economica',
                // 'tipo regimen iva',
                // 'responsabilidad fiscal',
                // 'departamento',
                'ciudad',
                // 'direccion',
                'telefono_contacto1',
                // 'telefono_contacto2',
                'email',
            ]" :fields="[
                'nit',
                // 'razon_social',
                // 'fecha_inicio_relacion_comercial',
                'nombre_comercial',
                'asesor_comercial_asignado',
                'actividad_economica',
                // 'departamento',
                // 'tipo_regimen_iva',
                // 'responsabilidad_fiscal',
                'ciudad',
                // 'direccion',
                'telefono_contacto1',
                // 'telefono_contacto2',
                'email',
            ]" :hasActions="true"
                editRoute="clientes.edit" />
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Livewire !== 'undefined') {
                Livewire.on('confirmdesactivar', function(clienteId) {
                    Swal.fire({
                        title: "¿Estás seguro que deseas desactivar al Cliente?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('disable', {
                                clienteId: clienteId
                            });
                        }
                    });
                });
            } else {
                console.warn('Livewire no está definido aún. Script de confirmación omitido.');
            }
        });
    </script>

</div>
