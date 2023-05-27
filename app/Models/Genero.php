<?php

namespace App\Models;

use App\Models\Pelicula;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Genero extends Model
{
    use HasFactory;

    protected $table = 'generos';
    protected $primaryKey = 'id';
    public $timestamps = false;

    
    protected $fillable = ['nombre'];

    public function peliculas()
    {
        return $this->hasMany(Pelicula::class);
    }

    public function agregarGenero($nombre)
    {
        $genero = Genero::create(['nombre' => $nombre]);
        return $genero;
    }
}
