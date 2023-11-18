@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Grupos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a class="btn btn-warning" href="{{ route('grupos.create') }}" title="Crear nuevo grupo">+ Nuevo grupo</a>
                            <div>
                                <br>
                            </div>

                            <table class="table table-striped mt-2 table_id" id="miTabla">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Cupo</th>
                                    <th style="color:#fff;">Salon</th>
                                    <th style="color:#fff;">Horario Inicio</th>
                                    <th style="color:#fff;">Horario Fin</th>
                                    <th style="color:#fff;">Profesor</th>
                                    <th style="color:#fff;">Curso</th>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td style="display: none;">{{ $grupo->id_grupo }}</td>
                                            <td>{{ $grupo->nombre }}</td>
                                            <td>{{ $grupo->cupo }}</td>
                                            <td>{{ $grupo->salon }}</td>
                                            <td>{{ $grupo->horario_inicio }}</td>
                                            <td>{{ $grupo->horario_fin }}</td>
                                            <td>{{ $grupo->profesor->nombreCompleto() }}</td>
                                            <td>{{ $grupo->curso->nombre }}</td>
                                            <td>
                                                <form action="{{ route('grupos.destroy',$grupo->id_grupo) }}" method="POST">                                        
                                                    @can('editar-grupo')
                                                        <a class="btn btn-info" href="{{ route('grupos.edit',$grupo->id_grupo) }}">Editar</a>
                                                    @endcan

                                                    @csrf
                                                    @method('DELETE')
                                                    @can('borrar-grupo')
                                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Centramos la paginación a la derecha -->
                            <div class="pagination justify-content-end">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JQUERY -->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <!-- DATATABLES -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- BOOTSTRAP -->
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        new DataTable('#miTabla', {
            lengthMenu: [
                [2, 5, 10],
                [2, 5, 10]
            ],

            columns: [
                { Id: 'Id' },
                { Nombre: 'Nombre' },
                { Cupo: 'Cupo' },
                { Salon: 'Salon' },
                { HorarioInicio: 'Horario Inicio' },
                { HorarioFin: 'Horario Fin' },
                { Profesor: 'Profesor' },
                { Curso: 'Curso' },
            ],

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });
    </script>
@endsection
