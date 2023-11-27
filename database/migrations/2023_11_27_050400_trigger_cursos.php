<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TriggerCursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER trigger_insert_cursos
            AFTER INSERT ON cursos
            FOR EACH ROW
            INSERT INTO tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Insert", USER(), NOW())
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_update_cursos
            AFTER UPDATE ON cursos
            FOR EACH ROW
            INSERT INTO tablacambios_log (nombre_tabla, cambio, usuario_modificador, dato_modificado, campo_modificado, fecha_modificacion)
            VALUES ("Profesores", "Update", USER(), NOW())
        ');

        DB::unprepared('
            CREATE TRIGGER trigger_delete_cursos
            AFTER DELETE ON cursos
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
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_insert_cursos');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_update_cursos');
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_delete_cursos');
    }
}
//Cambios Limni