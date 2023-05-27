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
    public $timestamps = false;
    
    protected $fillable = ['titulo','duracion', 'imagen'];

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
        return $this->belongsToMany(ActorPrincipal::class, 'actuaciones', 'pelicula_id', 'principales_id');
    }

    //funcionalidades
    public static function agregarPelicula($titulo, $duracion, $generoId, $actoresPrincipales, $imagen)
    {
        $pelicula = Pelicula::create([
            'titulo' => $titulo,
            'duracion' => $duracion,
            'genero_id' => $generoId,
        ]);

        // Procesar y guardar la imagen
        $rutaImagen = $pelicula->guardarImagen($imagen);
        $pelicula->imagen = $rutaImagen;
        $pelicula->save();

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

    public function guardarImagen($imagen)
    {
        $ruta = public_path('Imagenes/');

        // Generar un nombre único para la imagen
        $nombreImagen = uniqid('imagen_') . '.' . $imagen->getClientOriginalExtension();

        // Mover la imagen al directorio de destino
        $imagen->move($ruta, $nombreImagen);

        return $ruta . $nombreImagen;
    }

    /*
     Asume que $datos es un array que contiene los nuevos valores para los atributos de la película.
      El método update actualiza directamente los atributos de la película en la base de datos.
    */
    public function editarPelicula($datos)
    {
        $this->update($datos);
    }

    public static function getPeliculas()
    {
        $peliculas = Pelicula::all();
        return $peliculas;
    }

}
