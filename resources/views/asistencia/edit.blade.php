@extends('layouts.app')

@section('content')
    <h1>Editar Asistencia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asistencias.update', $asistencia->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="codigoEstudiante">Código de Estudiante</label>
            <input type="text" class="form-control" id="codigoEstudiante" name="codigoEstudiante" value="{{ $asistencia->codigoEstudiante }}" required>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $asistencia->fecha }}" required>
        </div>
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" class="form-control" id="hora" name="hora" value="{{ $asistencia->hora }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Asistencia</button>
    </form>
@endsection