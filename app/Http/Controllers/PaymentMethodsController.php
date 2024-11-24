<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MetodoPago;

class PaymentMethodsController extends Controller
{
    public function index()
    {
        // Información de contacto (u otros datos que necesites pasar a la vista)
        $contactInfo = [
            'name' => 'Rifas Delicias',
            'phone' => '+521123456789'
        ];

        // Obtener métodos de pago desde la base de datos
        $paymentMethods = MetodoPago::where('estado', 'activo')->get();

        // Pasar variables a la vista
        return view('payment_methods', compact('contactInfo', 'paymentMethods'));
    }
}
