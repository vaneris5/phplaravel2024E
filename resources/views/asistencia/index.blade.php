@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success fade show" id="success-message" data-bs-dismiss="alert" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <h1>Lista de Asistencias</h1>

    <form action="{{ route('asistencias.index') }}" method="GET">
        @csrf
        <div class="row">
            <div class="col-sm-4">
                <input type="text" class="form-control" name="codigoEstudiante" placeholder="Código de Estudiante">
            </div>
            <div class="col-sm-4">
                <input type="date" class="form-control" name="fecha" placeholder="Fecha">
            </div>
            <div class="col-sm-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
                <a href="{{ route('asistencias.create') }}" class="btn btn-secondary">Crear Nueva Asistencia</a>
            </div>
        </div>
        <br>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Código de Estudiante</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($asistencias as $asistencia)
                <tr>
                    <td>{{ $asistencia->codigoEstudiante }}</td>
                    <td>{{ $asistencia->fecha }}</td>
                    <td>{{ $asistencia->hora }}</td>
                    <td>
                        <a href="{{ route('asistencias.edit', $asistencia->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('asistencias.show', $asistencia->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('asistencias.delete', $asistencia->id) }}" class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="col-sm-12">
            {{ $asistencias->links() }}
        </div>
    </div>
@endsection