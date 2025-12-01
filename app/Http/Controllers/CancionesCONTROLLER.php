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
        $canciones = \App\Models\Canciones::with('genero')->get();

        // Devuelve el array de canciones en formato JSON con código 200 (OK)
        return response()->json($canciones, 200);
    }

    // App\Http\Controllers\CancionesController.php

    public function destroy($id)
    {
        $cancion = Canciones::find($id);
        if (!$cancion) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        }
        $cancion->delete();
        return response()->json(['message' => 'Canción eliminada con éxito'], 200);
    }

    // App\Http\Controllers\CancionesController.php

    public function update(Request $request, $id)
    {
        $cancion = \App\Models\Canciones::find($id);

        if (!$cancion) {
            return response()->json(['message' => 'Canción no encontrada'], 404);
        }

        // 3. Aplicar los nuevos datos de la solicitud al objeto de la canción.
        // fill() toma todos los datos del $request (si están en $fillable)
        $cancion->fill($request->all());
        
        $cancion->save();

        return response()->json($cancion, 200);
    }
}
