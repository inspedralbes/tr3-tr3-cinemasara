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
        Schema::create('sesion', function (Blueprint $table) {
            $table->id('id_sesion')->autoIncrement();
            $table->unsignedBigInteger('id_pelicula');
            $table->string('dia');
            $table->time('hora');
            $table->integer('diaespectador')->default(0);
            $table->timestamps();

            $table->foreign('id_pelicula')->references('id_pelicula')->on('peliculas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesion');
    
    }
};
