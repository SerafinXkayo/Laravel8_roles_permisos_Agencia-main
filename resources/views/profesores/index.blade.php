@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Profesores</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        {{-- Mensajes de error --}}
                            @if(session('error'))
                                <div id="error-message" class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <a class="btn btn-warning" href="{{ route('profesores.create') }}" title="Crear nuevo grupo">+ Nuevo Profesor</a>
                            <div>
                                <br>
                            </div>

                            <table class="table table-striped mt-2 table_id" id="miTabla">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">Id_profesor</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Apellido Paterno</th>
                                    <th style="color:#fff;">Apellido Materno</th>
                                    <th style="color:#fff;">Acciones</th>
                                </thead>
                                <tbody>
                                    @foreach ($profesores as $profesor)
                                        <tr>
                                            <td style="display: none;">{{ $profesor->id_profesor}}</td>
                                            <td>{{ $profesor->nombre }}</td>
                                            <td>{{ $profesor->apellido_paterno }}</td>
                                            <td>{{ $profesor->apellido_materno }}</td>
                                            <td>
                                                <form action="{{ route('profesores.destroy',$profesor->id_profesor) }}" method="POST">                                        
                                                    @can('editar-grupo')
                                                        <a class="btn btn-info" href="{{ route('profesores.edit',$profesor->id_profesor) }}">Editar</a>
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
                { Id_profesor: 'Id_profesor' },
                { Nombre: 'Nombre' },
                { apellido_paterno: 'apellido_paterno' },
                { apellido_materno: 'apellido materno' },
                { Acciones: 'Acciones' },
            ],

            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
            }
        });

         // Ocultar el mensaje de error después de 5 segundos (5000 milisegundos)
         $(document).ready(function(){
            setTimeout(function(){
                $('#error-message').fadeOut('slow');
            }, 5000); // 5000 milisegundos = 5 segundos
        });
    </script>
@endsection
