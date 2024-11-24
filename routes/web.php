<?php

use App\Http\Controllers\BoletoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\MetodoPagoController;
use App\Http\Controllers\RifaController;
use App\Http\Controllers\TransaccionController;
use Illuminate\Support\Facades\Route;
use App\Models\Rifa;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentMethodsController;
use App\Http\Controllers\TicketController;

// Ruta de bienvenida

Route::get('/', [HomeController::class, 'home'])->name('home');


Route::get('/payment_methods', [PaymentMethodsController::class, 'index'])->name('payment.methods');

Route::get('/tickets', [TicketController::class, 'index'])->name('tickets');




// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard gestionado por el controlador
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestión de rifas y asociados
    Route::resource('rifas', RifaController::class);
    Route::resource('imagenes', ImagenController::class);
    Route::resource('boletos', BoletoController::class)->except(['destroy']);



    // Gestión de clientes y pagos
    Route::resource('clientes', ClienteController::class);


    Route::resource('metodos_pago', MetodoPagoController::class)->parameters([
        'metodos_pago' => 'metodoPago'
    ]);


    Route::resource('transacciones', TransaccionController::class);

    // Contacto
    Route::resource('contactos', ContactoController::class);
});

// Ruta de prueba (opcional, solo para desarrollo)
Route::view('/test', 'test');

// Rutas de autenticación
require __DIR__ . '/auth.php';
