<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    use HasFactory;

    protected $fillable = ['guia', 'valor', 'factura', 'usuario'];
    protected $primaryKey = 'guia';
    public $incrementing = false;
    protected $keyType = 'string';
}