<?php
use App\Models\Asistencia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsistenciaController;

# ,'middleware' => 'auth_estudiantes'
Route::group(['prefix' => 'asistencias', 'middleware' => 'auth_docentes'], function () {
    Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
    Route::get('/show/{id}', [AsistenciaController::class, 'show'])->name('asistencias.show');
  
    Route::post('/create', [AsistenciaController::class, 'store'])->name('asistencias.store');
    Route::get('/edit/{id}', [AsistenciaController::class, 'edit'])->name('asistencias.edit');
    Route::put('/edi/{id}', [AsistenciaController::class, 'update'])->name('asistencias.update');
    Route::get('/delete/{id}', [AsistenciaController::class, 'delete'])->name('asistencias.delete');
    Route::delete('/delete/{id}', [AsistenciaController::class, 'destroy'])->name('asistencias.destroy');



});
Route::get('/create', [AsistenciaController::class, 'create'])->name('asistencias.create');