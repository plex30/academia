@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Academia S.A.
@endsection
@section('contenido')
    <div class="text-center mt-3">
    <a href="{{route('alumnos.index')}}" class="btn btn-primary mr-4">Gestionar Alumnos</a>
    <a href="{{route('modulos.index')}}" class="btn btn-secondary mr-4">Gestionar Modulos</a>
    </div>
@endsection