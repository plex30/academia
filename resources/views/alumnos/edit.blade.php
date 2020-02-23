@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Editar Alumno
@endsection
@section('contenido')

<div class="card bg.secondary">
    <div class="card-header">Editar Alumno</div>
    <div class="float-left ml-3">
        <img src="{{asset($alumno->logo)}}" width="80px" height='80px' class="rounded-circle">
    </div>
    <div class="card-body">
    <form name="crear" action="{{route('alumnos.update', $alumno)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$alumno->nombre}}" id="nom" required>
            </div>
            <div class="col">
                <label for="ape" class="col-form-label">Apellidos</label>
            <input type="text" name="apellidos" class="form-control"  value="{{$alumno->apellidos}}" id="apel" required>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <label for="mail" class="col-form-label">Mail</label>
            <input type="mail" name="mail" class="form-control" value="{{$alumno->mail}}" id="mail" required>
            </div>
            <div class="col">
                <label for="logo" class="col-form-label">Logo</label>
                
                <input type="file" name="logo" class="form-control p-1"  id="logo" accept="image/*">
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Editar" class="btn btn-success">
            <a href="{{route('alumnos.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
    </div>
</div>
@endsection