<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Agregar la importación de la clase Curso
use App\Models\Profesor; // Agregar la importación de la clase Profesor
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-curso|crear-curso|editar-curso|borrar-curso', ['only' => ['index']]);
        $this->middleware('permission:crear-curso', ['only' => ['create','store']]);
        $this->middleware('permission:editar-curso', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-curso', ['only' => ['destroy']]);
    }

    public function index()
    {
        $cursos = Curso::paginate(10);
        return view('cursos.index', compact('cursos'));
    }

    public function create()
    {
        $cursos = Curso::all();
        return view('cursos.crear', compact('cursos'));
    }

    public function store(Request $request)
    {
        // Aquí debes implementar la lógica para almacenar un nuevo curso
    }

    public function show($id)
    {
        // Implementar la lógica para mostrar un curso específico
    }

    public function edit($id)
    {
        $curso = Curso::find($id);
        // Ajustar las siguientes líneas según tus necesidades
        $nombre = $curso->nombre;
        $descripcion = $curso->descripcion;
        $duracion = $curso->duracion;

        return view('cursos.editar', compact('nombre', 'descripcion', 'duracion'));
    }

    public function update(Request $request, $id)
    {
        // Aquí debes implementar la lógica para actualizar un curso
    }

    public function destroy(Request $request, $id)
    {
        $this->validate($request, [
            'nombre' => 'required',
            // 'apellidos' => 'required',
        ]);

        $curso = Curso::find($id);
        $curso->nombre = $request->input('nombre');
        $curso->save();

        // Aquí debes implementar la lógica para sincronizar permisos (si es necesario)

        return redirect()->route('cursos.index');
    }
}
