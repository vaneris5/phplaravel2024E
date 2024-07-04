@extends('layouts.app')

@section('content')
    <h1>Eliminar Asistencia</h1>

    <div class="alert alert-warning">
        <p>¿Estás seguro de que deseas eliminar la asistencia del estudiante <strong>{{ $asistencia->codigoEstudiante }}</strong> registrada el <strong>{{ $asistencia->fecha }}</strong> a las <strong>{{ $asistencia->hora }}</strong>?</p>
    </div>

    <form action="{{ route('asistencias.destroy', $asistencia->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection