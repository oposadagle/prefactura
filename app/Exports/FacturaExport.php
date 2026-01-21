<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class FacturaExport implements FromCollection, WithHeadings
{
    protected $añio;
    protected $meis;

    public function __construct($añio, $meis)
    {
        $this->añio = $añio;
        $this->meis = $meis;
    }

    public function headings(): array
    {
        return [
            'Factura',
            'Cliente',
            'Año',
            'Mes',
            'Guias',
            'Total GLE',
            'Total Siigo',
        ];
    }

    public function collection()
    {
        return DB::table('facturas')
            ->select('factura', 'cliente', 'año', 'mes', 'guias', 'total_gle', 'total_siigo')
            ->where('factura', '!=', 0)
            ->where('año', $this->añio)
            ->where('mes', $this->meis)
            ->orderBy('año', 'desc')
            ->orderBy('mes', 'desc')
            ->get();
    }
}
