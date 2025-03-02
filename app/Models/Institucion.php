<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'instituciones';
    //relacion uno a muchos
    public function sedes()
    {
        return $this->hasMany('App\Models\Sede');
    }
}
