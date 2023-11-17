<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesor; // Cambiado el namespace
//use Illuminate\Support\Facades\DB;

class ProfesorController extends Controller
{
    public function __construct(){
        $this->middleware('permission:ver-profesores|crear-profesores|editar-profesores|borrar-profesores', ['only' => ['index']]);
        $this->middleware('permission:crear-profesores', ['only' => ['create','store']]);
        $this->middleware('permission:editar-profesores', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-profesores', ['only' =>['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profesores = Profesor::all();
        return view('profesores.index',compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesores.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        Profesor::create($request->all());
        return redirect()->route('profesores.index');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

 /**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit(Profesor $profesor)
{
    return view('profesores.editar', compact('profesor'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    
}

public function destroy(Profesor $profesor)
{
    $profesor->delete();

    return redirect()->route('profesores.index');
}
}