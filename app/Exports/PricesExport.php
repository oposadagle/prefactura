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
                'id',
                'cliente',                
                'fecha_solicitud',
                'origen',
                'destino',                
                'trayecto',
                'tipo_vehiculo',
                'capacidad',
                'costo',
                'fecha_respuesta',
                'aprobacion'                
            )
            ->whereYear('fecha_solicitud', $this->year)
            ->whereMonth('fecha_solicitud', $this->month)
            ->get();
    }
    public function headings(): array
    {
        return [
            'id',
            'cliente',                
            'fecha de solicitud',
            'origen',
            'destino',                
            'trayecto',
            'tipo de vehiculo',
            'capacidad',
            'costo',
            'fecha de respuesta',
            'aprobacion'  
        ];
    }
}
