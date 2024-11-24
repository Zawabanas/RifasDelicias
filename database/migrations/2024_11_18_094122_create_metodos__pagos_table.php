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
        Schema::create('metodos_pago', function (Blueprint $table) {
            $table->id();
            $table->enum('nombre_metodo', ['transferencias bancarias', 'depositos en tiendas de servicios'])
                ->comment('Tipos de métodos de pago permitidos');
            $table->string('banco')->nullable();
            $table->string('propietario_cuenta')->nullable();
            $table->string('numero_tarjeta')->nullable();
            $table->string('clabe')->nullable();
            $table->text('detalles')->nullable();
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('metodos_pago');
    }
};
