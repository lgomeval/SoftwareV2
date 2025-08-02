<?php

use Livewire\Volt\Component;
use App\Models\Especialista;

new class extends Component {
    public $search;
    protected $listeners = ['disable'];

    public function with(): array
    {
        return [
            'especialistas' => Especialista::buscar($this->search)->where('estado', 'activo')->orderBy('id', 'desc')->paginate(7),
        ];
    }

    public function disable($especialistaId)
    {
        $especialista = Especialista::find($especialistaId);

        if ($especialista->estado === 'inactivo') {
            return redirect()->route('especialistas.index')->with('danger', 'Este especialista ya estaba inactivo.');
        }

        Especialista::where('id', $especialistaId)->update(['estado' => 'inactivo']);

        return redirect()->route('especialistas.index')->with('success', 'Especialistas desactivado');
    }
}; ?>

<div class="px-4 sm:px-6 lg:px-8">
    <x-slot name="header">
        <h1 class="text-2xl text-center font-semibold text-gray-900 dark:text-white">
            {{ __('Lista de Especialistas Registrados.') }}
        </h1>
        <br>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
        <div>
            <a href="{{ route('especialistas.create') }}"
                class="inline-block px-3 py-1.5 bg-green-900 text-white rounded-md hover:bg-green-600 transition">
                <i class="fas fa-plus"></i> {{ __('Nuevo Especialista') }}
            </a>
        </div>

        <div class="w-full max-w-md mx-auto">
            <input wire:model.live="search"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white"
                placeholder="Búsqueda por nombre o email" />
            <div wire:loading>
                <span>Buscando Especialista ......</span>
            </div>
        </div>
    </div>

    @if ($especialistas->count() == 0)
        <div class="mt-4">
            <h5>{{ $search }}!</h5>
            <p>No se encontraron registros con los criterios de búsqueda ingresados.</p>
        </div>
    @else
        <div class="w-full mt-4 overflow-x-auto">
            <x-table :items="$especialistas" :columns="[
                'Nombres & Apellidos',
                'Tipo & Numero Documento',
                'Genero',
                // 'Fecha de Nacimiento',
                // 'Fotografía',
                // 'Dirección de Residencia',
                'Telefono Contacto',
                // 'Telefono Contacto 2',
                'Correo Electronico',
                'Especialidad médica',
                // 'Registro Médico',
                // 'Fecha Inicio labor',
                // 'Experiencia Laboral',
                // 'Certificaciones',
                // 'Estado',
            ]" :fields="[
                fn($p) => $p->nombres . ' ' . $p->apellidos,
                fn($p) => $p->tipo_identificacion . ' # ' . $p->numero_identificacion,
                'genero',
                // 'fecha_de_nacimiento',
                // 'path_fotografia',
                // 'direccion_residencia',
                'telefono_contacto1',
                // 'telefono_contacto2',
                'email',
                'especialidad_medica',
                // 'registro_medico',
                // 'fecha_inicio_labor',
                // 'experiencia',
                // 'certificaciones',
                // 'estado',
            ]" :hasActions="true"
                editRoute="especialistas.edit" />
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof Livewire !== 'undefined') {
                Livewire.on('confirmdesactivar', function(especialistaId) {
                    Swal.fire({
                        title: "¿Estás seguro que deseas desactivar al Especialista?",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonText: "Sí",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            Livewire.dispatch('disable', {
                                especialistaId: especialistaId
                            });
                        }
                    });
                });
            }
        });
    </script>

</div>
