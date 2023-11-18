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
        $this->middleware('permission:ver-curso|screar-cursos|editar-cursos|borrar-cursos', ['only' => ['index']]);
        $this->middleware('permission:crear-cursos', ['only' => ['create','store']]);
        $this->middleware('permission:editar-cursos', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-cursos', ['only' => ['destroy']]);
    }

    public function index()
    {
        $cursos = Curso::all();
        return view('cursos.index',compact('cursos'));
    }

    public function create()
    {
        return view('cursos.crear');
    }

    public function store(Request $request)
    {
        Curso::create($request->all());
        return redirect()->route('cursos.index');    }

    public function show($id)
    {
        // Implementar la lógica para mostrar un curso específico
    }

    public function edit(Curso $profesor)
    {
        return view('cursos.editar', compact('curso'));


    }

    public function update(Request $request, $id)
    {
        // Aquí debes implementar la lógica para actualizar un curso
    }

    public function destroy(Curso $profesor)
    {
        $curso->delete();

    return redirect()->route('cursos.index');
    }
}
