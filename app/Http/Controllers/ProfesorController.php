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
        $profesores = Profesor::paginate(10);
        return view('profesores.index',compact('profesores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $profesores = Profesor::get();
        return view('profesores.crear',compact('profesores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
public function edit($id)
{
    $profesor = Profesor::find($id);
    $rolePermissions = DB::table("profesores")->where("profesores.id_profesor", $id)
        ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
        ->all();

    return view('profesores.editar', compact('profesor', 'rolePermissions'));
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
    $this->validate($request, [
        'nombre' => 'required',
    ]);

    $profesor = Profesor::find($id);
    $profesor->nombre = $request->input('nombre');
    $profesor->save();

    // Asumo que $request->input('permission') es un array de permisos, 
    // si es diferente, ajusta esta línea según tus necesidades.
    $profesor->syncPermissions($request->input('permission'));

    return redirect()->route('profesores.index');
}
}