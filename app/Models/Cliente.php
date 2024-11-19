<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
    ];

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }

    public function boletos()
    {
        return $this->hasMany(Boleto::class);
    }
}
