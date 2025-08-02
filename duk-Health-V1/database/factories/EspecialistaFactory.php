<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Especialista>
 */
class EspecialistaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres' => $this->faker->firstName,
            'apellidos' => $this->faker->lastName,
            'tipo_identificacion' => $this->faker->randomElement(['CC', 'CE', 'TI', 'Pasaporte', 'Otro']),
            'numero_identificacion' => $this->faker->numberBetween(100000000, 999999999),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'fecha_de_nacimiento' => $this->faker->date,
            'path_fotografia' => $this->faker->imageUrl,
            'direccion_residencia' => $this->faker->address,
            'telefono_contacto1' => $this->faker->phoneNumber,
            'telefono_contacto2' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'especialidad_medica' => $this->faker->randomElement(['Medico Laboral', 'Optometra', 'Psicologo(a)', 'Fonoaudiolo(a)', 'Aux enfermeria']),
            'registro_medico' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'fecha_inicio_labor' => $this->faker->date,
            'estado' => 'activo',
            'experiencia' => $this->faker->text,
            'certificaciones' => $this->faker->text,
        ];
    }
}
