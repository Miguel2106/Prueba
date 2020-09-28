<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
<body>
@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
    <div class="alert alert-success">
    {{  Session::get('Mensaje') }}
    </div>

@endif

<h1>Listado de Películas</h1>
<div class="boton">
<a href="{{ url('peliculas/create') }}" class="btn btn-success">Agregar Película</a> 
</div>  

<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Fecha De Publicación</th>
            <th>Estado</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($peliculas as $pelicula)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$pelicula->Nombre}}</td>
            <td>{{$pelicula->FechaDePublicacion}}</td>
            <td>{{$pelicula->Estado}}</td>
            <td>
                <img src="{{ asset('storage').'/'.$pelicula->Foto}}" class="img-thumbnail img-fluid" alt="" width="200">    
            </td>
            <td>
                <a class="btn btn-warning" href="{{ url('/peliculas/'.$pelicula->id.'/edit') }}">
                Editar
                </a> 

                <a href="{{ url('turnos/create') }}" class="btn btn-info">Asignar Turno</a>
    
                <form method="post" action="{{ url('/peliculas/'.$pelicula->id) }}" style="display:inline">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea Borrar el registro?');"> Borrar </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


</div>
@endsection

</body>
</html>
