<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Solicitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'guia',
        'fecha_solicitud',
        'fecha_cargue',
        'hora_cargue',
        'fecha_descargue',
        'hora_descargue',
        'cliente',
        'origen',
        'destino',
        'ejecutivo',
        'tipo_vehiculo',
        'carroceria',
        'tipo_trayecto',
        'observaciones',
        'placa',
        'costo',
        'tipo',
        'state',
        'color',
        'font',
        'paytype',
        'colorp',
        'remesa',
        'remesa_proveedor',
        'radicado',
        'retorno',
        'razon',
        'sucursal',
        'manifiesto',
        'caruser',
        'cardate',
        'carnote',
        'carcolor',
        'trafico',
        'trauser',
        'tradate',
        'tranote',
        'tracolor',
        'oriuser',
        'oridate',
        'orinote',
        'oricolor',
        'orimage',
        'saluser',
        'saldate',
        'salnote',
        'salcolor',
        'salimage',
        'desuser',
        'desdate',
        'desnote',
        'descolor',
        'desimage',
        'finuser',
        'findate',
        'finnote',
        'fincolor',
        'finimage',
        'canuser',
        'candate',
        'cannote',
        'cancolor',
        'canimage',
        'antuser',
        'antdate',
        'antnote',
        'pago_completo',
        'observacion_pago',
        'anticipo',
        'estado_anticipo',
        'saldo',
        'estado_saldo',
        'egreso_anticipo',
        'egreso_saldo',
        'fecha_saldo',
        'recibido_cumplido',
        'cumplido',
        'pagar_saldo',
        'tipo_pago',
        'fecha_envio',
        'fecha_cumplido',
        'condicion_facturacion',
        'documento_cliente',
        'destinatario',
        'direccion',
        'piezas',
        'peso',
        'valor_declarado',
        'enviado',
        'confirmado'
    ];

    protected static function booted()
    {
        static::updated(function ($solicitud) {
            $userId = Auth::id(); // Obtener el ID del usuario autenticado
            $cambios = [];

            // Verificar cambios en el campo `enviado`
            if ($solicitud->wasChanged('enviado')) {
                $cambios[] = [
                    'solicitud_id' => $solicitud->id,
                    'user_id' => $userId,
                    'campo' => 'enviado',
                    'razon' => $solicitud->razon,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Verificar cambios en el campo `confirmado`
            if ($solicitud->wasChanged('confirmado')) {
                $cambios[] = [
                    'solicitud_id' => $solicitud->id,
                    'user_id' => $userId,
                    'campo' => 'confirmado',
                    'razon' => $solicitud->razon,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            // Insertar los registros en la tabla solicitudes_logs si hubo cambios
            if (!empty($cambios)) {
                \App\Models\SolicitudLog::insert($cambios);
            }
        });
    }
}
