@extends('layouts.app')

@section('content')
<head>
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

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
                                    <input type="text" name="nombre" class="form-control" value="{{ $grupo->nombre }}" placeholder="Ingrese el nombre del grupo">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="cupo">Cupo</label><span class="required text-danger">*</span>
                                    <input type="number" name="cupo" class="form-control" value="{{ $grupo->cupo }}" placeholder="Ingrese el cupo del grupo">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="salon">Salon</label><span class="required text-danger">*</span>
                                    <input type="text" name="salon" class="form-control" value="{{ $grupo->salon }}" placeholder="Ingrese el salón del grupo">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="hora_inicio">Hora de inicio</label><span class="required text-danger">*</span>
                                    <input type="text" name="hora_inicio" class="form-control" value="{{ $grupo->hora_inicio }}" data-input placeholder="Seleccione la hora de inicio">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="hora_fin">Hora de fin</label><span class="required text-danger">*</span>
                                    <input type="text" name="hora_fin" class="form-control" value="{{ $grupo->hora_fin }}" data-input placeholder="Seleccione la hora de fin">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for='profesor_id'>Profesor,</label>
                                    <select name='profesor_id' class='form-control custom-select' placeholder='Seleccione un profesor'>
                                        <option disabled value=''> Selecciona</option>
                                        @foreach(\App\Models\Profesor::get() as $profe)
                                        <option value='{{$profe->id_profesor}}' {{ $profe->id_profesor == $grupo->profesor_id ? 'selected' : '' }}> 
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
                                        <option disabled value=''> Selecciona</option>
                                        @foreach(\App\Models\Curso::get() as $curs)
                                        <option value='{{$curs->id_curso}}' {{ $curs->id_curso == $grupo->curso_id ? 'selected' : '' }}> {{$curs->nombre}}</option>
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

<script>
    flatpickr('[data-input]', {
        enableTime: true,
        enableSeconds: true,
        noCalendar: true,
        dateFormat: "H:i:S",
        time_24hr: true,
    });
</script>
@endsection
