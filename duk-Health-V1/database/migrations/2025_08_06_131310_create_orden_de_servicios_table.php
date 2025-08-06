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
        Schema::create('orden_de_servicios', function (Blueprint $table) {
            $table->id();

            $table->string('orden_numero')->unique();
            $table->enum('tipo_evaluacion', ['cambio_de_ocupacion', 'egreso', 'pre_ingreso', 'periodico', 'post_incapacidad', 'reubicacion', 'reintegro_laboral', 'seguimiento']);

            $table->json('enfasis', ['brigadista', 'cardiomuscular', 'conductor', 'dermatologico', 'espacios_confinados', 'expo_radiaciones_ionizantes', 'manipulacion_de_alimentos', 'manipulacion_de_farmacos', 'neurologico', 'osteomuscular', 'osteomuscular_fisioterapia', 'pruebas_psicosensometricas', 'riesgo_covid-19', 'sistema_fonatorio', 'trabajo_en_alturas', 'trabajo_riesgo_electrico', 'no_aplica']);

            $table->enum('medio_venta', ['Intramural', 'Telemedicina', 'Extramural']);

            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes');

            $table->unsignedBigInteger('prestador_saluds_id');
            $table->foreign('prestador_saluds_id')->references('id')->on('prestador_saluds');

            $table->enum('estado', ['Pendiente Agendar', 'En Proceso', 'Finalizado']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_de_servicios');
    }
};
