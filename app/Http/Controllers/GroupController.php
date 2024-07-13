<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::get();
        return view('groups.index', ['groups' => $groups]);
    }

    public function show(Group $group)
    {
        return view('groups.show',['group'=> $group]);
    }

    public function create(){
        return view('groups.create');
    }

    public function store(Request $request){
        $request->validate([
            'nombre' => 'required',
            'id_grado' => 'required',
        ]);
        $group = new Group;
        $group->nombre = $request->input('nombre');
        $group->id_grado = $request->input('id_grado');
        $group->save();
        session()->flash('status','¡Grupo Guardado!');
        return to_route('groups.index');
    }

    public function edit(Group $group){
        return view('groups.edit',['group'=> $group]);
    }

    public function update(Request $request, $id){
        $request->validate([
            'nombre' => 'required',
            'id_grado' => 'required',
        ]);
        $group = Group::find($id);
        $group->nombre = $request->input('nombre');
        $group->id_grado = $request->input('id_grado');
        $group->save();
        session()->flash('status','¡Grupo Actualizado!');
        return to_route('groups.index');
    }

    public function destroy($id){
        $group = Group::find($id);
        $group->delete();
        session()->flash('status','¡Grupo Eliminado!');
        return to_route('groups.index');
    }
}