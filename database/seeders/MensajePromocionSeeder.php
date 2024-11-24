<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MensajePromocion;

class MensajePromocionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mensajes = [
            '¡Compra 2 boletos y recibe un tercero gratis!',
            'Participa en la rifa especial con cada boleto adquirido.',
            '¡Por cada 5 boletos, obtén un número extra sin costo!',
            'Promoción por tiempo limitado: ¡Boletos al 50% de descuento!',
            'Participa ahora y multiplica tus posibilidades de ganar.',
            '¡El premio principal está esperando por ti! Compra tu boleto hoy.',
            'Por cada boleto, estás más cerca del premio mayor.',
            '¡Promoción especial! Compra 10 boletos y recibe 2 adicionales gratis.',
            'Invita a tus amigos a participar y obtén un boleto extra.',
            'La suerte está de tu lado. ¿Qué esperas para participar?'
        ];

        foreach ($mensajes as $mensaje) {
            MensajePromocion::create([
                'mensaje' => $mensaje
            ]);
        }
    }
}
