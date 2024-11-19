<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagenes';

    protected $fillable = [
        'ruta',
    ];

    // Relación con rifas a través de la tabla intermedia
    public function rifas()
    {
        return $this->belongsToMany(Rifa::class, 'rifa_imagen')
            ->withPivot('tipo') // Acceso al campo `tipo` en la tabla intermedia
            ->withTimestamps();
    }
}
