<?php

use App\Models\GradoGrupo;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\GrupoController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas de Instituciones
Route::get('/institucion', [InstitucionController::class,'index'])->name('instituciones.index');
Route::get('/institucion/create', [InstitucionController::class,'create'])->name('instituciones.create');
Route::post('/institucion', [InstitucionController::class,'store'])->name('instituciones.store');
Route::get('/institucion/{institucion}', [InstitucionController::class,'show'])->name('instituciones.show');
Route::get('/institucion/{institucion}/edit', [InstitucionController::class,'edit'])->name('instituciones.edit');
Route::patch('/institucion/{institucion}',[InstitucionController::class,'update'])->name('instituciones.update');
Route::get('/institucion/{institucion}/delete',[InstitucionController::class,'destroy'])->name('instituciones.delete');

// Rutas de Sedes
Route::get('/sede', [SedeController::class,'index'])->name('sedes.index');
Route::get('/sede/create', [SedeController::class,'create'])->name('sedes.create');
Route::post('/sede', [SedeController::class,'store'])->name('sedes.store');
Route::get('/sede/{sede}', [SedeController::class,'show'])->name('sedes.show');
Route::get('/sede/{sede}/edit', [SedeController::class,'edit'])->name('sedes.edit');
Route::patch('/sede/{sede}',[SedeController::class,'update'])->name('sedes.update');
Route::get('/sede/{sede}/delete',[SedeController::class,'destroy'])->name('sedes.delete');
Route::get('/sede/{sede}/grados',[SedeController::class,'mostrargrados'])->name('sedes.mostrargrados');
Route::patch('/sede/{sede}/grados',[SedeController::class,'guardargrados'])->name('sedes.guardargrados');
Route::get('/sedesbyinstitucion/{institucion_id}',[SedeController::class,'sedesbyinstitucion']);
Route::get('/gradosbysede/{sede_id}',[SedeController::class,'gradosbysede']);

// Rutas de Grupos
Route::get('/grupo/{sede_id}/{grado_id}/',[GrupoController::class,'mostrargrupos'])->name('grupos.mostrargrupos');
Route::patch('/guardargrupos/{sede_grado}',[GrupoController::class,'guardargrupos'])->name('grupos.guardargrupos');
Route::get('/gruposbygrado/{sede_id}/{grado_id}',[GrupoController::class,'gruposbygrado']);

// Rutas de Estudiantes
Route::get('/estudiante', [EstudianteController::class,'index'])->name('estudiantes.index');
Route::get('/estudiante/create', [EstudianteController::class,'create'])->name('estudiantes.create');
Route::post('/estudiante', [EstudianteController::class,'store'])->name('estudiantes.store');
Route::get('/estudiante/{estudiante}', [EstudianteController::class,'show'])->name('estudiantes.show');
Route::get('/estudiante/{estudiante}/edit', [EstudianteController::class,'edit'])->name('estudiantes.edit');
Route::patch('/estudiante/{estudiante}',[EstudianteController::class,'update'])->name('estudiantes.update');
Route::get('/estudiante/{estudiante}/delete',[EstudianteController::class,'destroy'])->name('estudiantes.delete');
