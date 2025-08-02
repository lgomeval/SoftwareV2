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
        Schema::create('especialistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->enum('tipo_identificacion', ['CC', 'CE', 'TI', 'Pasaporte', 'Otro']);
            $table->integer('numero_identificacion')->unique();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->date('fecha_de_nacimiento');
            $table->string('path_fotografia', 2048)->nullable();
            $table->string('direccion_residencia', 255);
            $table->string('telefono_contacto1');
            $table->String('telefono_contacto2')->nullable();
            $table->string('email', 255)->unique();
            $table->enum('especialidad_medica', ['Medico Laboral', 'Optometra', 'Psicologo(a)', 'Fonoaudiolo(a)', 'Aux enfermeria', 'Fisioterapeuta', 'Nutricionista', 'Medico General', 'Enfermer@ Jefe', 'Bacteriolog@', 'Aux Laboratorio', 'Aux Fisioterapia']);
            $table->string('registro_medico', 255)->unique();
            $table->string('path_firma', 2048)->nullable();
            $table->date('fecha_inicio_labor');
            $table->text('experiencia')->nullable();
            $table->text('certificaciones')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialistas');
    }
};
