<?php

namespace App\Http\Controllers;

use App\Models\Turnos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TurnosController extends Controller
{
    
    public function index()
    {
        $datosH['turnos']=Turnos::paginate(5);
        return view('turnos.index',$datosH);
    }

    public function create()
    {
        return view('turnos.create');
    }

    
    public function store(Request $request)
    {
        $campos=[
            'Estado'=> 'required|string|max:120',
        ];

        $Mensaje=["required"=>'El Campo :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosTurnos=request()->except('_token');

        Turnos::insert($datosTurnos);
        return redirect('turnos')->with('Mensaje','Turno agregado con éxito');
    }

    public function show(Turnos $turnos)
    {
        //
    }

    
    public function edit($id)
    {
        $turno= Turnos::findOrFail($id);
        return view('turnos.edit', compact('turno'));
    }

    
    public function update(Request $request, $id)
    {
        $campos=[
            'Estado'=> 'required|string|max:120',
        ];

        $Mensaje=["required"=>'El Campo :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosTurnos=request()->except(['_token','_method']);

        Turnos::where('id','=',$id)->update($datosTurnos);
        return redirect('turnos')->with('Mensaje','Turno modificad con éxito');
    }

    
    public function destroy($id)
    {

        Turnos::destroy($id);

        return redirect('turnos')->with('Mensaje','Turno Eliminado');
    }
}
