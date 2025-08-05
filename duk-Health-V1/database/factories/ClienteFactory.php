<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nit'=> $this->faker->numberBetween(10000000, 99999999),
            'razon_social'=> $this->faker->company(),
            'fecha_inicio_relacion_comercial'=> $this->faker->date(),
            'nombre_comercial'=> $this->faker->company(),
            'asesor_comercial_asignado'=> $this->faker->name(),
            'actividad_economica'=> $this->faker->randomElement(['Comercio', 'Servicios', 'Industria', 'Contrucción', 'Telecomunicaciones']),
            'tipo_regimen_iva'=> $this->faker->randomElement(['Responsable IVA', 'No responsable IVA']),
            'departamento'=> $this->faker->randomElement([ 'Amazonas', 'Antioquia', 'Arauca', 'Atlántico', 'Bolívar', 'Boyacá', 'Caldas', 'Caquetá', 'Casanare', 'Cauca', 'Cesar', 'Chocó',
            'Córdoba', 'Cundinamarca', 'Guainía', 'Guaviare', 'Huila', 'La Guajira', 'Magdalena', 'Meta', 'Nariño', 'Norte de Santander', 'Putumayo', 'Quindío', 'Risaralda', 'San Andrés y Providencia', 'Santander', 'Sucre', 'Tolima', 'Valle del Cauca', 'Vaupés', 'Vichada']),
            'responsabilidad_fiscal'=> $this->faker->randomElement(['Gran Contribuyente', 'Autoretenedor', 'Agente retenedor IVA', 'Regimen simple de tributacion', 'No aplica - Otros']),
            'ciudad'=> $this->faker->randomElement(['Bogotá', 'Medellin', 'Cali']),
            'direccion'=> $this->faker->address(),
            'telefono_contacto1'=> $this->faker->phoneNumber,
            'telefono_contacto2'=> $this->faker->phoneNumber,
            'email'=> $this->faker->unique()->safeEmail,
        ];
    }
}
