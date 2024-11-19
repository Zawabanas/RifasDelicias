<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rifa;
use App\Models\Imagen;

class RifaSeeder extends Seeder
{
    public function run()
    {
        $rifa = Rifa::create([
            'nombre' => 'Rifa de Prueba',
            'descripcion' => 'Esta es una rifa de prueba.',
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addDays(10),
            'precio_boleto' => 50.00,
            'estado' => 'activa',
        ]);
        $imagen = Imagen::create([
            'ruta' => 'uploads/rifas/header1.jpg',
        ]);
        $rifa->imagenes()->attach($imagen->id, ['tipo' => 'header']);
    }
}
