<?php
namespace App\Http\Controllers;

use App\Models\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Asistencia::query();

        if ($request->has('codigoEstudiante')) {
            $query->where('codigoEstudiante', 'like', '%' . $request->codigoEstudiante . '%');
        }
        if ($request->has('fecha')) {
            $query->where('fecha', 'like', '%' . $request->fecha . '%');
        }
        $asistencias = $query->orderBy('id', 'desc')->simplePaginate(10);

        return view('asistencia.index', compact('asistencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('asistencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'codigoEstudiante' => 'required',
    ]);

    // Obtener la fecha y hora actuales
    $fechaActual = now()->format('Y-m-d');
    $horaActual = now()->format('H:i:s');

    Asistencia::create([
        'codigoEstudiante' => $request->codigoEstudiante,
        'fecha' => $fechaActual,
        'hora' => $horaActual,
    ]);

    return redirect()->route('asistencia.index')->with('success', 'Asistencia creada correctamente.');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencia.edit', compact('asistencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $asistencia = Asistencia::find($id);
        if (!$asistencia) {
            return abort(404);
        }

        $asistencia->fecha = $request->fecha;
        $asistencia->hora = $request->hora;
        $asistencia->codigoEstudiante = $request->codigoEstudiante;

        $asistencia->save();

        return redirect()->route('asistencias.index')->with('success', 'Asistencia actualizada correctamente.');
    }

    /**
     * Show the form for deleting the specified resource.
     */
    public function delete($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        return view('asistencia.delete', compact('asistencia'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            return abort(404);
        }

        $asistencia->delete();

        return redirect()->route('asistencia.index')->with('success', 'Asistencia eliminada correctamente.');
    }
}