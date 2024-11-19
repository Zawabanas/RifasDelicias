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

// Ruta de bienvenida
Route::get('/', function () {
    $rifaActiva = Rifa::where('estado', 'activa')->first(); // Obtener la primera rifa activa
    return view('home', compact('rifaActiva'));
});

// Rutas protegidas por autenticación
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard gestionado por el controlador
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Gestión de rifas y asociados
    Route::resource('rifas', RifaController::class);
    Route::resource('imagenes', ImagenController::class);
    Route::resource('boletos', BoletoController::class);


    Route::get('/', [HomeController::class, 'home'])->name('home');
    // Gestión de clientes y pagos
    Route::resource('clientes', ClienteController::class);
    Route::resource('metodos-pago', MetodoPagoController::class);
    Route::resource('transacciones', TransaccionController::class);

    // Contacto
    Route::resource('contactos', ContactoController::class);
});

// Ruta de prueba (opcional, solo para desarrollo)
Route::view('/test', 'test');

// Rutas de autenticación
require __DIR__ . '/auth.php';
