<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class CuentasHistoricoExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return DB::table('cuentas')
            ->select(
                'razon',
                'id',
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
                'cliente'
            )
            ->whereNotNull('soporte')
            ->where('verificado', true)
            ->where('pagada', true)
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'MANIFIESTO',
            'ID',
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
            'CLIENTE'
        ];
    }

    public function map($diario): array
    {
        // For historical, estado is always 'CUENTA PAGADA' as per controller logic
        $estado_cuenta = 'CUENTA PAGADA';

        // Calculations matching the view
        $base = floatval($diario->cargaone ?? 0) +
            floatval($diario->cargatwo ?? 0) +
            floatval($diario->standby ?? 0) +
            floatval($diario->costo_desplazamiento ?? 0);

        $reteica = ($diario->ica == 'SI') ? ($base * 0.00414) : 0;
        $retefuente = $base * 0.01;
        $total = $base - ($reteica + $retefuente);

        return [
            $diario->razon,
            $diario->id,
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
            $diario->cliente
        ];
    }
}
