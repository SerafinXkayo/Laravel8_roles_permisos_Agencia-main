<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso; // Agregar la importación de la clase Curso
use App\Models\Profesore; // Agregar la importación de la clase Profesor
use App\Models\Grupo; // Agregar la importación de la clase Profesor
use Illuminate\Support\Facades\DB;

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
        $profesores = Profesore::all(); // Ajusta esto según tu lógica de obtención de profesores
        $cursos = Curso::all(); // Ajusta esto según tu lógica de obtención de cursos
    
        return view('grupos.crear', compact('profesores', 'cursos'));
    }

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        Grupo::create($request->all());
        return redirect()->route('grupos.index');  
    }

    public function edit($id)
    {
        $profesor = Profesore::find($id);
        $curso = Curso::find($id);
        $grupo = Grupo::get();
        $grupoNuevo = DB::table("grupo")->where("grupo.id_profesor",$id)
            ->pluck('grupo.id_profesor','grupo.id_profesor')
            ->all();
    
        return view('grupo.editar',compact('nombre','cupo','salon','hora_inicio', 'hora_fin'));
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        DB::table("grupos")->where('id_grupo',$id)->delete();
        return redirect()->route('grupos.index');
    }
}