@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Profesor</h3>
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

                            {!! Form::open(['method' => 'PATCH', 'route' => ['profesores.update', $profesor->id_profesor]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label><span class="required text-danger">*</span>
                                        <input type="text" name="nombre" class="form-control" value="{{ $profesor->nombre }}" placeholder="Ingrese el nombre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="apellido_paterno">Apellido Paterno</label><span class="required text-danger">*</span>
                                        <input type="text" name="apellido_paterno" class="form-control" value="{{ $profesor->apellido_paterno }}" placeholder="Ingrese el apellido paterno">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="apellido_materno">Apellido Materno</label><span class="required text-danger">*</span>
                                        <input type="text" name="apellido_materno" class="form-control" value="{{ $profesor->apellido_materno }}" placeholder="Ingrese el apellido materno">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <a href="{{ route('profesores.index') }}" class="btn btn-warning">Cancelar</a>
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
