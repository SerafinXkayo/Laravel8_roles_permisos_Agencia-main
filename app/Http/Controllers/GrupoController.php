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

    public function show($id)
    {
        //
    }

    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'cupo' => 'required',
            'salon' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        
        ]);
        Grupo::create($request->all());
        return redirect()->route('grupos.index');  
    }

    public function edit(Grupo $grupo)
    {
        
        return view('grupos.editar',compact('grupo'));
    }


    public function update(Request $request, Grupo $grupo)
    {
        request()->validate([
            'nombre' => 'required',
            'cupo' => 'required',
            'salon' => 'required',
            'hora_inicio' => 'required',
            'hora_fin' => 'required',
        
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