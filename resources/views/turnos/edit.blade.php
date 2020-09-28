@extends('layouts.app')

@section('content')

<div class="container">

<h1>EDITAR TURNO</h1>

<form action="{{ url('/turnos/'.$turno->id) }}" method="post" enctype="multipart/form-data">
{{ csrf_field() }}
{{ method_field('PATCH') }}
@include('turnos.form',['Modo'=>'editar'])

</form>
</div>
@endsection