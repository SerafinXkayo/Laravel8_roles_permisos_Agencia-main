<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Profesor;
use Illuminate\Support\Facades\DB;

class CursoController extends Controller
{

    function _construct(){
        $this->middleware('permission:ver-curso|crear-curso|editar-curso|borrar-curso', ['only' => ['index']]);
        $this->middleware('permission:crear-curso', ['only' => ['create','store']]);
        $this->middleware('permission:editar-curso', ['only' => ['edit','update']]);
        $this->middleware('permission:borrar-curso', ['only' => ['destroy']]);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::paginate(10);
        return view('cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $curso = Curso::get();
        return view('cursos.crear',compact('cursos'));
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
        $cursos = Profesor::find($id);
        $rolePermissions = DB::table("nombre")->where("nombre.id_Curso",$id)
            //->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('cursos.editar',compact('nombre','descripcion','duracion'));
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
        $this->validate($request, [
            'nombre' => 'required',
           // 'apellidos' => 'required',
        ]);

        $curso = Curso::find($id);
        $curso->name = $request->input('nombre');
        $curso->save();
    
        $curso->syncPermissions($request->input('permission'));
    
        return redirect()->route('cursos.index');  
    
    }
}
