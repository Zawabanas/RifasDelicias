<?php

namespace App\Http\Controllers;

use App\Models\Rifa;
use Illuminate\Http\Request;
use App\Models\MensajePromocion;

class TicketController extends Controller
{
    public function index()
    {
        // Obtener la rifa activa
        $rifaActiva = Rifa::where('estado', 'activa')->with('imagenes')->first();

        // Obtener el mensaje de promoción
        $mensajePromocion = MensajePromocion::latest()->value('mensaje');

        $imagenes = $rifaActiva ? $rifaActiva->imagenes : collect();
        // Obtener boletos de la rifa activa
        $boletos = $rifaActiva ? $rifaActiva->boletos : [];

        // Información de contacto para el footer
        $contactInfo = [
            'name' => 'Rifas Delicias',
            'phone' => '+521123456789',
        ];

        return view('tickets', compact('rifaActiva', 'imagenes', 'boletos', 'mensajePromocion', 'contactInfo'));
    }
}
