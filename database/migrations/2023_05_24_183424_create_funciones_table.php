<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('funciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sala_id');
            $table->unsignedBigInteger('pelicula_id');
            $table->date('fecha')->nullable(false);
            $table->time('hora_inicio')->nullable(false);
            $table->integer('asientos_disponibles')->nullable(false);
            $table->float('precio_entrada')->nullable(false);
            $table->softDeletes();
           

            $table->foreign('sala_id')->references('id')->on('salas');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funciones');
    }
};
