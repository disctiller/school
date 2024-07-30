<?php

namespace App\Http\Controllers;
use App\Models\Sede;
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
        $sede = Sede::find($sede_id);
        return view('grupos.index',compact('grupos', 'sede'));
    }

}
