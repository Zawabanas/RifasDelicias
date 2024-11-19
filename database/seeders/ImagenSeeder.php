<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imagen;

class ImagenSeeder extends Seeder
{
    public function run()
    {
        Imagen::create([
            'ruta' => 'uploads/rifas/header1.jpg',
        ]);
    }
}
