<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videojuegos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo')->unique;
            $table->double('precio');
            $table->integer('pegi');
            $table->String('descripcion');
            $table->timestamps();
            /*
                Añadir clave foranea para que el videojuego sea
                desarrollado por una sola compañia 
                (Poner la clave foranea como una columna nullable)

                modificar los modelos para implementar las relaciones

                mostrar junto a cada videojuego la compañia que lo ha desarrollado (En el index)

                mostrar junto a cada compañia los videojuegos que ha desarrollado (En una lista)
             */
            $table->unsignedBigInteger('compañia_id')->nullable();
            $table->foreign('compañia_id')->references('id')->on('compañias');
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videojuegos');
    }
};
