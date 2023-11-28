<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Agregar la importación de la clase Curso
use Illuminate\Support\Facades\Validator;

class CursoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-cursos|screar-cursos|editar-cursos|borrar-cursos', ['only' => ['index']]);
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
    { //nombre, descripción, duracion
        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'descripcion' => 'required',
            'duracion' => 'required|numeric',
        ]);
    
        Curso::create($request->all());
        return redirect()->route('cursos.index');
    }

    public function show($id)
    {
        // Implementar la lógica para mostrar un curso específico
    }

    public function edit(Curso $curso)
    {
        return view('cursos.editar', compact('curso'));
    }

    public function update(Request $request, Curso $curso)
    {
        $request->validate([
            'nombre' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'descripcion' => 'required',
            'duracion' => 'required|numeric',
        ]);
    
        $curso->update($request->all());
    
        return redirect()->route('cursos.index');
    }
    public function destroy($id)
    {
        $curso=Curso::find($id);
        if($curso->grupos->isNotEmpty()){
            return redirect()->route('cursos.index')
            ->with('error','No puedes eliminar un curso, pues este ya tiene un grupo creado');

        }

        $curso->delete();
    return redirect()->route('cursos.index');
    }
}