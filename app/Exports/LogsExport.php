<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LogsExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */

    protected $month;

    public function __construct($month)
    {
        $this->month = $month;
    }

    public function collection()
    {
        $currentYear = date('Y');
        return DB::table('logs')
            ->select('id', 'usuario', 'manifiesto', 'evento', 'fecha_evento', 'ip_address', 'user_agent')

            ->whereMonth('fecha_evento', $this->month)
            ->whereYear('fecha_evento', $currentYear)
            ->get();
    }
    public function headings(): array
    {
        return [
            'NO SOLICITUD',
            'USUARIO',
            'MANIFIESTO',
            'EVENTO',
            'FECHA EVENTO',
            'IP ADDRESS',
            'USER AGENT'
        ];
    }
}
