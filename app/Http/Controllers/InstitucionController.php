<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function index()
    {
        $instituciones = Institucion::get();
        return view('instituciones.index', ['instituciones' => $instituciones]);
    }

    public function show(Institucion $institucion)
    {
        return view('instituciones.show',['institucion'=> $institucion]);
    }

    public function create(){
        return view('instituciones.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'dane' => 'required',
        ]);
        $institucion = new Institucion;
        $institucion->nombre = $request->input('nombre');
        $institucion->dane = $request->input('dane');
        $institucion->save();
        session()->flash('status','¡Institucion Guardada!');
        return to_route('instituciones.index');
    }

    public function edit(Institucion $institucion){
        return view('instituciones.edit',['institucion'=> $institucion]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'dane' => 'required',
        ]);
        $institucion = Institucion::find($id);
        $institucion->nombre = $request->input('nombre');
        $institucion->dane = $request->input('dane');
        $institucion->save();
        session()->flash('status','¡Institución Actualizada!');
        return to_route('instituciones.index');
    }

    public function destroy($id){
        $institucion = Institucion::find($id);
        $institucion->delete();
        session()->flash('status','¡Institución Eliminada!');
        return to_route('instituciones.index');
    }
}
