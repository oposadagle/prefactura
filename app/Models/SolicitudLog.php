<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolicitudLog extends Model
{
    protected $fillable = ['solicitud_id', 'user_id', 'campo', 'valor_anterior', 'valor_nuevo', 'razon'];

    public function solicitud()
    {
        return $this->belongsTo(Solicitud::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
