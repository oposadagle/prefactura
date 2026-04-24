<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CuentasPendientesExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return DB::table('cuentas')
            ->select(
                'guia',
                'razon',
                'fecha_envio',
                'verificado',
                'avalado',
                'pagada',
                'placa',
                'cargaone',
                'cargatwo',
                'standby',
                'costo_desplazamiento',
                'ica',
                'pagcon',
                'cpagcon',
                'tpagcon',
                'cliente',
                'id'
            )
            ->whereNotNull('soporte')
            ->where('verificado', true)
            ->where('pagada', false)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'GUIA',
            'MANIFIESTO',
            'FECHA ENVIO',
            'ESTADO',
            'PLACA',
            '$ CARGUE 1',
            '$ CARGUE 2',
            '$ STANDBY',
            '$ DESPLAZAMIENTO',
            '$ RETEICA',
            '$ RETEFUENTE',
            '$ TOTAL',
            'PAGAR CUENTA A',
            'CEDULA CUENTA',
            'TELEFONO CUENTA',
            'CLIENTE',
            'ID'
        ];
    }

    public function map($diario): array
    {
        // Estado calculation matching SolicitudController@cuentas
        $estado_cuenta = 'DESCONOCIDO';
        if (!$diario->verificado) {
            $estado_cuenta = 'PENDIENTE POR APROBAR';
        } elseif ($diario->verificado && !$diario->avalado) {
            $estado_cuenta = 'PENDIENTE POR VALIDAR';
        } elseif ($diario->verificado && $diario->avalado && !$diario->pagada) {
            $estado_cuenta = 'PENDIENTE POR PAGAR';
        } elseif ($diario->verificado && $diario->avalado && $diario->pagada) {
            $estado_cuenta = 'CUENTA PAGADA';
        }

        // Calculations matching the view
        $base = floatval($diario->cargaone ?? 0) +
            floatval($diario->cargatwo ?? 0) +
            floatval($diario->standby ?? 0) +
            floatval($diario->costo_desplazamiento ?? 0);

        $reteica = ($diario->ica == 'SI') ? ($base * 0.00414) : 0;
        $retefuente = $base * 0.01;
        $total = $base - ($reteica + $retefuente);

        return [
            $diario->guia,
            $diario->razon,
            $diario->fecha_envio,
            $estado_cuenta,
            $diario->placa,
            $diario->cargaone,
            $diario->cargatwo,
            $diario->standby,
            $diario->costo_desplazamiento,
            $reteica,
            $retefuente,
            $total,
            $diario->pagcon,
            $diario->cpagcon,
            $diario->tpagcon,
            $diario->cliente,
            $diario->id
        ];
    }
}
