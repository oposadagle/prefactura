<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CuentasHistoricoExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('cuentas')
            ->select(
                'razon',
                'id',
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
