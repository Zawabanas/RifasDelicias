<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactosTable extends Migration
{
    public function up()
    {
        Schema::create('contactos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono')->unique();
            $table->text('mensaje')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contactos');
    }
}
