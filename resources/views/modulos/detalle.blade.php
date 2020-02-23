@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Detalle del Modulo
@endsection
@section('contenido')
@if($text=Session::get('mensaje'))
<p class="alert alert-info my-3">{{$text}}</p>
@endif
<span class="clearfix"></span>
<div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
    <div class="card-header text-center"><b>{{($modulo->nombre)}}</b></div>
    <div class="card-body" style="font-size: 1.1em">
        <h5 class="card-title text-center">ID:{{($modulo->id)}}</h5>
        <p class="card-text">
        <p><b>Nombre:</b> {{$modulo->nombre}}</p>
        <p><b>Horas:</b> {{$modulo->horas}}</p>
        <a href="{{route('modulos.index')}}" class="mt-3 float-right btn btn-success">Volver</a>
    </div>
</div>
@endsection