<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\canciones;//usamos el use para que sea una herramienta de legibilidad

class CancionesController extends Controller
{
    //
    
    public function nuevaCancion(Request $request){
        //poner la parte de use cancion para 
       // $cancion = Cancion::create($request->all());
        $cancion = new Canciones;
        $cancion ->nombre = $request->nombre;
        $cancion ->artista = $request->artista;
        $cancion ->tiempo = $request->tiempo;
        $cancion ->genero = $request->genero;
        $cancion ->save();

        return response()->json(['message' => 'Canción creada'], 201);
           
    }
}
