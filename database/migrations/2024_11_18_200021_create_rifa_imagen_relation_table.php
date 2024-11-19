<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifaImagenRelationTable extends Migration
{
    public function up()
    {
        Schema::create('rifa_imagen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rifa_id');
            $table->unsignedBigInteger('imagen_id');
            $table->enum('tipo', ['header', 'carousel'])->default('carousel');
            $table->timestamps();

            // Claves foráneas
            $table->foreign('rifa_id')->references('id')->on('rifas')->onDelete('cascade');
            $table->foreign('imagen_id')->references('id')->on('imagenes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('rifa_imagen');
    }
}
