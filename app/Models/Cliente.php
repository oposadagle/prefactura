<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [ 'nit','razon_social','razon_comercial','direccion','telefono','contacto','email1','email2','email3','comercial','email_comercial',
    'proceso_comercial','regional_comercial','analista','email_analista','proceso_analista','regional_analista','tipo_servicio','factor','estado'];
    
    use HasFactory;
}
