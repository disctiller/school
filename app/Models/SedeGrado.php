<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SedeGrado extends Model
{
    use HasFactory;

    protected $table = 'sede_grado';

    public function Grupos()
    {
        return $this->belongsToMany(Grupo::class,'grado_grupo');
    }
}
