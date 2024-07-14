<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function institucion()
    {
        return $this->belongsTo('App\Models\Institucion');
    }
}
