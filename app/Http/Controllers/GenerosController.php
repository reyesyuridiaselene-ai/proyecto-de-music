<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;

class GenerosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $generos = Genero::all();
        return response ()-> json($generos, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genero =Genero::create([
            'nombre' => $request->nombre
        ]);

        return response ()->json(['mensaje' => 'genero creado', 'id' => $genero->id],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $genero = Genero::find($id);
         if(!$genero){
            return response()-> json(['message' => 'Genero no encontrado'], 404);
         }
          $genero->fill($request->all());
        
        $genero->save();

        return response()->json($genero, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genero = Genero::find($id);
        if(!$genero){
            return  response()->json(['message' => 'Genero no encontrado'], 404);
        }
         $genero->delete();
        return response()->json(['message' => 'genero eliminada con éxito'], 200);
    }
}
