@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Gestion de Modulos
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class='alert alert-success my-3'>{{$text}}</p>
@endif
<a href="{{route('modulos.create')}}" class="btn btn-success mb-2 fa fa-floppy-o fa-2x"></a>
<form action="{{route('modulos.index')}}" method="get" class="form-inline float-right">

    <div class="form-group mr-2">
        <b class="mr-2">Buscar Modulo: </b> <input type="text" name="nombre" value="{{$request->get('nombre')}}">
        </div>
        <div class="form-group ml-2">
            <input type="submit" value="Buscar" class="btn btn-info">
        </div>
</form>
<table class="table">
      <thead class="thead-dark">
      <tr style="text-align:center">
        <th scope="col" class="align-middle">Detalles</th>
        <th scope="col" class="align-middle">Nombre</th>
        <th scope="col" class="align-middle">Horas</th>
        <th scope="col" class="align-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($modulos as $item)
        <tr style="text-align:center">
            <th scope="row">
            <a href="{{route('modulos.show', $item)}}" style="text-decoration:none"> <i class="fa fa-clipboard fa-2x"></i></a>
            </th>
            <td class="align-middle">{{$item->nombre}}</td>
            <td class="align-middle">{{$item->horas}}</td>
            <td class="align-middle">
                <form name="borrar" method="post" action="{{route('modulos.destroy', $item)}}">
                  @csrf
                  @method('DELETE')
                <a href="{{route('modulos.edit', $item)}}" class="btn btn-warning fa fa-edit fa"></a>
                <button type="submit" value="borrar" class="btn btn-danger fa fa-trash fa"onclick="return confirm('¿Borrar Modulo?')" ></button>
                </form>
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{$modulos->appends(Request::except('page'))->links()}}
@endsection
