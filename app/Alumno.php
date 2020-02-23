<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Modulo;
class Alumno extends Model
{
    protected $fillable =["nombre", "apellidos", "mail", "logo"];

    public function modulos(){
       return  $this->belongsToMany("App\Modulo")->withPivot("nota")->withTimestamps();

    }

    public function modulosOut(){
        $modulos1=$this->modulos()->pluck('modulos.id');
        //esto me devuelve los modulos que no esta matriculado el alumno
        $modulos2=Modulo::whereNotIn('id', $modulos1)->get();
        return $modulos2;
    }

    public function notaMedia(){
        $suma=0;
        $total=$this->modulos->count();
        if ($total>0) {
            foreach ($this->modulos as $modulo) {
               $nota=$modulo->pivot->nota;
               if($nota)$suma+=$nota;
            }
            return round(($suma/$total),2);
        }
        return "Sin modulos";
    }

    public static function aprobados(){ //Para usar un metodo estatico se usa nombre de la clase :: y nombre del metodo
        foreach (Alumno::all() as $alumno) {
            if ($alumno->notaMedia()>=5) {
                $idAlumnos[]=$alumno->id;
            }
        }
        return Alumno::whereIn('id', $idAlumnos)->get();
    }

    public function scopeModulosAlumno($query, $v){
        if (!isset($v)) {
            return $query->where('id', 'like', '%');
        }
        if($v=='%'){
            return $query->where('id', 'like', $v);
        }
        return $query->whereHas('modulos', function($query) use ($v){
            $query->where('modulo_id', $v);
        });
    }
}
