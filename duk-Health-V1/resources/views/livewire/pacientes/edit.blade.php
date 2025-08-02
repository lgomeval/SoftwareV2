<?php

use Livewire\Volt\Component;
use App\Models\Paciente;

new class extends Component {
    public $paciente;

    public $nombres, $apellidos, $tipo_identificacion, $numero_identificacion, $genero, $fecha_de_nacimiento, $tipo_sangre, $factor_rh, $grupo_etnico, $nivel_estudio, $estado_civil, $path_fotografia, $departamento_residencia, $ciudad_residencia, $direccion_residencia, $estrato, $zona_residencial, $comuna, $telefono, $email, $eps, $arl, $afp, $cargo_a_desempenar, $acompanante, $path_firma, $estado;

    // Antes de aplicar esta sintaxis de codigo en los demas componentes, se debe hacer pruebas

    public function mount(Paciente $paciente)
    {
        $this->paciente = $paciente;

        foreach (['nombres', 'apellidos', 'tipo_identificacion', 'numero_identificacion', 'genero', 'fecha_de_nacimiento', 'tipo_sangre', 'factor_rh', 'grupo_etnico', 'nivel_estudio', 'estado_civil', 'path_fotografia', 'departamento_residencia', 'ciudad_residencia', 'direccion_residencia', 'estrato', 'zona_residencial', 'comuna', 'telefono', 'email', 'eps', 'arl', 'afp', 'cargo_a_desempenar', 'acompanante', 'path_firma', 'estado'] as $prop) {
            if (property_exists($this, $prop)) {
                $this->$prop = $paciente->$prop;
            }
        }
    }

    public function actualizarPaciente()
    {
        $this->paciente->update([
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
            'path_fotografia' => $this->path_fotografia,
            'departamento_residencia' => $this->departamento_residencia,
            'ciudad_residencia' => $this->ciudad_residencia,
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
            'path_firma' => $this->path_firma,
            'estado' => $this->estado
        ]);

        return redirect()->route('pacientes.index')->with('success', 'Paciente actualizado correctamente.');
    }
}; ?>

<div>
    <x-form-edit :model="$paciente" submitAction="actualizarPaciente" :fields="[
        ['name' => 'nombres', 'label' => 'Nombres'],
        ['name' => 'apellidos', 'label' => 'Apellidos'],
        ['name' => 'tipo_identificacion', 'label' => 'Tipo de Identificación'],
        ['name' => 'numero_identificacion', 'label' => 'Número de Identificación'],
        ['name' => 'genero', 'label' => 'Género'],
        ['name' => 'fecha_de_nacimiento', 'label' => 'Fecha de Nacimiento', 'type' => 'date'],
        ['name' => 'tipo_sangre', 'label' => 'Tipo de Sangre'],
        ['name' => 'factor_rh', 'label' => 'Factor RH'],
        ['name' => 'grupo_etnico', 'label' => 'Grupo Etnico'],
        ['name' => 'nivel_estudio', 'label' => 'Nivel Estudio'],
        ['name' => 'estado_civil', 'label' => 'Estado Civil'],
        ['name' => 'path_fotografia', 'label' => 'Path Fotografia'],
        ['name' => 'departamento_residencia', 'label' => 'Departamento Residencia'],
        ['name' => 'ciudad_residencia', 'label' => 'Ciudad de Residencia'],
        ['name' => 'direccion_residencia', 'label' => 'Dirección'],
        ['name' => 'estrato', 'label' => 'Estrato'],
        ['name' => 'zona_residencial', 'label' => 'Zona Residencial'],
        ['name' => 'comuna', 'label' => 'Comuna'],
        ['name' => 'telefono', 'label' => 'Teléfono'],
        ['name' => 'email', 'label' => 'Email', 'type' => 'email'],
        ['name' => 'eps', 'label' => 'EPS'],
        ['name' => 'arl', 'label' => 'ARL'],
        ['name' => 'afp', 'label' => 'AFP'],
        ['name' => 'cargo_a_desempenar', 'label' => 'Cargo a Desempeñar'],
        ['name' => 'acompanante', 'label' => 'Acompañante'],
        ['name' => 'path_firma', 'label' => 'Path Firma'],
        ['name' => 'estado', 'label' => 'Estado', 'readonly' => true],
    ]" />
</div>
