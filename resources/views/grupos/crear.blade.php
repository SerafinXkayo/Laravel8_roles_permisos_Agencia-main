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
                                        {!! Form::text('nombre', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el nombre del grupo')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="cupo">Cupo</label><span class="required text-danger">*</span>
                                        {!! Form::number('cupo', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el cupo del grupo')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="salon">Salon</label><span class="required text-danger">*</span>
                                        {!! Form::text('salon', null, array('class' => 'form-control', 'placeholder' => 'Ingrese el salón del grupo')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="hora_inicio">Horario Inicio</label><span class="required text-danger">*</span>
                                        {!! Form::text('hora_inicio', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la hora de inicio por ejemplo: 08:00:00')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="hora_fin">Horario Fin</label><span class="required text-danger">*</span>
                                        {!! Form::text('hora_fin', null, array('class' => 'form-control', 'placeholder' => 'Ingrese la hora de fin por ejemplo: 09:00:00')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for='profesor_id'>Profesor,</label>
                                        <select name='profesor_id' class='form-control custom-select' placeholder='Seleccione un profesor'>
                                            <option disabled selected value=''> Selecciona</option>
                                            @foreach(\App\Models\Profesor::get() as $profe)
                                            <option value='{{$profe->id_profesor}}'> 
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
                                        <select name='curso_id' class='form-control custom-select' placeholder='Seleccione un curso'>
                                            <option disabled selected value=''> Selecciona</option>
                                            @foreach(\App\Models\Curso::get() as $curs)
                                            <option value='{{$curs->id_curso}}'> {{$curs->nombre}}</option>
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
