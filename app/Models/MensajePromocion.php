<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensajePromocion extends Model
{
    use HasFactory;

    protected $fillable = ['mensaje', 'boletos'];
}
