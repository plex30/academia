@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Calificacion del Alumno {{$alumno->nombre.', '.$alumno->apellidos}}
@endsection
@section('contenido')
<form name="calificar" action="{{route('alumnos.calificar')}}" method="post">
    @csrf
<input type="hidden" name="id_al" value="{{$alumno->id}}">
    @foreach ($alumno->modulos as $modulo)
<label for="{{$modulo->id}}" class="col-sm-1 col_form-label text-primary text-weight-bold">{{$modulo->nombre}}</label>
<div class="col-sm-2">
<input type="number" id="{{$modulo->id}}" name="modulos[{{$modulo->id}}]" class="form-control" value="{{$modulo->pivot->nota}}" max="10" min="0" 
step="0.01" maxlength="4">
</div>
    @endforeach
    <div class="mt-3 form-group row">
        <input type="submit" value="Calificar" class="btn btn-warning  ml-4 mr-2">
    <a href="{{route('alumnos.show', $alumno)}}" class="btn btn-danger">Volver</a>
    </div>
    
</form>
@endsection