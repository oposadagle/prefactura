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
        return DB::table('prices')
            ->select(
                'id',
                'cliente',
                'fecha_solicitud',
                'canal',
                'tipo',
                'quien_solicita',
                'trayecto',
                'origen',
                'destino',
                'tipo_vehiculo',
                'tipo_carroceria',
                'capacidad',
                'sisetac',
                'costo',
                'costo_negocio',
                'costo_adicional',
                'totals',
                'difbn',
                'puntos',
                'observaciones',
                'responsable'
            )
            ->whereYear('fecha_solicitud', $this->year)
            ->whereMonth('fecha_solicitud', $this->month)
            ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'CLIENTE',
            'FECHA SOLICITUD',
            'CANAL',
            'TIPO',
            'QUIEN SOLICITA',
            'TRAYECTO',
            'ORIGEN',
            'DESTINO',
            'TIPO VEHICULO',
            'TIPO CARROCERIA',
            'CAPACIDAD (KG)',
            'SISETAC',
            'BASE COTIZACION',
            'TARIFA CONDUCTOR',
            'OTROS COSTOS',
            'COSTO NEGOCIO',
            'DIFERENCIA B-N',
            'NUMERO PUNTOS',
            'OBSERVACIONES',
            'RESPONSABLE'
        ];
    }
}
