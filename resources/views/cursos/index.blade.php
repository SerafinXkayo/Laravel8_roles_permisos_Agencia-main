@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Cursos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <a class="btn btn-warning" href="{{ route('cursos.create') }}" title="Crear nuevo curso">+ Nuevo curso</a>
                            <div>
                                <br>
                            </div>

                            <table class="table table-striped mt-2 table_id" id="miTabla">
                                <thead style="background-color:#6777ef">
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Duracion</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($cursos as $curso)
                                        <tr>
                                            <td style="display: none;">{{ $curso->id_curso }}</td>
                                            <td>{{ $curso->nombre }}</td>
                                            <td>{{ $curso->descripcion }}</td>
                                            <td>{{ $curso->duracion }}</td>
                                            <td>
                                            <form action="{{ route('cursos.destroy',$curso->id_curso) }}" method="POST">                                        
                                        @can('editar-blog')
                                        <a class="btn btn-info" href="{{ route('cursos.edit',$curso->id_curso) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-curso')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                                                
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
                { Descripcion: 'Descripcion' },
                { Duracion: 'Duracion' },
                { Acciones: 'Acciones' },
            ],

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });
    </script>
@endsection