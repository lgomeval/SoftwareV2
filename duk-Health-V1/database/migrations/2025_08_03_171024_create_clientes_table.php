<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nit')->unique();
            $table->string('razon_social');
            $table->string('nombre_comercial');
            $table->date('fecha_inicio_relacion_comercial');
            $table->string('actividad_economica');
            $table->string('asesor_comercial_asignado');
            $table->enum('tipo_regimen_iva', ['Responsable IVA', 'No responsable IVA']);
            $table->enum('responsabilidad_fiscal', ['Gran Contribuyente', 'Autoretenedor', 'Agente retenedor IVA', 'Regimen simple de tributacion', 'No aplica - Otros']);
            $table->string('departamento');
            $table->string('ciudad');
            $table->string('direccion');
            $table->string('telefono_contacto1');
            $table->string('telefono_contacto2');
            $table->string('email', 255)->unique();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
