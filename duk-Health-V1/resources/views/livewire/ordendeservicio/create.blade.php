<?php

use Livewire\Volt\Component;
use App\Models\PrestadorSalud;
use App\Models\Cliente;
use App\Models\Paciente;

new class extends Component {
    public $search;
    protected $listeners = ['disable'];

    public $clientes;
    public $prestadorServicio;
    public $opcionesPrestadores;
    public $tarifas;

    public $open = false;

    public $tipo_evaluacion;
    public $enfasis = [];
    public $medio_venta;
    public $prestador_de_salud_id;
    public $paciente_id;
    public $cliente_id;
    public $user;
    public $estado = 'Pendiente Agendar';

    public $pacientes = [];

    public $clienteSeleccionado;
    public $tarifasSeleccionadas = [];

    public function mount()
    {
        $this->clientes = Cliente::all();
        $this->prestadorServicio = PrestadorSalud::all();

        $this->opcionesPrestadores = ['' => 'Seleccione'] + $this->prestadorServicio->pluck('razon_social', 'id')->toArray();
    }

    public function updatedSearch($value)
    {
        $this->pacientes = Paciente::where(function ($query) use ($value) {
            $query->where('nombres', 'LIKE', '%' . $value . '%')->orWhere('numero_identificacion', 'LIKE', '%' . $value . '%');
        })->get();
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombres} {$this->apellidos}";
    }
}; ?>

<div>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold text-gray-900 dark:text-white text-center">
            {{ __('Formulario de Creación de Ordenes de Servicio.') }}
        </h1>
        <br>
    </x-slot>

    <div class="max-w-full mx-auto p-6 bg-white dark:bg-zinc-900 rounded-lg shadow-md">
        <form wire:submit.prevent='crearOrdenDeServicio' enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                <x-select-field name="tipo_evaluacion" label="Tipo de Evaluación" model="tipo_evaluacion"
                    :options="[
                        '' => 'Seleccione',
                        'cambio_de_ocupacion' => 'Cambio de Ocupación',
                        'egreso' => 'Egreso',
                        'pre_ingreso' => 'Pre-Ingreso',
                        'periodico' => 'Periódico',
                        'post_incapacidad' => 'Post-Incapacidad',
                        'reubicacion' => 'Reubicación',
                        'reintegro_laboral' => 'Reintegro Laboral',
                        'seguimiento' => 'Seguimiento',
                    ]" />

                <x-select-field name="medio_venta" label="Medio de Venta" model="medio_venta" :options="[
                    '' => 'Seleccione',
                    'Intramural' => 'Intramural',
                    'Telemedicina' => 'Telemedicina',
                    'Extramural' => 'Extramural',
                ]" />

                <x-select-field name="prestador_de_salud_id" label="Prestador del Servicio:"
                    model="prestador_de_salud_id" :options="$opcionesPrestadores" />

            </div>
            <hr>

            <div class="mt-6">
                <x-checkbox label="Énfasis en:" name="enfasis" model="enfasis" :options="[
                    'brigadista' => 'Brigadista',
                    'conductor' => 'Conducción de Vehículo',
                    'espacios_confinados' => 'Espacios Confinados',
                    'expo_radiaciones_ionizantes' => 'Exposición a Radiaciones Ionizantes',
                    'manipulacion_de_alimentos' => 'Manipulación de Alimentos',
                    'manipulacion_de_farmacos' => 'Manipulación Productos Farmacéuticos',
                    'trabajo_en_alturas' => 'Trabajo en Alturas',
                    'trabajo_riesgo_electrico' => 'Trabajo Riesgo Eléctrico',
                    'riesgo_covid-19' => 'Riesgo para COVID-19',
                    'cardiomuscular' => 'Cardiomuscular',
                    'dermatologico' => 'Dermatológico',
                    'pruebas_psicosensometricas' => 'Pruebas Psicosensométricas',
                    'neurologico' => 'Neurologico',
                    'riesgo_covid-19' => 'Riesgo Covid-19',
                    'sistema_fonatorio' => 'Sistema Fonatorio',
                    'no_aplica' => 'No Aplica',
                ]" />
            </div><br>
            <hr><br>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">

                <input wire:model.live="search"
                    class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-zinc-800 dark:text-white"
                    placeholder="Búsqueda por nombre o Documento" />
                <div wire:loading>
                    <span>Buscando Paciente ......</span>
                </div>

                @if ($search)
                    @if ($pacientes->isEmpty())
                        <x-action-button label="Crear Paciente" variant="success"
                            href="{{ route('pacientes.create') }}" target="_blank" />
                    @else
                        <x-select-field name="paciente_id" label="Paciente solicita:" model="paciente_id"
                            :options="$pacientes
                                ->pluck('nombre_completo', 'id')
                                ->prepend('Seleccione...', '')
                                ->toArray()" />
                    @endif
                @endif



            </div><br><br><br>

            {{-- Botón --}}
            <x-action-button label="Generar Orden de Servicio" variant="success" />
        </form>
    </div>

</div>
