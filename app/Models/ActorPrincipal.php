<?php

namespace App\Models;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorPrincipal extends Model
{
    use HasFactory;

    protected $table = 'actores_principales';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    protected $fillable = ['nombre_actor', 'nacionalidad'];

    public function peliculas()
    {
       return $this->belongsToMany(Pelicula::class, 'actuaciones');
    }

    
}
