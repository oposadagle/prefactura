<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gle extends Model
{
    use HasFactory;
    protected $fillable = [
        'guia',
        'operador',
        'cliente',
        'fecha',
        'origen',
        'destino',
        'declarado',
        'piezas',
        'trayecto',
        'kilo',
        'total',
        'factura',
        'fecha_siigo',
        'valor_siigo',
        'created_at',
        'updated_at'
    ];
}
