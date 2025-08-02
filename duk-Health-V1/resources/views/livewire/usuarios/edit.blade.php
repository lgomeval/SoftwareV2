<?php

use Livewire\Volt\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

new class extends Component {
    
    public $user;
    public $roles;
    public $selectedRoles = [];

    public $nombres, $apellidos, $telefono, $email;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->selectedRoles = $this->user->roles->pluck('id')->toArray();

        $this->nombres = $user->nombres;
        $this->apellidos = $user->apellidos;
        $this->telefono = $user->telefono;
        $this->email = $user->email;
    }

    public function actualizarUsuario()
    {
        $this->validate([
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'email' => 'required|email',
        ]);

        $this->user->update([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'telefono' => $this->telefono,
            'email' => $this->email,
        ]);

        $this->user->roles()->sync($this->selectedRoles);

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

    public function render(): mixed
    {
        $this->roles = Role::all();
        return view('livewire.usuarios.edit', ['user' => $this->user]);
    }
}; ?>

<div class="max-w-3xl mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-lg space-y-6">
    <h2 class="text-2xl font-bold text-center text-zinc-800 dark:text-white">Editar Usuario</h2>
    <hr class="border-gray-300 dark:border-zinc-700">

    <form wire:submit.prevent="actualizarUsuario">
        <h3 class="text-lg font-semibold text-zinc-700 dark:text-zinc-200 mb-4">Datos Personales</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <x-input-field name="nombres" label="Nombres" type="text" model="nombres" />

            <x-input-field name="apellidos" label="Apellidos" type="text" model="apellidos" />

            <x-input-field name="telefono" label="Teléfono" type="text" model="telefono" />

            <x-input-field name="email" label="Email" type="email" model="email" />
        </div>

        <hr class="my-6 border-gray-300 dark:border-zinc-700">

        <h3 class="text-lg font-semibold text-zinc-700 dark:text-zinc-200 mb-4">Asignar Roles</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($roles as $role)
                <label class="flex items-center space-x-2 p-2 rounded hover:bg-zinc-100 dark:hover:bg-zinc-700">
                    <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded dark:bg-zinc-800 dark:border-zinc-600">
                    <span class="text-gray-800 dark:text-gray-100">
                        {{ $role->name }}
                        @if (in_array($role->id, $selectedRoles))
                            <span class="text-xs text-gray-500 dark:text-gray-400">(Asignado)</span>
                        @endif
                    </span>
                </label>
            @endforeach
        </div>

        <div class="mt-6 flex justify-between">
            <x-action-button variant="warning" label="Actualizar Usuario" />
            <x-action-button href="{{ route('usuarios.index') }}" variant="success" label="Regresar" />
        </div>
    </form>
</div>
