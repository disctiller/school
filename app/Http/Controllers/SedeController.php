<?php

namespace App\Http\Controllers;
use App\Models\Sede;
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
        return view('sedes.create');
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
        $sede->dane = $request->input('institucion_id');
        $sede->save();
        session()->flash('status','¡Sede Guardada!');
        return to_route('sedes.index');
    }

    public function edit(Sede $sede){
        return view('sedes.edit',['sede'=> $sede]);
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
        $sede->dane = $request->input('institucion_id');
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
}
