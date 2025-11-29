<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Canciones extends Model
{
    //protected $table = 'cancion';
    protected $table = 'cancion';
    protected $fillable = ['nombre', 'artista', 'tiempo', 'genero'];
    protected $guarded = [];

}
