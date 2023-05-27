<?php

namespace Database\Seeders;

use App\Models\Pelicula;
use App\Models\ActorPrincipal;
use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $imagen = public_path('Imagenes/Rapido.png');
      $genero = Genero::firstOrCreate(['nombre' => 'Acción']);

      $pelicula =  Pelicula::create([
                    'titulo' => 'Rapidos y furiosos',
                    'duracion' => '60:00:00',
                    'imagen' => $imagen,
                    'genero_id' => $genero->id
                ]);

        // Nombres de los actores principales
        $actoresPrincipalesNombres = ['Vin disiel']; // Reemplaza con los nombres correctos de tus actores principales

        // Asociar los actores principales a la película en la tabla intermedia "actuaciones"
        foreach ($actoresPrincipalesNombres as $nombre) {
            $actorPrincipal = ActorPrincipal::firstOrCreate(['nombre_actor' => $nombre]);

            $pelicula->actoresPrincipales()->attach($actorPrincipal->id);
        }

     
    }
}