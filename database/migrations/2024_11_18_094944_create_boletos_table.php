<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('boletos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rifa_id');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->integer('numero');
            $table->enum('estado', ['disponible', 'reservado', 'vendido'])->default('disponible');
            $table->timestamps();

            $table->foreign('rifa_id')->references('id')->on('rifas')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boletos');
    }
};
