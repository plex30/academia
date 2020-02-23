<?php

use Illuminate\Database\Seeder;
use App\Alumno;
use App\Modulo;
class AlumnoModuloSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Alumno::all() as $alumno){
            //elijo un numero aleatorio entre 1 y el numero de modulos de ese alumno
            $num=rand(0, Modulo::all()->count());
            for ($i=1; $i <= $num; $i++) { 
                //cojo una nota de 1 a 10 con decimales
                $nota=rand(0,9)+(1/rand(1,20));
                $alumno->modulos()->attach($i, ['nota'=>$nota]);
            }
        }
    }
}
