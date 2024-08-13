<?php

namespace App\Http\Controllers;
use App\Models\Estudiante;
use App\Models\Sede;
use App\Models\Institucion;
use App\Models\Grado;
use App\Models\SedeGrado;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    //
    public function index()
    {
        $estudiantes = Estudiante::get();
        return view('estudiantes.index', ['estudiantes' => $estudiantes]);
    }

    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show',['estudiante'=> $estudiante]);
    }

    public function create(){
        $instituciones= Institucion::all();
        return view('estudiantes.create',compact('instituciones'));
    }

    public function store(Request $request){
        //$request->validate([
          //  'nombre' => 'required',
            //'dane' => 'required',
            //'institucion_id' => 'required',
        //]);
        $estudiante = new Estudiante;
        $estudiante->estado = $request->input('estado');
        $estudiante->save();



        session()->flash('status','¡Estudiante Guardado!');
        return to_route('estudiantes.index');
    }

    public function edit(Estudiante $estudiante){
        $instituciones= Institucion::all();
        return view('estudiantes.edit',['estudiante'=> $estudiante],compact('instituciones'));
    }

    public function update(Request $request, $id){
        // $request->validate([

        $estudiante = Estudiante::find($id);
        $estudiante->tipo = $request->input('tipo');
        $estudiante->save();
        session()->flash('status','¡Estudiante Actualizado!');
        return to_route('estudiantes.index');
    }

    public function destroy($id){
        $estudiante = Estudiante::find($id);
        $estudiante->delete();
        session()->flash('status','¡Estudiante Eliminado!');
        return to_route('estudiantes.index');
    }
}
