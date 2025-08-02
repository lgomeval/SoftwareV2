<?php

use Livewire\Volt\Component;
use App\Models\Especialista;
use App\Http\Requests\EspecialistaRequest;

new class extends Component {
    public $nombres, $apellidos, $tipo_identificacion, $numero_identificacion, $genero, $fecha_de_nacimiento, $path_fotografia, $direccion_residencia, $telefono_contacto1, $telefono_contacto2, $email, $especialidad_medica, $registro_medico, $fecha_inicio_labor, $experiencia, $certificaciones;

    public function rules(): array
    {
        return (new EspecialistaRequest())->rules();
    }

    public function crearEspecialista()
    {
        $this->validate();

        Especialista::create([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'tipo_identificacion' => $this->tipo_identificacion,
            'numero_identificacion' => $this->numero_identificacion,
            'genero' => $this->genero,
            'fecha_de_nacimiento' => $this->fecha_de_nacimiento,
            'path_fotografia' => $this->path_fotografia ? $this->path_fotografia->store('fotografias', 'public') : null,
            'direccion_residencia' => $this->direccion_residencia,
            'telefono_contacto1' => $this->telefono_contacto1,
            'telefono_contacto2' => $this->telefono_contacto2,
            'email' => $this->email,
            'especialidad_medica' => $this->especialidad_medica,
            'registro_medico' => $this->registro_medico,
            'fecha_inicio_labor' => $this->fecha_inicio_labor,
            'experiencia' => $this->experiencia,
            'certificaciones' => $this->certificaciones,
        ]);

        return redirect(route('especialistas.index'))->with('success', 'Especialista creado con éxito');
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ __('Formulario de Creación de Especialistas.') }}
        </h1>
        <br>
    </x-slot>
    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='crearEspecialista' enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="nombres" label="Nombres" type="text" model="nombres" autocomplete="given-name" />

                <x-input-field name="apellidos" label="Apellidos" type="text" model="apellidos"
                    autocomplete="family-name" />

                <x-select-field name="tipo_identificacion" label="Tipo de Identificación" model="tipo_identificacion"
                    :options="[
                        '' => 'Seleccione',
                        'CC' => 'Cédula de Ciudadanía',
                        'TI' => 'Tarjeta de Identidad',
                        'CE' => 'Cédula de Extranjería',
                    ]" />

                <x-input-field name="numero_identificacion" label="Numero de Identificación" type="text"
                    model="numero_identificacion" />

                <x-select-field name="genero" label="Género" model="genero" :options="[
                    '' => 'Seleccione',
                    'masculino' => 'Masculino',
                    'femenino' => 'Femenino',
                ]" />

                <x-input-field name="fecha_de_nacimiento" label="Fecha de Nacimiento" type="date"
                    model="fecha_de_nacimiento" />

                <x-input-field name="path_fotografia" label="Fotografía" type="file" model="path_fotografia"
                    accept="image/*" />

                <x-input-field name="direccion_residencia" label="Dirección de Residencia" type="text"
                    model="direccion_residencia" />

                <x-input-field name="telefono_contacto1" label="Teléfono de Contacto 1" type="text"
                    model="telefono_contacto1" />

                <x-input-field name="telefono_contacto2" label="Teléfono de Contacto 2" type="text"
                    model="telefono_contacto2" />

                <x-input-field name="email" label="Email" type="email" model="email" />

                <x-select-field name="especialidad_medica" label="Especialidad Médica" model="especialidad_medica"
                    :options="[
                        '' => 'Seleccione',
                        'Medico Laboral' => 'Medico Laboral',
                        'Optometra' => 'Optometra',
                        'Psicologo(a)' => 'Psicologo(a)',
                        'Fonoaudiolo(a)' => 'Fonoaudiolo(a)',
                        'Aux enfermeria' => 'Aux enfermeria',
                        'Fisioterapeuta' => 'Fisioterapeuta',
                        'Nutricionista' => 'Nutricionista',
                        'Medico General' => 'Medico General',
                        'Enfermer@' => 'Enfermer@',
                        'Bacteriolog@' => 'Bacteriolog@',
                        'Jefe' => 'Jefe',
                        'Aux Laboratorio' => 'Aux Laboratorio',
                        'Aux Fisioterapia' => 'Aux Fisioterapia',
                    ]" />

                <x-input-field name="registro_medico" label="Registro Médico" model="registro_medico" />

                <x-input-field name="fecha_inicio_labor" label="Fecha de Inicio Labor" type="date"
                    model="fecha_inicio_labor" />

                <div class="col-span-2">
                    <x-input-field name="experiencia" label="Experiencia" model="experiencia"
                        placeholder="Describa su experiencia laboral aquí..." />
                </div>
                <div class="col-span-4">
                    <x-input-field name="certificaciones" label="Certificaciones" model="certificaciones"
                        placeholder="Describa sus certificaciones aquí..." />
                </div>
            </div>

            <!-- Botón -->
            <x-action-button label="Crear Especialista" variant="success" />
        </form>
    </div>
</div>
