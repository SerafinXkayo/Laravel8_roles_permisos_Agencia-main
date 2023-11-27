<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablaCambios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tablaCambios_log', function (Blueprint $table) {
            $table->bigIncrements('id'); // id
            $table->string('nombre_tabla'); // Nombre de la tabla
            $table->string('cambio'); // Tipo de cambio (inserción, actualización, eliminación, etc.)
            $table->string('usuario_modificador'); // Usuario que realizó la modificación
            $table->timestamp('fecha_modificacion')->useCurrent(); // Fecha y hora de la modificación 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tablaCambios_log');
    }
}
