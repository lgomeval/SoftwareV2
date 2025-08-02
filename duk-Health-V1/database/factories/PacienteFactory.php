<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
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
            'tipo_identificacion' => $this->faker->randomElement(['CC', 'CE', 'TI', 'Pasaporte']),
            'numero_identificacion' => $this->faker->unique()->numberBetween(100000000, 999999999),
            'genero' => $this->faker->randomElement(['Masculino', 'Femenino']),
            'fecha_de_nacimiento' => $this->faker->date,
            'tipo_sangre' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'factor_rh' => $this->faker->randomElement(['+', '-']),
            'grupo_etnico' => $this->faker->randomElement(['Mestizo', 'Afrocolombiano', 'Indígena', 'Blanco', 'Mulato', 'Palenquero', 'Raizal']),
            'nivel_estudio' => $this->faker->randomElement(['Primaria', 'Secundaria ', 'Técnico', 'Técnologo', 'Pregrado', 'Posgrado']),
            'estado_civil' => $this->faker->randomElement(['Soltero(a)', 'Casado(a)', 'Unión libre', 'Separado(a)', 'Divorciado(a)', 'Viudo(a)']),
            'path_fotografia' => $this->faker->imageUrl,
            'departamento_residencia' => 'Valle del Cauca',
            'ciudad_residencia' => $this->faker->randomElement(['Santiago de Cali', 'Buga', 'Tuluá', 'Cartago', 'Buenaventura', 'Candelaria', 'Florida', 'Pradera', 'La Victoria', 'El Cerrito', 'La Unión', 'Obando', 'Ansermanuevo', 'Bolívar', 'Caicedonia', 'Calima',  'Dagua', 'El Águila', 'El Cairo', 'El Dovio',  'Ginebra', 'Guacarí', 'Jamundí', 'La Cumbre', 'Palmira',  'Restrepo', 'Riofrío', 'Roldanillo', 'San Pedro', 'Sevilla', 'Toro', 'Trujillo', 'Ulloa', 'Versalles', 'Vijes', 'Yotoco', 'Yumbo', 'Zarzal']),
            'direccion_residencia' => $this->faker->address,
            'estrato' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6']),
            'zona_residencial' => $this->faker->randomElement(['Urbano', 'Rural']),
            'comuna' => $this->faker->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22']),
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'eps' => $this->faker->randomElement(['Famisanar', 'Sanitas', 'Sura', 'Coomeva', 'Compensar', 'Aliansalud', 'Salud Total', ' Nueva EPS', 'Medimás', 'Cruz Blanca', 'No tiene', 'No recuerda' ]),
            'arl' => $this->faker->randomElement(['Positiva', 'Colmena', 'Liberty', 'Bolívar', 'Suramericana', 'MAPFRE', 'No tiene', 'No recuerda']),
            'afp' => $this->faker->randomElement(['Porvenir', 'Protección', 'Colfondos', 'Skandia', 'No tiene', 'No recuerda']),
            'acompanante' => $this->faker->firstName,
            'cargo_a_desempenar' => $this->faker->jobTitle(),
            'path_firma' => '',
            'estado' => 'activo',
        ];
    }
}
