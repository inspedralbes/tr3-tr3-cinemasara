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
        Schema::create('entradas', function (Blueprint $table){
            $table->id('id_entradas')->autoIncrement();
            $table->unsignedBigInteger('id_sesion');
            $table->string('fila');
            $table->string('columna');
            $table->string('preu');
            $table->timestamps();

            $table->foreign('id_sesion')->references('id_sesion')->on('sesion');
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
