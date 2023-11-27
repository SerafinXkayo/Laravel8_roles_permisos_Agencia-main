<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerGrupos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_insert_grupos
            AFTER INSERT ON grupos
            FOR EACH ROW
            INSERT INTO tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Insert", USER(), NOW())
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_update_grupos
            AFTER UPDATE ON grupos
            FOR EACH ROW
            INSERT INTO tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Update", USER(), NOW())
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_delete_grupos
            AFTER DELETE ON grupos
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
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_insert_grupos');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_update_grupos');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_delete_grupos');
    }
}
