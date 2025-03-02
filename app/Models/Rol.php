<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    protected $table = 'Roles';
        //relacion uno a muchos
        public function usuarios()
        {
            return $this->hasMany('App\Models\User');
        }
}
