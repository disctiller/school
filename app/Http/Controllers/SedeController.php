<?php

namespace App\Http\Controllers;
use App\Models\Sede;
use App\Models\Institucion;
use App\Models\Grado;
use App\Models\SedeGrado;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    //
    public function index()
    {
        $sedes = Sede::get();
        return view('sedes.index', ['sedes' => $sedes]);
    }

    public function show(Sede $sede)
    {
        return view('sedes.show',['sede'=> $sede]);
    }

    public function create(){
        $instituciones= Institucion::all();
        return view('sedes.create',compact('instituciones'));
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'dane' => 'required',
            'institucion_id' => 'required',
        ]);
        $sede = new Sede;
        $sede->nombre = $request->input('nombre');
        $sede->dane = $request->input('dane');
        $sede->institucion_id = $request->input('institucion_id');
        $sede->save();
        session()->flash('status','¡Sede Guardada!');
        return to_route('sedes.index');
    }

    public function edit(Sede $sede){
        $instituciones= Institucion::all();
        return view('sedes.edit',['sede'=> $sede],compact('instituciones'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'dane' => 'required',
            'institucion_id' => 'required',
        ]);
        $sede = Sede::find($id);
        $sede->nombre = $request->input('nombre');
        $sede->dane = $request->input('dane');
        $sede->institucion_id = $request->input('institucion_id');
        $sede->save();
        session()->flash('status','¡Sede Actualizada!');
        return to_route('sedes.index');
    }

    public function destroy($id){
        $sede = Sede::find($id);
        $sede->delete();
        session()->flash('status','¡Sede Eliminada!');
        return to_route('sedes.index');
    }

    public function mostrargrados($id){
        $grados = Grado::all();
        $sede = Sede::find($id);
        $sede_grado = SedeGrado::where('sede_id', $id)->get();
        return view('sedes.grados',['grados'=> $grados],compact('sede','sede_grado'));
    }

    public function guardargrados(Request $request, $id){
        $sede = Sede::find($id);
        $sede->grados()->sync($request->input('grados_sedes'));
        session()->flash('status','¡Grados Actualizados!');
        return to_route('sedes.index');
    }
}
