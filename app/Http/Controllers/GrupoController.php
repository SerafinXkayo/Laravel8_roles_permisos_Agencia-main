<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Agregar la importación de la clase Curso
use App\Models\Profesor; // Agregar la importación de la clase Profesor
use App\Models\Grupo; // Agregar la importación de la clase Profesor

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-grupos|crear-grupos|editar-grupos|borrar-grupos', ['only' => ['index']]);
        $this->middleware('permission:crear-grupos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-grupos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-grupos', ['only' => ['destroy']]);
    }
    public function index()
    {
        $grupos = Grupo::all();

        return view('grupos.index', compact('grupos'));
    }

    public function create()
    {
        return view('grupos.crear');
    }

    public function edit(Grupo $grupo)
    {
        return view('grupos.editar', compact('grupo'));
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'cupo' => 'required|numeric|min:1|max:40',
            'salon' => 'required',
            'hora_inicio' => 'required|date_format:H:i:s',
            'hora_fin' => 'required|date_format:H:i:s|after:hora_inicio',
            'id_profesor' => 'required|exists:profesores,id_profesor',
            'id_curso' => 'required|exists:cursos,id_curso',
        ], [
            'cupo.numeric' => 'El campo cupo debe ser un número.',
            'cupo.min' => 'El campo cupo debe ser como mínimo 1.',
            'cupo.max' => 'El campo cupo debe ser como máximo 40.',
            'hora_fin.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
            'id_profesor.required' => 'Debe seleccionar un profesor.',
            'id_curso.required' => 'Debe seleccionar un curso.',
            'id_profesor.exists' => 'El profesor seleccionado no es válido.',
            'id_curso.exists' => 'El curso seleccionado no es válido.',
        ]);
    
        Grupo::create($request->all());
    
        return redirect()->route('grupos.index');
    }
    
    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([
            'nombre' => 'required',
            'cupo' => 'required|numeric|min:1|max:40',
            'salon' => 'required',
            'hora_inicio' => 'required|date_format:H:i:s',
            'hora_fin' => 'required|date_format:H:i:s|after:hora_inicio',
            'id_profesor' => 'required|exists:profesores,id_profesor',
            'id_curso' => 'required|exists:cursos,id_curso',
        ], [
            'cupo.numeric' => 'El campo cupo debe ser un número.',
            'cupo.min' => 'El campo cupo debe ser como mínimo 1.',
            'cupo.max' => 'El campo cupo debe ser como máximo 40.',
            'hora_fin.after' => 'La hora de fin debe ser posterior a la hora de inicio.',
            'id_profesor.required' => 'Debe seleccionar un profesor.',
            'id_curso.required' => 'Debe seleccionar un curso.',
            'id_profesor.exists' => 'El profesor seleccionado no es válido.',
            'id_curso.exists' => 'El curso seleccionado no es válido.',
        ]);
    
        $grupo->update($request->all());
    
        return redirect()->route('grupos.index');
    }
    
    
    

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();

        return redirect()->route('grupos.index');
    }
}
