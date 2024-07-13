<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::get();
        return view('grades.index', ['grades' => $grades]);
    }

    public function show(Grade $grade)
    {
        return view('grades.show',['grade'=> $grade]);
    }

    public function create(){
        return view('grades.create');
    }

    public function store(Request $request){
        $request->validate([
            'numero' => 'required',
            'nombre' => 'required',
        ]);
        $grade = new Grade;
        $grade->numero = $request->input('numero');
        $grade->nombre = $request->input('nombre');
        $grade->save();
        session()->flash('status','¡Grado Guardado!');
        return to_route('grades.index');
    }

    public function edit(Grade $grade){
        return view('grades.edit',['grade'=> $grade]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'numero' => 'required',
            'nombre' => 'required',
        ]);
        $grade = Grade::find($id);
        $grade->numero = $request->input('numero');
        $grade->nombre = $request->input('nombre');
        $grade->save();
        session()->flash('status','¡Grado Actualizado!');
        return to_route('grades.index');
    }

    public function destroy($id){
        $grade = Grade::find($id);
        $grade->delete();
        session()->flash('status','¡Grado Eliminado!');
        return to_route('grades.index');
    }
}
