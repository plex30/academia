@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Editar Modulo
@endsection
@section('contenido')
<div class="card bg.secondary">
    <div class="card-header">Editar Modulo</div>
    <div class="card-body">
    <form name="crear" action="{{route('modulos.update', $modulo)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="col">
                <label for="nom" class="col-form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{$modulo->nombre}}" id="nomb" required>
            </div>
            <div class="col">
                <label for="ape" class="col-form-label">Horas</label>
            <input type="text" name="horas" class="form-control"  value="{{$modulo->horas}}" id="horas" required>
            </div>
        </div>
        <div class="form-row mt-3">
            <div class="col">
                <input type="submit" value="Editar" class="btn btn-success">
            <a href="{{route('modulos.index')}}" class="btn btn-warning">Volver</a>
        </div>
    </form>
    </div>
</div>
@endsection
