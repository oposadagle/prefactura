<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CuentasPendientesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('cuentas')
            ->select(
                'guia',
                'razon',
                'fecha_envio',
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
            'PLACA',
            '$ CARGUE 1',
            '$ CARGUE 2',
            '$ STANDBY',
            '$ DESPLAZAMIENTO',
            'ICA',
            'PAGAR CUENTA A',
            'CEDULA CUENTA',
            'TELEFONO CUENTA',
            'CLIENTE'
        ];
    }
}
