<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Canciones extends Model
{
    
    protected $table = 'cancion';
    protected $fillable = ['nombre', 'artista', 'tiempo', 'genero_id'];
    protected $guarded = [];

    // Relación One-to-Many: Una canción pertenece a un género
    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

}
