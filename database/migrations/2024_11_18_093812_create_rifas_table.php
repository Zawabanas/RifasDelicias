<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRifasTable extends Migration
{
    public function up()
    {
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->text('cantidad_boletos');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->decimal('precio_boleto', 8, 2);
            $table->enum('estado', ['activa', 'cerrada'])->default('activa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rifas');
    }
}
