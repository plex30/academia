<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $fillable=["nombre", "horas"];

    //Métodos para la relación con Alumnos

    public function alumnos(){
        return $this->belongsToMany("App\Alumno")->withPivot("nota")->withTimestamps();;
    }

    public function scopenombreModulo($query, $v){
            $query->where('nombre', 'like',"%$v%");


    }
}
