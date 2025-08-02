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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 50);
            $table->string('apellidos', 50);
            $table->enum('tipo_identificacion', ['CC', 'CE', 'TI', 'Pasaporte']);
            $table->string('numero_identificacion', 10)->unique();
            $table->enum('genero', ['Masculino', 'Femenino']);
            $table->date('fecha_de_nacimiento');
            $table->enum('tipo_sangre', ['A', 'B', 'AB', 'O']);
            $table->enum('factor_rh', ['+', '-']);
            $table->enum('grupo_etnico', ['Mestizo', 'Afrocolombiano', 'Indígena', 'Blanco', 'Mulato', 'Palenquero', 'Raizal']);
            $table->enum('nivel_estudio', ['Primaria', 'Secundaria ', 'Técnico', 'Técnologo', 'Pregrado', 'Posgrado']);
            $table->enum('estado_civil', ['Soltero(a)', 'Casado(a)', 'Unión libre', 'Separado(a)', 'Divorciado(a)', 'Viudo(a)']);
            $table->string('path_fotografia', 2048)->nullable();
            $table->string('departamento_residencia', 100);
            $table->string('ciudad_residencia', 100);
            $table->string('direccion_residencia', 255);
            $table->enum('estrato',['1', '2','3','4','5','6']);
            $table->enum('zona_residencial', ['Urbano', 'Rural']);
            $table->enum('comuna', ['1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22'])->nullable();
            $table->string('telefono', 20);
            $table->string('email', 255)->unique();
            $table->enum('eps',['Famisanar', 'Sanitas', 'Sura', 'Coomeva', 'Compensar','Aliansalud','Salud Total',' Nueva EPS', 'Medimás', 'Cruz Blanca', 'No tiene', 'No recuerda' ]);
            $table->enum('arl',['Positiva', 'Colmena', 'Liberty', 'Bolívar', 'Suramericana','MAPFRE', 'No tiene', 'No recuerda']);
            $table->enum('afp',['Porvenir', 'Protección', 'Colfondos', 'Skandia', 'No tiene', 'No recuerda']);
            $table->string('acompanante', 255)->nullable();
            $table->string('path_firma', 2048)->nullable();
            $table->string('cargo_a_desempenar', 255)->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
