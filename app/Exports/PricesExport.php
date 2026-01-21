<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PricesExport implements FromCollection, WithHeadings
{    
     protected $month;

     public function __construct($year, $month)
     {
        $this->year = $year;
        $this->month = $month;
     }

    public function collection()
    {
        $currentYear = date('Y');
        return DB::table('prices')
            ->select(
                'ID',
                'CLIENTE',                
                'FECHA_SOLICITUD',
                'ORIGEN',
                'DESTINO',                
                'TRAYECTO',
                'TIPO_VEHICULO',
                'CAPACIDAD',
                'COSTO',
                'FECHA_RESPUESTA',
                'APROBACION'                
            )
            ->whereYear('FECHA_SOLICITUD', $this->year)
            ->whereMonth('FECHA_SOLICITUD', $this->month)
            ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'CLIENTE',                
            'FECHA DE SOLICITUD',
            'ORIGEN',
            'DESTINO',                
            'TRAYECTO',
            'TIPO DE VEHICULO',
            'CAPACIDAD',
            'COSTO',
            'FECHA DE RESPUESTA',
            'APROBACION'  
        ];
    }
}
