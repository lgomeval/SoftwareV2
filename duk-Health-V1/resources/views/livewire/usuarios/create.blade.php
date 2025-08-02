<?php

use Livewire\Volt\Component;
use App\Models\User;
use App\Http\Requests\UsuarioRequest;

new class extends Component {
    public $nombres, $apellidos, $telefono, $cargo, $email, $password, $password_confirmation;

    public function rules(): array
    {
        return (new UsuarioRequest())->rules();
    }

    public function createUser()
    {
        $this->validate();

        User::create([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'telefono' => $this->telefono,
            'cargo' => $this->cargo,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        return redirect(route('usuarios.index'))->with('success', 'Usuario creado con éxito');
    }
};
?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ __('Formulario de Creación de Usuarios.') }}
        </h1>
        <br>
    </x-slot>
    <div class="max-w-2xl mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='createUser' enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <x-input-field name="nombres" label="Nombres" type="text" model="nombres" autocomplete="given-name" />

                <x-input-field name="apellidos" label="Apellidos" type="text" model="apellidos"
                    autocomplete="family-name" />

                <x-input-field name="telefono" label="Teléfono" type="text" model="telefono" />

                <x-input-field name="cargo" label="Cargo" model="cargo" />

                <x-input-field name="email" label="Email" type="email" model="email" />

                <x-input-field name="password" label="Contraseña" type="password" model="password" />

                <x-input-field name="password_confirmation" label="Confirmar Contraseña" type="password"
                    model="password_confirmation" />
            </div>

            <x-action-button label="Crear Usuario" variant="success"/>
        </form>
    </div>
</div>
