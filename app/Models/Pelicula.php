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
    
    protected $fillable = ['titulo','duracion', 'imagen', 'genero_id'];

    //RELACIONES CON LOS DEMAS MODELOS/ENTIDADES
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
    
    public static function getPeliculas()
    {
        $peliculas = Pelicula::all();
        return $peliculas;
    }

    public static function agregarPelicula($titulo, $duracion, $generoId, $actoresPrincipales, $imagen)
    {
     
        $pelicula = new Pelicula();
        $pelicula->titulo = $titulo;
        $pelicula->duracion = $duracion;
        $pelicula->genero_id = $generoId;

        // Procesar y guardar la imagen
        $rutaImagen = $pelicula->guardarImagen($imagen);
        $nombreImagen = basename($rutaImagen); // Obtener solo el nombre del archivo
        $pelicula->imagen = $nombreImagen;
        $pelicula->save();

        /* actoresPrincipales() es un método definido en el modelo Pelicula que representa
         la relación de muchos a muchos con la tabla actores_principales a través de la
          tabla de enlace actuaciones.
    
            explode(',', $actoresPrincipales): Divide la cadena $actoresPrincipales 
            en un array utilizando la coma (,) como delimitador. Esto significa que si $actoresPrincipales 
            es una cadena como "Actor1, Actor2, Actor3", se convertirá en un array que contiene los elementos 
            "Actor1", "Actor2" y "Actor3".

           array_map('trim', $array): Aplica la función trim() a cada elemento del array. La función trim() 
           elimina los espacios en blanco al principio y al final de una cadena. En este caso, 
           array_map('trim', $actoresPrincipales) eliminará cualquier espacio en blanco adicional alrededor
            de cada nombre de actor en el array.
        */
        
          $actoresPrincipales = array_map('trim', explode(',', $actoresPrincipales));

            // Asociar los actores principales a la película en la tabla intermedia "actuaciones"
            $actoresIds = [];
            foreach ($actoresPrincipales as $nombre) {
                $actorPrincipal = ActorPrincipal::firstOrCreate(['nombre_actor' => $nombre]);
                $actoresIds[] = $actorPrincipal->id;
            }

            $pelicula->actoresPrincipales()->sync($actoresIds);
            

        return $pelicula;
    }

    public static function guardarImagen($imagen)
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



}
