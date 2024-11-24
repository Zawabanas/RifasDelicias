<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodoPago extends Model
{
    use HasFactory;

    protected $table = 'metodos_pago';

    protected $fillable = [
        'nombre_metodo',
        'banco',
        'propietario_cuenta',
        'numero_tarjeta',
        'clabe',
        'detalles',
        'estado',
    ];

    public const TIPOS_METODOS = [
        'transferencias bancarias' => 'Transferencias Bancarias',
        'depositos en tiendas de servicios' => 'Depósitos en Tiendas de Servicios',
    ];
}
