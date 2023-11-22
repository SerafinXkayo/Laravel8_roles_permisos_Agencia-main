<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('id_grupo');
            $table->string('nombre');
            $table->integer('cupo');
            $table->string('salon');
            $table->time('horario_inicio'); // Cambiado a tipo time
            $table->time('horario_fin');    // Cambiado a tipo time

            $table->foreignId('profesor_id')->constrained('profesores', 'id_profesor');
            $table->foreignId('curso_id')->constrained('cursos', 'id_curso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
