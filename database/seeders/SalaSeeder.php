<?php

namespace Database\Seeders;

use App\Models\Sala;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sala::create([
            'nombre' => 'Sala 1',
            'tipo_sala' => '2D',
            'capacidad_asientos' => 100
        ]);

        Sala::create([
            'nombre' => 'Sala 2',
            'tipo_sala' => '3D',
            'capacidad_asientos' => 100
        ]);
    }
}
