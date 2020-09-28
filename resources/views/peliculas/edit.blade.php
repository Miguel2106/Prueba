@extends('layouts.app')

@section('content')

<div class="container">

<h1>EDITAR PELICULA</h1>

<form action="{{ url('/peliculas/'.$pelicula->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
@include('peliculas.form',['Modo'=>'editar'])

</form>
</div>
@endsection