<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rifa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'precio_boleto',
        'estado',
        'cantidad_boletos',
    ];

    // Relación con imágenes a través de la tabla intermedia
    public function imagenes()
    {
        return $this->belongsToMany(Imagen::class, 'rifa_imagen')
            ->withPivot('tipo')
            ->withTimestamps();
    }

    // Método para obtener la imagen del header
    public function getHeaderImageAttribute()
    {
        return $this->imagenes->firstWhere('pivot.tipo', 'header');
    }

    // Método para obtener imágenes del carrusel
    public function getCarouselImagesAttribute()
    {
        return $this->imagenes->filter(fn($img) => $img->pivot->tipo === 'carousel');
    }

    public function boletos()
    {
        return $this->hasMany(Boleto::class);
    }

    public function generarBoletos()
    {
        for ($i = 1; $i <= $this->cantidad_boletos; $i++) {
            $this->boletos()->create([
                'numero' => $i,
                'estado' => 'disponible',
            ]);
        }
    }

    public function transacciones()
    {
        return $this->hasMany(Transaccion::class);
    }
}
