@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Modulos disponibles para el alumno {{$alumno->nombre.', '.$alumno->apellidos}}
@endsection
@section('contenido')
<form action="{{route('alumnos.matricular')}}" method="POST" name="form">
    @csrf
<input type="hidden" value="{{$alumno->id}}" name="alumno_id">
    <div class="form-row">
    <select name="modulo_id[]" class="form-control" multiple>
        @foreach ($modulos2 as $modulo)
        <option value="{{$modulo->id}}">{{$modulo->nombre.' ('.$modulo->horas.')'}}</option>    
        @endforeach
    </select>
</div>
<div class="form-row">
    <input type="submit" value="Matricular" class="btn btn-info mr-3">
    <a href="{{route('alumnos.show', $alumno)}}" class="btn btn-primary">Volver</a>
</div>
</form>
@endsection