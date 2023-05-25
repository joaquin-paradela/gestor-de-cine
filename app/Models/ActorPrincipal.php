<?php

namespace App\Models;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor_principal extends Model
{
    use HasFactory;

    protected $table = 'actores_principales';
    protected $primaryKey = 'id';
    
    protected $fillable = ['nombre_actor', 'nacionalidad'];

    public function peliculas()
    {
       return $this->belongsToMany(Pelicula::class, 'actuaciones');
    }

    
}
