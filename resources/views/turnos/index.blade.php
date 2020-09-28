@extends('layouts.app')

@section('content')

<div class="container">

@if(Session::has('Mensaje'))
    <div class="alert alert-success">
    {{  Session::get('Mensaje') }}
    </div>

@endif

<h1>Listado De Horarios</h1>
<br/>

<a href="{{ url('turnos/create') }}" class="btn btn-success">Agregar Turno</a>   
<br/>
<br/>
<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Turno</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($turnos as $turno)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$turno->Turno}}</td>
            <td>{{$turno->Estado}}</td>
            <td>
                <a class="btn btn-warning" href="{{ url('/turnos/'.$turno->id.'/edit') }}">
                Editar
                </a> 
    
                <form method="post" action="{{ url('/turnos/'.$turno->id) }}" style="display:inline">
                    {{csrf_field()}}
                    {{ method_field('DELETE') }}
                    <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea Borrar el turno?');"> Borrar </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
@endsection
