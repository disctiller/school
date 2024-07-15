<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InstitucionController;
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


// Groups Routes
Route::get('/group', [GroupController::class,'index'])->name('groups.index');
Route::get('/group/create', [GroupController::class,'create'])->name('groups.create');
Route::post('/group', [GroupController::class,'store'])->name('groups.store');
Route::get('/group/{group}', [GroupController::class,'show'])->name('groups.show');
Route::get('/group/{group}/edit', [GroupController::class,'edit'])->name('groups.edit');
Route::patch('/group/{group}',[GroupController::class,'update'])->name('groups.update');
Route::get('/group/{group}/delete',[GroupController::class,'destroy'])->name('groups.delete');

// Grades Routes
Route::get('/grade', [GradeController::class,'index'])->name('grades.index');
Route::get('/grade/create', [GradeController::class,'create'])->name('grades.create');
Route::post('/grade', [GradeController::class,'store'])->name('grades.store');
Route::get('/grade/{grade}', [GradeController::class,'show'])->name('grades.show');
Route::get('/grade/{grade}/edit', [GradeController::class,'edit'])->name('grades.edit');
Route::patch('/grade/{grade}',[GradeController::class,'update'])->name('grades.update');
Route::get('/grade/{grade}/delete',[GradeController::class,'destroy'])->name('grades.delete');