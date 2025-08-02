<?php

use Livewire\Volt\Component;
use App\Models\User;

new class extends Component {
    public $search;

    protected $listeners = ['disable'];

    public function with(): array
    {
        return [
            'users' => User::buscar($this->search)->where('estado', 'Activo')->orderBy('id', 'desc')->paginate(7),
        ];
    }

    public function disable($userId)
    {
        $validator = Validator::make(
            ['id' => $userId],
            [
                'id' => 'required|integer|exists:users,id',
            ],
        );

        if ($validator->fails()) {
            session()->flash('danger', 'ID inválido o no existente');
            return;
        }

        User::where('id', $userId)->update(['estado' => 'Inactivo']);

        return redirect()->route('usuarios.index')->with('success', 'Usuario desactivado');
    }
};
?>

<div class="px-4 sm:px-6 lg:px-8">
    <x-slot name="header">
        <h1 class="text-2xl text-center font-semibold text-gray-900 dark:text-white">
            {{ __('Lista de Usuarios Registrados.') }}
        </h1>
        <br>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
        <div>
            <a href="{{ route('usuarios.create') }}"
                class="inline-block px-3 py-1.5 bg-green-900 text-white rounded-md hover:bg-green-600 transition">
                <i class="fas fa-plus"></i> {{ __('Nuevo Usuario') }}
            </a>
        </div>

        <div class="w-full max-w-md mx-auto">
            <input wire:model.live="search"
                class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white"
                placeholder="Búsqueda por nombre o email" />
            <div wire:loading>
                <span>Buscando Usuario ......</span>
            </div>
        </div>
    </div>

    @if ($users->count() == 0)
        <div class="mt-4">
            <h5>{{ $search }}!</h5>
            <p>No se encontraron registros con los criterios de búsqueda ingresados.</p>
        </div>
    @else
        <div class="w-full mt-4 overflow-x-auto">
            <x-table :items="$users" :columns="[
                'Nombres & Apellidos',
                'Correo',
                'Contacto',
                'Cargo',
                'Rol',
                // 'Estado'
                ]" :fields="[
                fn($p) => $p->nombres . ' ' . $p->apellidos,
                'email',
                'telefono',
                'cargo',
                'role' => fn($user) => $user->roles->pluck('name')->join(', ') ?: 'Sin Rol Asignado',
                // 'estado',
            ]" :hasActions="true"
                editRoute="usuarios.edit" />
        </div>
    @endif

    <div class="mt-4">

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof Livewire !== 'undefined') {
                    Livewire.on('confirmdesactivar', function(userId) {
                        Swal.fire({
                            title: "¿Estás seguro que deseas desactivar al usuario?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonText: "Sí",
                            cancelButtonText: "Cancelar"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Livewire.dispatch('disable', {
                                    userId: userId
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
</div>
