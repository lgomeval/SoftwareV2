<?php

use Livewire\Volt\Component;
use App\Models\Paciente;
use App\Http\Requests\PacienteRequest;

new class extends Component {
    public $nombres, $apellidos, $tipo_identificacion, $numero_identificacion, $genero, $fecha_de_nacimiento, $tipo_sangre, $factor_rh, $grupo_etnico, $nivel_estudio, $estado_civil, $path_fotografia, $departamento_residencia, $ciudad_residencia, $direccion_residencia, $estrato, $zona_residencial, $comuna, $telefono, $email, $eps, $arl, $afp, $cargo_a_desempenar, $acompanante, $path_firma, $estado, $observaciones;

    public function rules(): array
    {
        return (new PacienteRequest())->rules();
    }

    public function crearPaciente()
    {
        $this->validate();

        Paciente::create([
            'nombres' => $this->nombres,
            'apellidos' => $this->apellidos,
            'tipo_identificacion' => $this->tipo_identificacion,
            'numero_identificacion' => $this->numero_identificacion,
            'genero' => $this->genero,
            'fecha_de_nacimiento' => $this->fecha_de_nacimiento,
            'tipo_sangre' => $this->tipo_sangre,
            'factor_rh' => $this->factor_rh,
            'grupo_etnico' => $this->grupo_etnico,
            'nivel_estudio' => $this->nivel_estudio,
            'estado_civil' => $this->estado_civil,
            'path_fotografia' => $this->path_fotografia ? $this->path_fotografia->store('fotografias', 'public') : null,
            'departamento_residencia' => $this->departamento_residencia,
            'ciudad_residencia' => $this->ciudad_residencia,
            'direccion_residencia' => $this->direccion_residencia,
            'estrato' => $this->estrato,
            'zona_residencial' => $this->zona_residencial,
            'comuna' => $this->comuna,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'eps' => $this->eps,
            'arl' => $this->arl,
            'afp' => $this->afp,
            'cargo_a_desempenar' => $this->cargo_a_desempenar,
            'acompanante' => $this->acompanante,
            // 'path_firma' => $this->path_firma ? $this->path_firma->store('firmas', 'public') : null,
            'estado' => 'activo',
        ]);

        return redirect(route('pacientes.index'))->with('success', 'Paciente creado con éxito');
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ __('Formulario de Creación de Pacientes.') }}
        </h1>
        <br>
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='crearPaciente' enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="nombres" label="Nombres" model="nombres" />

                <x-input-field name="apellidos" label="Apellidos" model="apellidos" />

                <x-select-field name="tipo_identificacion" label="Tipo Identificación" model="tipo_identificacion"
                    :options="[
                        '' => 'Seleccione',
                        'CC' => 'CC',
                        'CE' => 'CE',
                        'TI' => 'TI',
                        'Pasaporte' => 'Pasaporte',
                    ]" />

                <x-input-field name="numero_identificacion" label="Numero de Identificación"
                    model="numero_identificacion" />
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="genero" label="Género" model="genero" :options="[
                    '' => 'Seleccione',
                    'masculino' => 'Masculino',
                    'femenino' => 'Femenino',
                ]" />

                <x-input-field name="fecha_de_nacimiento" label="Fecha de Nacimiento" type="date"
                    model="fecha_de_nacimiento" />

                <x-select-field name="tipo_sangre" label="Tipo de Sangre" model="tipo_sangre" :options="[
                    '' => 'Seleccione',
                    'A' => 'A',
                    'B' => 'B',
                    'AB' => 'AB',
                    'O' => 'O',
                ]" />

                <x-select-field name="factor_rh" label="Factor RH" model="factor_rh" :options="[
                    '' => 'Seleccione',
                    '+' => '+',
                    '-' => '-',
                ]" />


            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="grupo_etnico" label="Grupo Etnico" model="grupo_etnico" :options="[
                    '' => 'Seleccione',
                    'Mestizo' => 'Mestizo',
                    'Afrocolombiano' => 'Afrocolombiano',
                    'Indígena' => 'Indígena',
                    'Blanco' => 'Blanco',
                    'Mulato' => 'Mulato',
                    'Palenquero' => 'Palenquero',
                    'Raizal' => 'Raizal',
                ]" />

                <x-select-field name="nivel_estudio" label="Nivel Estudio" model="nivel_estudio" :options="[
                    '' => 'Seleccione',
                    'Primaria' => 'Primaria',
                    'Secundaria' => 'Secundaria',
                    'Técnico' => 'Técnico',
                    'Técnologo' => 'Técnologo',
                    'Pregrado' => 'Pregrado',
                    'Posgrado' => 'Posgrado',
                ]" />

                <x-select-field name="estado_civil" label="Estado Civil" model="estado_civil" :options="[
                    '' => 'Seleccione',
                    'Soltero(a)' => 'Soltero(a)',
                    'Casado(a)' => 'Casado(a)',
                    'Unión libre' => 'Unión libre',
                    'Separado(a)' => 'Separado(a)',
                    'Divorciado(a)' => 'Divorciado(a)',
                    'Viudo(a)' => 'Viudo(a)',
                ]" />

                <x-input-field name=" path_fotografia
                " label="path_fotografia"
                    model="path_fotografia" />

            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="departamento_residencia" label="Departamento" model="departamento_residencia" />

                <x-input-field name="ciudad_residencia" label="Ciudad" model="ciudad_residencia" />

                <x-input-field name="direccion_residencia" label="Dirección" model="direccion_residencia" />

                <x-select-field name="estrato" label="Estrato" model="estrato" :options="[
                    '' => 'Seleccione',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                ]" />

            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="zona_residencial" label="Zona Residencial" model="zona_residencial"
                    :options="[
                        '' => 'Seleccione',
                        'Urbano' => 'Urbano',
                        'Rural' => 'Rural',
                    ]" />

                <x-select-field name="comuna" label="Comuna" model="comuna" :options="[
                    '' => 'Seleccione',
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                    '4' => '4',
                    '5' => '5',
                    '6' => '6',
                    '7' => '7',
                    '8' => '8',
                    '9' => '9',
                    '10' => '10',
                    '11' => '11',
                    '12' => '12',
                    '13' => '13',
                    '14' => '14',
                    '15' => '15',
                    '16' => '16',
                    '17' => '17',
                    '18' => '18',
                    '19' => '19',
                    '20' => '20',
                    '21' => '21',
                    '22' => '22',
                ]" />

                <x-input-field name="telefono" label="Teléfono" model="telefono" />

                <x-input-field name="email" label="Email" type="email" model="email" />

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-select-field name="eps" label="EPS" model="eps" :options="[
                    '' => 'Seleccione',
                    'Aliansalud' => 'Aliansalud',
                    'Cruz Blanca' => 'Cruz Blanca',
                    'Coomeva' => 'Coomeva',
                    'Compensar' => 'Compensar',
                    'Famisanar' => 'Famisanar',
                    'Medimás' => 'Medimás',
                    'Nueva EPS' => 'Nueva EPS',
                    'Sanitas' => 'Sanitas',
                    'Sura' => 'Sura',
                    'Salud Total' => 'Salud Total',
                    'No tiene' => 'No tiene',
                    'No recuerda' => 'No recuerda',
                ]" />

                <x-select-field name="arl" label="ARL" model="arl" :options="[
                    '' => 'Seleccione',
                    'Bolívar' => 'Bolívar',
                    'Colmena' => 'Colmena',
                    'Liberty' => 'Liberty',
                    'Positiva' => 'Positiva',
                    'Suramericana' => 'Suramericana',
                    'MAPFRE' => 'MAPFRE',
                    'No tiene' => 'No tiene',
                    'No recuerda' => 'No recuerda',
                ]" />

                <x-select-field name="afp" label="AFP" model="afp" :options="[
                    '' => 'Seleccione',
                    'Porvenir' => 'Porvenir',
                    'Protección' => 'Protección',
                    'Colfondos' => 'Colfondos',
                    'Skandia' => 'Skandia',
                    'No tiene' => 'No tiene',
                    'No recuerda' => 'No recuerda',
                ]" />

                <x-input-field name="cargo_a_desempenar" label="Cargo a Desempeñar" model="cargo_a_desempenar" />
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">

                <x-input-field name="acompanante" label="Acompañante" model="acompanante" />

                <x-input-field name="path_firma" label="Firma" model="path_firma" />

            </div>

            <!-- Botón -->
            <x-action-button label="Crear Paciente" variant="success" />
        </form>
    </div>
</div>
