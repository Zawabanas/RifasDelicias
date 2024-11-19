<?php

namespace App\Http\Controllers;

use App\Models\Rifa; // Si tienes rifas activas
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Ejemplo: Información de contacto
        $contactInfo = [
            'phone' => '+52 639 150 35 03',
            'name' => 'Rifas Delicias',
        ];

        // Ejemplo: Obtener la rifa activa (ajusta esto según tu modelo)
        $rifaActiva = Rifa::where('estado', 'activa')->first();

        // Pasar los datos a la vista
        return view('home', compact('contactInfo', 'rifaActiva'));
    }
}
