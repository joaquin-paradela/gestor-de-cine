<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         
        Genero::create([
            'nombre' => 'Acción',
        ]);
        Genero::create([
            'nombre' => 'Comedia',
        ]);
        Genero::create([
            'nombre' => 'Terror',
        ]);



     
    }
}