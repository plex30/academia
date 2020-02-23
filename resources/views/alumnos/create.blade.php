@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Nuevo Alumno
@endsection
@section('contenido')
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $miError)
    <li>{{$miError}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="card bg.secondary">
    <div class="card-header">Guardar Alumno</div>
    <div class="card-body">
    <form name="crear" action="{{route('alumnos.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre" id="nom" >
            </div>
            <div class="col">
                <label for="ape" class="col-form-label">Apellidos</label>
                <input type="text" name="apellidos" class="form-control"  value="{{old('apellidos')}}"placeholder="Apellidos" id="apel" >
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="mail" class="col-form-label">Mail</label>
            <input type="mail" name="mail" class="form-control" value="{{old('mail')}}" placeholder="Mail" id="mail" >
            </div>
            <div class="col">
                <label for="logo" class="col-form-label">Logo</label>
                <input type="file" name="logo" class="form-control p-1"  id="logo" accept="image/*">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Crear" class="btn btn-success">
                <input type="reset" value="Borrar" class="btn btn-danger">
            <a href="{{route('alumnos.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
    </div>
</div>
@endsection