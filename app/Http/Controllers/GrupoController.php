<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo; // Asegúrate de importar el modelo correcto

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-grupos|crear-grupos|editar-grupos|borrar-grupos', ['only' => ['index']]);
        $this->middleware('permission:crear-grupos', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-grupos', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-grupos', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grupos = Grupo::paginate(10);

        return view('grupos.index', compact('grupos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // No es necesario obtener todos los grupos aquí, solo necesitas devolver la vista
        return view('grupos.crear');
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
        $curso = Curso::find($id);
        $grupo = Grupo::get();
        $grupoNuevo = DB::table("grupo")->where("grupo.id_profesor",$id)
            ->pluck('grupo.id_profesor','grupo.id_profesor')
            ->all();
    
        return view('grupo.editar',compact('nombre','cupo','salon','hora_inicio', 'hora_fin'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("grupos")->where('id_grupo',$id)->delete();
        return redirect()->route('grupos.index');
    }
}