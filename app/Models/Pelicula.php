<?php

namespace App\Models;

use App\Models\Genero;
use App\Models\Funcion;
use App\Models\ActorPrincipal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pelicula extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'peliculas';
    protected $primaryKey = 'id';
    
    protected $fillable = ['titulo','duracion'];

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function funciones()
    {
        return $this->hasMany(Funcion::class);
    }

    public function actoresPrincipales()
    {
        return $this->belongsToMany(ActorPrincipal::class, 'actuaciones');
    }

    //funcionalidades
    public function agregarPelicula($titulo, $duracion, $generoId, $actoresPrincipales)
    {
        $pelicula = Pelicula::create([
            'titulo' => $titulo,
            'duracion' => $duracion,
            'genero_id' => $generoId,
        ]);

        /* actoresPrincipales() es un método definido en el modelo Pelicula que representa
         la relación de muchos a muchos con la tabla actores_principales a través de la
          tabla de enlace actuaciones.

          $pelicula->actoresPrincipales()->attach($actoresPrincipales) 
          crea las relaciones entre la película y los actores principales en la tabla de enlace actuaciones,
           lo que permite asociar a los actores principales con la película recién creada.
        */
        $pelicula->actoresPrincipales()->attach($actoresPrincipales);

        return $pelicula;
    }

    /*
     Asume que $datos es un array que contiene los nuevos valores para los atributos de la película.
      El método update actualiza directamente los atributos de la película en la base de datos.
    */
    public function editarPelicula($datos)
    {
        $this->update($datos);
    }

    public static function mostrarPeliculas()
    {
        $peliculas = Pelicula::all();
        return $peliculas;
    }

}
