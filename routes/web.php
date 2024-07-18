<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitucionController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\GradeController;

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

// Groups Routes
Route::get('/group', [GroupController::class,'index'])->name('groups.index');
Route::get('/group/create', [GroupController::class,'create'])->name('groups.create');
Route::post('/group', [GroupController::class,'store'])->name('groups.store');
Route::get('/group/{group}', [GroupController::class,'show'])->name('groups.show');
Route::get('/group/{group}/edit', [GroupController::class,'edit'])->name('groups.edit');
Route::patch('/group/{group}',[GroupController::class,'update'])->name('groups.update');
Route::get('/group/{group}/delete',[GroupController::class,'destroy'])->name('groups.delete');
