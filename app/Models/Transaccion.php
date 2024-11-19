<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
    use HasFactory;

    // Especificar el nombre correcto de la tabla
    protected $table = 'transacciones';

    protected $fillable = [
        'cliente_id',
        'rifa_id',
        'boleto_id',
        'metodo_pago_id',
        'monto',
        'estado',
        'notas',
        'fecha_transaccion',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function rifa()
    {
        return $this->belongsTo(Rifa::class);
    }

    public function boleto()
    {
        return $this->belongsTo(Boleto::class);
    }

    public function metodoPago()
    {
        return $this->belongsTo(MetodoPago::class);
    }
}
