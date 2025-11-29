<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Canciones extends Model
{
    //protected $table = 'cancion';
     protected $fillable = ['titulo', 'artista', 'album', 'duracion'];
    protected $guarded = [];

}
