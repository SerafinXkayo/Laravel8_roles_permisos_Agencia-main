@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Alta de Grupos</h3>
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

                            {!! Form::open(array('route' => 'grupos.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label><span class="required text-danger">*</span>
                                        {!! Form::text('nombre', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="cupo">Cupo</label><span class="required text-danger">*</span>
                                        {!! Form::number('cupo', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="salon">Salon</label><span class="required text-danger">*</span>
                                        {!! Form::text('salon', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="horario_inicio">Horario Inicio</label><span class="required text-danger">*</span>
                                        {!! Form::text('horario_inicio', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="horario_fin">Horario Fin</label><span class="required text-danger">*</span>
                                        {!! Form::text('horario_fin', null, array('class' => 'form-control')) !!}
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for='id_profesor'>Profesor,</label>
                                        <select name='id_profesor' class='form-control custom-select'>
                                            <option disable select value=''> Selecciona</option>
                                            @foreach(\App\Models\Profesor::get() as $profe)
                                            <option select value='{{$profe->id_profesor}}'> 
                                                {{$profe->nombre}}{{'////'}} {{$profe->apellido_paterno}}
                                                {{$profe->apellido_materno}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for='id_curso'>Curso,</label>
                                        <select name='id_curso' class='form-control custom-select'>
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
