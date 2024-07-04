@extends('layouts.app')

@section('content')
    <h1>Detalles de la Asistencia</h1>

    <div class="card">
        <div class="card-header">
            Asistencia de {{ $asistencia->codigoEstudiante }}
        </div>
        <div class="card-body">
            <p><strong>Código de Estudiante:</strong> {{ $asistencia->codigoEstudiante }}</p>
            <p><strong>Fecha:</strong> {{ $asistencia->fecha }}</p>
            <p><strong>Hora:</strong> {{ $asistencia->hora }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('asistencias.index') }}" class="btn btn-secondary">Volver a la lista</a>
        </div>
    </div>
@endsection