<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionesTable extends Migration
{
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('rifa_id');
            $table->unsignedBigInteger('boleto_id');
            $table->unsignedBigInteger('metodo_pago_id');
            $table->decimal('monto', 8, 2);
            $table->enum('estado', ['pendiente', 'completado'])->default('pendiente');
            $table->text('notas')->nullable(); // Notas sobre la transacción
            $table->timestamp('fecha_transaccion')->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('rifa_id')->references('id')->on('rifas')->onDelete('cascade');
            $table->foreign('boleto_id')->references('id')->on('boletos')->onDelete('cascade');
            $table->foreign('metodo_pago_id')->references('id')->on('metodos_pago')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
