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
            $table-> integer ('cupo');
            $table-> string ('salon');
            $table-> date ('hora_inicio');
            $table-> date ('hora_fin');

            $table->unsignedBigInteger('profesor_id');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('profesor_id')->references('id_profesor')->on('profesores');
            $table->foreign('curso_id')->references('id_curso')->on('cursos');

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