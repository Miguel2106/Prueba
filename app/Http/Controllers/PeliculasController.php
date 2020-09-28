<?php

namespace App\Http\Controllers;

use App\Models\Peliculas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PeliculasController extends Controller
{
    
    public function index()
    {
        $datos['peliculas']=Peliculas::paginate(5);
        return view('peliculas.index',$datos);

    }

    
    public function create()
    {
        
        return view('peliculas.create');

    }


    public function store(Request $request)
    {
        
        //$datosPeliculas=request()->all();
        //return response()->json($datosPeliculas);

        $campos=[
            'Nombre'=> 'required|string|max:120',
            'FechaDePublicacion'=> 'required|date|',
            'Estado'=> 'required|string|max:120',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg'
        ];

        $Mensaje=["required"=>'El Campo :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);

        $datosPeliculas=request()->except('_token');
        
        if($request->hasFile('Foto')){
            $datosPeliculas['Foto']=$request->file('Foto')->store('uploads','public');
        } 

        Peliculas::insert($datosPeliculas);
       
        return redirect('peliculas')->with('Mensaje','Pelicula agregada con exito');

    }

   

    public function show(Peliculas $peliculas)
    {
        //
        
    }


    public function edit($id)
    {
        
        $pelicula= Peliculas::findOrFail($id);
        return view('peliculas.edit', compact('pelicula'));

    }


    public function update(Request $request, $id)
    {

        $campos=[
            'Nombre'=> 'required|string|max:120',
            'FechaDePublicacion'=> 'required|date|',
            'Estado'=> 'required|string|max:120',
        ];

        if($request->hasFile('Foto')){
            $campos+=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
        }

        $Mensaje=["required"=>'El Campo :attribute es requerido'];

        $this->validate($request,$campos,$Mensaje);


        $datosPeliculas=request()->except(['_token','_method']);

        if($request->hasFile('Foto')){
            $pelicula= Peliculas::findOrFail($id);
            Storage::delete('public/'.$pelicula->Foto); // borramos el elemento antiguo
            $datosPeliculas['Foto']=$request->file('Foto')->store('uploads','public');
        }

        Peliculas::where('id','=',$id)->update($datosPeliculas);

        //$pelicula= Peliculas::findOrFail($id); // consultamos como queda nuestro registro
        //return view('peliculas.edit', compact('pelicula')); // mostramos la vista

        return redirect('peliculas')->with('Mensaje','Pelicula modificada con exito');

    }

    
    public function destroy($id)
    {
        $pelicula= Peliculas::findOrFail($id);
        if(Storage::delete('public/'.$pelicula->Foto)){
            Peliculas::destroy($id);
        };

        return redirect('peliculas')->with('Mensaje','Pelicula Eliminada');
    }
}
