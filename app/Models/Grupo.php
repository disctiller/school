<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    public function Grado()
    {
        return $this->belongsToMany(SedeGrado::class,'grado_grupo');
    }
}
