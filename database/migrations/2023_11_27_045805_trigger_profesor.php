<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerProfesor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_insert_profesor
            AFTER INSERT ON profesores
            FOR EACH ROW
            INSERT INTO tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Insert", USER(), NOW())
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_update_profesor
            AFTER UPDATE ON profesores
            FOR EACH ROW
            INSERT INTO tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Update", USER(), NOW())
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_delete_profesor
            AFTER DELETE ON profesores
            FOR EACH ROW
            INSERT tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Delete", USER(), NOW())
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Esto sirve solamente para eliminar trigger en caso de que ya existan.
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_insert_profesor');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_update_profesor');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_delete_profesor');
    }
}
//Cambios Limni