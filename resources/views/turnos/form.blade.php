<div class="form-group">
    
    <label for="Turno" class="control-label">{{'Turno'}}</label>
    <input type="time" class="form-control {{$errors->has('Turno')?'is-invalid':''}}" name="Turno" id="Turno" 
    value="{{ isset($turno->Turno)? $turno->Turno:old('Turno') }}">

    {!! $errors->first('Turno','<div class="invalid-feedback">:message</div>') !!}

    
</div>

<div class="form-group">
    <label for="Estado" class="control-label">{{'Estado'}}</label>
    <input type="text" class="form-control {{$errors->has('Estado')?'is-invalid':''}}" name="Estado" id="Estado" 
    value="{{ isset($turno->Estado)? $turno->Estado:old('Estado') }}">

    {!! $errors->first('Estado','<div class="invalid-feedback">:message</div>') !!}

</div>

<input type="submit" class="btn btn-success" value="{{ $Modo=='crear' ? 'Agregar':'Modificar' }}">
<a class="btn btn-primary" href="{{ url('turnos') }}">Regresar</a>