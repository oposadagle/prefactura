<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ServiciosExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {        
        $currentYear = date('Y');
        return DB::table('peticiones')
                    ->select('id','fecha_solicitud',DB::raw('MONTH(fecha_cargue) as mes'),'fecha_cargue','fecha_descargue','hora_cargue','hora_descargue',
                    'oridate','saldate','desdate','findate','sacnote','responsable','cliente','origen','destino','ejecutivo','tipo_vehiculo','observaciones','tipo_trayecto',
                    'razon','placa','states')
                    ->whereYear('fecha_cargue', $this->year)
                    ->whereMonth('fecha_cargue', $this->month)
                    ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'FECHA_SOLICITUD',
            'MES',
            'FECHA_CARGUE',            
            'FECHA_DESCARGUE',
            'HORA_CARGUE',
            'HORA_DESCARGUE',
            'LLEGADA A ORIGEN',
            'SALIDA',
            'LLEGADA A DESTINO',
            'CIERRE',
            'NOTAS EVENTOS',
            'RESPONSABLE',
            'CLIENTE',
            'ORIGEN',
            'DESTINO',
            'EJECUTIVO',
            'TIPO_VEHICULO',
            'OBSERVACIONES',
            'TIPO_TRAYECTO',
            'MANIFIESTO',
            'PLACA',
            'ESTADO'
        ];
    }
}
