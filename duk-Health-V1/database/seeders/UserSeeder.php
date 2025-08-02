<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombres' => 'Luis Eduardo',
            'apellidos' => 'Gomez Valencia',
            'cargo' => 'Desarrollador',
            'telefono' => '3013716660',
            'email' => 'duk000@hotmail.com',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Dev');

        User::create([
            'nombres' => 'Luisa Fernanda',
            'apellidos' => 'Varela Valencia',
            'cargo' => 'Administrador',
            'telefono' => '3013716661',
            'email' => 'luisa.varela@healthsoft.com.co',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Admin');

        User::create([
            'nombres' => 'Paola',
            'apellidos' => 'Calderon',
            'cargo' => 'Administrador',
            'telefono' => '3013716662',
            'email' => 'paola.calderon@healthsoft.com.co',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Admin');

        User::create([
            'nombres' => 'Juan',
            'apellidos' => 'Lopez',
            'cargo' => 'Administrador',
            'telefono' => '3013716663',
            'email' => 'juan.lopez@healthsoft.com.co',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Admin');

        User::create([
            'nombres' => 'Johan',
            'apellidos' => 'Suaza',
            'cargo' => 'Administrador',
            'telefono' => '3013716664',
            'email' => 'johan.suaza@healthsoft.com.co',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Admin');

        User::create([
            'nombres' => 'Jenny Alejandra',
            'apellidos' => 'Gomez',
            'cargo' => 'Administrador',
            'telefono' => '3013716665',
            'email' => 'jenny.gomez@healthsoft.com.co',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Admin');

        User::create([
            'nombres' => 'Desarrollador',
            'apellidos' => 'Junior',
            'cargo' => 'Desarrollador',
            'telefono' => '3013716666',
            'email' => 'desarrollador@healthsoft.com.co',
            'password' => Hash::make('Cambiam3'),
        ])->assignRole('Cliente');
    }
}
