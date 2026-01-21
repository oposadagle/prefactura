<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CuentasExport implements FromCollection, WithHeadings
{
    protected $year;
    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        return DB::table('cuentas')
            ->whereYear('created_at', $this->year)
            ->whereMonth('created_at', $this->month)
            ->get();
    }

    public function headings(): array
    {
        return [
            'GUIA',
            'VALOR',
            'FACTURA',
            'USUARIO',
            'CREADO_EN',
            'ACTUALIZADO_EN'
        ];
    }
}
