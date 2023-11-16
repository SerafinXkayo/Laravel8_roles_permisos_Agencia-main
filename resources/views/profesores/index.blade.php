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
                
                            @can('crear-profesor')
                                <a class="btn btn-warning" href="{{ route('profesores.create') }}">Nuevo</a>
                            @endcan
            
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombres</th>
                                    <th style="color:#fff;">Apellido Paterno</th>                                    
                                    <th style="color:#fff;">Apellido Materno</th>
                                    <th style="color:#fff;">Acciones</th>                                                                   
                                </thead>
                                <tbody>
                                @foreach ($profesores as $profesor)
    <tr>
        <td style="display: none;">{{ $profesor->id }}</td>                                
        <td>{{ $profesor->nombres }}</td>
        <td>{{ $profesor->apellido_paterno }}</td>
        <td>{{ $profesor->apellido_materno }}</td>
        <td>
            <form action="{{ route('profesores.destroy', $profesor->id) }}" method="POST">                                        
                @can('editar-profesor')
                    <a class="btn btn-info" href="{{ route('profesores.edit', $profesor->id) }}">Editar</a>
                @endcan

                @csrf
                @method('DELETE')
                @can('borrar-profesor')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                @endcan
            </form>
        </td>
    </tr>
@endforeach
                                </tbody>
                            </table>

                            <!-- Ubicamos la paginacion a la derecha -->
                            <div class="pagination justify-content-end">
                                {!! $profesores->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
