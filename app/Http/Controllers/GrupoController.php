<?php

namespace App\Http\Controllers;
use App\Models\Sede;
use App\Models\Grado;
use App\Models\Grupo;
use App\Models\SedeGrado;
use App\Models\GradoGrupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    //
    public function mostrargrupos($sede_id, $grado_id){
        $grupos = Grupo::all();
        $sede_grado = SedeGrado::where('sede_id', $sede_id)
        ->where('grado_id', $grado_id)
        ->first();
        $grado = Grado::find($grado_id);
        $sede = Sede::find($sede_id);
        $grado_grupo = GradoGrupo::where('sede_grado_id',$sede_grado->id)->get();
        return view('grupos.index',compact('grupos', 'sede','sede_grado','grado_grupo','grado'));
    }

    public function guardargrupos(Request $request, $sede_grado_id){
        $sede_grado = SedeGrado::find($sede_grado_id);
        $sede_grado->grupos()->sync($request->input('grado_grupos'));
        session()->flash('status','¡Grupos Actualizados!');
        return to_route('sedes.mostrargrados',['sede' => $sede_grado->sede_id]);
    }

}
