@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Crear Modulos
@endsection
@section('contenido')
@if($errors->any)
<ul>
    @foreach ($errors->all() as $mierror)
        <li>{{$mierror}}</li>
    @endforeach
</ul>
@endif
<div class="card bg.secondary">
    <div class="card-header">Crear Modulo</div>
    <div class="card-body">
    <form name="crear" action="{{route('modulos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre" id="nomb" >
            </div>
            <div class="col">
                <label for="ape" class="col-form-label">Horas</label>
                <input type="text" name="horas" class="form-control"  value="{{old('horas')}}" placeholder="Horas" id="horas" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Crear" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('modulos.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
    </div>
</div>
@endsection
