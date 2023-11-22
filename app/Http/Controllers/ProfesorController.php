<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor; // Cambiado el namespace
//use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-profesores|crear-profesores|editar-profesores|borrar-profesores', ['only' => ['index']]);
        $this->middleware('permission:crear-profesores', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-profesores', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-profesores', ['only' => ['destroy']]);
    }

    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index', compact('profesores'));
    }

    public function create()
    {
        return view('profesores.crear');
    }

    public function store(Request $request)
    {
        Profesor::create($request->all());
        return redirect()->route('profesores.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $profesor = Profesor::find($id);
        return view('profesores.editar', compact('profesor'));
    }

    public function update(Request $request,$id)
    {
        $profesor = Profesor::find($id);
        // Validar los campos del formulario
        $request->validate([
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',
        ]);
        // Actualizar el profesor con los datos del formulario
        $profesor->update($request->all());

        // Redireccionar a la vista de profesores
        return redirect()->route('profesores.index');
    }

    public function destroy( $id)
    {
        $profesor = Profesor::find($id);
        $profesor->delete();

        return redirect()->route('profesores.index');
    }
}
