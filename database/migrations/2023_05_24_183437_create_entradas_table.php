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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('funcion_id');
            $table->integer('cantidad_entradas_compradas')->nullable(false);
            $table->integer('precio_unitario')->nullable(false);
            $table->float('precio_total')->nullable(false);
            $table->integer('puntos_obtenidos')->nullable();
            $table->date('fecha_compra')->nullable(false);
            $table->time('hora_compra')->nullable(false);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('funcion_id')->references('id')->on('funciones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
