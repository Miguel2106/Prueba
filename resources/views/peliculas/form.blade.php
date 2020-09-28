
<div class="form-group">
    
    <label for="Nombre" class="control-label">{{'Nombre'}}</label>
    <input type="text" class="form-control {{$errors->has('Nombre')?'is-invalid':''}}" name="Nombre" id="Nombre" 
    value="{{ isset($pelicula->Nombre)? $pelicula->Nombre:old('Nombre') }}">

    {!! $errors->first('Nombre','<div class="invalid-feedback">:message</div>') !!}

    
</div>

<div class="form-group">
    <label for="FechaDePublicacion" class="control-label">{{'Fecha De Publicación'}}</label>
    <input type="date" class="form-control {{$errors->has('FechaDePublicacion')?'is-invalid':''}}" name="FechaDePublicacion" id="FechaDePublicacion" 
    value="{{ isset($pelicula->FechaDePublicacion)? $pelicula->FechaDePublicacion:old('FechaDePublicacion') }}">

    {!! $errors->first('FechaDePublicacion','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
    <label for="Estado" class="control-label">{{'Estado'}}</label>
    <input type="text" class="form-control {{$errors->has('Estado')?'is-invalid':''}}" name="Estado" id="Estado" 
    value="{{ isset($pelicula->Estado)? $pelicula->Estado:old('Estado') }}">

    {!! $errors->first('Estado','<div class="invalid-feedback">:message</div>') !!}

</div>

<div class="form-group">
<label for="Foto" class="control-label">{{'Foto'}}</label>
@if(isset($pelicula->Foto))
<br/>
<img src="{{ asset('storage').'/'.$pelicula->Foto}}" class="img-thumbnail img-fluid" alt="" width="200">
<br/>
@endif
<input type="file" class="form-control {{$errors->has('Foto')?'is-invalid':''}}" name="Foto" id="Foto" value="">
{!! $errors->first('Foto','<div class="invalid-feedback">:message</div>') !!}
</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
<a class="btn btn-primary" href="{{ url('peliculas') }}">Regresar</a>