@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Grupo</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <label class="text-danger">Los campos con * son obligatorios</label>
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            {!! Form::model($grupo, ['method' => 'PATCH','route' => ['grupos.update', $grupo->id_grupo]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label><span class="required text-danger">*</span>
                                        <input type="text" name="nombre" class="form-control" value="{{ $grupo->nombre }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="cupo">Cupo</label><span class="required text-danger">*</span>
                                        <input type="text" name="cupo" class="form-control" value="{{ $grupo->cupo }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="salon">Salon</label><span class="required text-danger">*</span>
                                        <input type="text" name="salon" class="form-control" value="{{ $grupo->salon }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="hora_inicio">Hora de inicio</label><span class="required text-danger">*</span>
                                        <input type="text" name="hora_inicio" class="form-control" value="{{ $grupo->hora_inicio }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="hora_fin">Hora de fin</label><span class="required text-danger">*</span>
                                        <input type="text" name="hora_fin" class="form-control" value="{{ $grupo->hora_fin }}">
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for='profesor_id'>Profesor,</label>
                                        <select name='profesor_id' class='form-control custom-select'>
                                            <option disable select value=''> Selecciona</option>
                                            @foreach(\App\Models\Profesor::get() as $profe)
                                            <option select value='{{$profe->id_profesor}}'> 
                                                {{$profe->nombre}} {{$profe->apellido_paterno}} 
                                                    {{$profe->apellido_materno}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for='curso_id'>Curso,</label>
                                        <select name='curso_id' class='form-control custom-select'>
                                            <option disable select value=''> Selecciona</option>
                                            @foreach(\App\Models\Curso::get() as $curs)
                                            <option select value='{{$curs->id_curso}}'> {{$curs->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('grupos.index') }}" class="btn btn-warning">Cancelar</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection