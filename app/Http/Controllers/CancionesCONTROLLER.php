<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canciones;

class CancionesController extends Controller
{
    public function nuevaCancion(Request $request)
    {
        $cancion = Canciones::create([
            'nombre' => $request->nombre, 
            'artista' => $request->artista,
            'tiempo' => $request->tiempo,
            'genero_id' => $request->genero_id
        ]);

        return response()->json(['message' => 'Canción creada', 'id' => $cancion->id], 201);
    }

    public function index()
    {
        $canciones = Canciones::with('genero')->get();
        return response()->json($canciones, 200);
    }

    public function destroy($id)
    {
        $cancion = Canciones::find($id);
        if (!$cancion) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        }
        
        $cancion->delete();
        return response()->json(['message' => 'Canción eliminada con éxito'], 200);
    }

    public function update(Request $request, $id)
    {
        $cancion = Canciones::find($id);

        if (!$cancion) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        }

        $cancion->fill($request->all());
        $cancion->save();

        return response()->json($cancion, 200);
    }
}