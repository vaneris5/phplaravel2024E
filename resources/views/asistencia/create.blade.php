@extends('layouts.app')

@section('content')
    <h1>Registrar Asistencia</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asistencias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="codigoEstudiante">Código de Estudiante</label>
            <input type="text" class="form-control" id="codigoEstudiante" name="codigoEstudiante" required>
        </div>
     <br>
        <button type="submit" class="btn btn-primary">Guardar Asistencia</button>
    </form>
@endsection
