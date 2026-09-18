<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DatosBancariosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return DB::table('datos_bancarios')
            ->select([
                'clase_documento',
                'nit',
                'beneficiario',
                'banco',
                'tipo_cuenta',
                'numero_cuenta',
                'estado',
            ])
            ->orderBy('id', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'DOCUMENTO',
            'NIT / DOC',
            'BENEFICIARIO',
            'BANCO',
            'TIPO CUENTA',
            'NÚMERO CUENTA',
            'ESTADO',
        ];
    }
}
