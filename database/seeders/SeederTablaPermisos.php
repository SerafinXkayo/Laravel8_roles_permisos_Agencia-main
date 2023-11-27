<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

//agregamos el modelo de permisos de spatie
use Spatie\Permission\Models\Permission;

class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
            //Operaciones sobre tabla roles
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //Operacions sobre tabla blogs
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',

            //operaciones sobre tabla grupos
            'ver-grupos',
            'crear-grupos',
            'editar-grupos',
            'borrar-grupos',

            //operaciones sobre tabla usuarios
            'ver-usuarios',
            'crear-usuarios',
            'editar-usuarios',
            'borrar-usuarios',
            
            //operaciones sobre tabla cursos
            'ver-cursos',
            'crear-cursos',
            'editar-cursos',
            'borrar-cursos',

            //operaciones sobre tabla profesores
            'ver-profesores',
            'crear-profesores',
            'editar-profesores',
            'borrar-profesores',
        ];

        foreach ($permisos as $permiso) {
            Permission::create(['name' => $permiso]);
        }
    }
}
