<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('prestador_saluds', function (Blueprint $table) {
            $table->id();
            $table->string('razon_social');
            $table->string('nombre_comercial');
            $table->string('nit');
            $table->string('email');
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telefono_celular');
            $table->string('telefono_fijo');
            $table->string('licencia');
            $table->timestamps();
        });

        DB::table('prestador_saluds')->insert([
            'razon_social' => 'Health Soft IPS S.A.S. Sede Sur',
            'nombre_comercial' => 'Health Soft IPS S.A.S. Sede Sur',
            'nit' => '123456789-0',
            'email' => 'servicioalclientesur@health-soft.com.co',
            'departamento' => 'Valle del Cauca',
            'ciudad' => 'Cali',
            'direccion' => 'Carrera 66 # 9 - 1 Piso 1',
            'telefono_celular' => '301 371 66 60',
            'telefono_fijo' => '602 301 37 66',
            'licencia' => 'Ministerio de Salud y Protección Social Resolución 0000000 de 2021',
        ]);

        DB::table('prestador_saluds')->insert([
            'razon_social' => 'Health Soft IPS S.A.S. Sede Norte',
            'nombre_comercial' => 'Health Soft IPS S.A.S. Sede Norte',
            'nit' => '123456789-1',
            'email' => 'servicioalclientenorte@health-soft.com.co',
            'departamento' => 'Valle del Cauca',
            'ciudad' => 'Cali',
            'direccion' => 'Calle 71 i 1 # 3N - 05 Piso 1',
            'telefono_celular' => '301 371 66 60',
            'telefono_fijo' => '602 301 37 66',
            'licencia' => 'Ministerio de Salud y Protección Social Resolución 0000000 de 2021',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestador_saluds');
    }
};
