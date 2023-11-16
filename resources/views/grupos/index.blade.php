@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Grupos</h2>

        <div class="row mt-3">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar grupo" aria-label="Buscar grupo" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">Buscar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre del Grupo</th>
                            <th>Cupo</th>
                            <th>Salon</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Profesor</th>
                            <th>Curso</th>
                            <!-- Agregar más columnas según sea necesario -->
                        </tr>
                    </thead>         
                </table>
            </div>
        </div>
    </div>
@endsection
