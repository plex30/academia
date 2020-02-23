@extends('plantillas.plantilla')
@section('titulo')
    Academia S.A.
@endsection
@section('cabecera')
    Gestion de Alumnos
@endsection
@section('contenido')
@if ($text=Session::get('mensaje'))
    <p class='alert alert-success my-3'>{{$text}}</p>
@endif
<a href="{{route('alumnos.create')}}" class="btn btn-success mb-2 fa fa-floppy-o fa-2x"></a>
<form name="form" action="{{route('alumnos.index')}}" method="get" class="form-inline float-right">
    <b>Buscar Alumnos por Modulo: </b>
    <select name="modulo_id" class="form-control mr-2 ml-2">
        <option value="%">---</option>
        @foreach ($modulos as $modulo)
            @if($modulo->id==$request->modulo_id)
                <option value="{{$modulo->id}}" selected>{{$modulo->nombre}}</option>
                @else
                <option value="{{$modulo->id}}">{{$modulo->nombre}}</option>
                @endif
        @endforeach
    </select>

<input type="submit" value="Buscar" class="btn btn-info ml-2">
</form>
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Detalles</th>
        <th scope="col" class="align-middle">Apellidos, Nombre</th>
        <th scope="col" class="aling-middle">Mail</th>
        <th scope="col" class="aling-middle">Imagen</th>
        <th scope="col" class="aling-middle">Acciones</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $item)
        <tr>
            <th scope="row">
            <a href="{{route('alumnos.show', $item)}}" style="text-decoration:none"> <i class="fa fa-clipboard fa-3x"></i></a>
            </th>
            <td class="align-middle">{{$item->apellidos.', '.$item->nombre}}</td>
            <td class="align-middle">{{$item->mail}}</td>
            <td class="align-middle"><img src="{{asset($item->logo)}}" width="80" height="80" class="img-fluid rounded-circle"></td>
            <td class="align-middle">
                <form name="borrar" method="post" action="{{route('alumnos.destroy', $item)}}">
                  @csrf
                  @method('DELETE')
                <a href="{{route('alumnos.edit', $item)}}" class="btn btn-warning fa fa-edit fa-2x"></a>
                <button type="submit" value="borrar" class="btn btn-danger fa fa-trash fa-2x"onclick="return confirm('¿Borrar Alumno?')" ></button>
                </form>
                </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  {{$alumnos->appends(Request::except('page'))->links()}}

@endsection
