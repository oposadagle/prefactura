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

    protected $year;
    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {        
        $currentYear = date('Y');
        $data = DB::table('peticiones')
                    ->select('id','fecha_solicitud',DB::raw('EXTRACT(MONTH FROM fecha_cargue) as mes'),'fecha_cargue','fecha_descargue','hora_cargue','hora_descargue',
                    'oridate','saldate','desdate','findate','sacnote','responsable','cliente','origen','destino','ejecutivo','tipo_vehiculo','observaciones','tipo_trayecto',
                    'razon','placa','states',
                    'carnote', 'orinote', 'salnote', 'desnote', 'finnote', 'cannote', 'cannotes', 'tranote', 'antnote', 'nota_cierre')
                    ->whereYear('fecha_cargue', $this->year)
                    ->when($this->month !== 'todos', function ($query) {
                        return $query->whereMonth('fecha_cargue', $this->month);
                    })
                    ->get();

        return $data->map(function ($item) {
            $notes = [];
            
            // Concatenar las 11 notas de show.blade.php
            if (!empty(trim($item->observaciones ?? ''))) $notes[] = "SOLICITUD: " . trim($item->observaciones);
            if (!empty(trim($item->carnote ?? ''))) $notes[] = "CARGUE: " . trim($item->carnote);
            if (!empty(trim($item->orinote ?? ''))) $notes[] = "ORIGEN: " . trim($item->orinote);
            if (!empty(trim($item->salnote ?? ''))) $notes[] = "SALIDA: " . trim($item->salnote);
            if (!empty(trim($item->desnote ?? ''))) $notes[] = "DESTINO: " . trim($item->desnote);
            if (!empty(trim($item->finnote ?? ''))) $notes[] = "FINALIZADO: " . trim($item->finnote);
            if (!empty(trim($item->cannote ?? ''))) $notes[] = "CANCELADO: " . trim($item->cannote);
            if (!empty(trim($item->cannotes ?? ''))) $notes[] = "NOTAS CANCELADO: " . trim($item->cannotes);
            if (!empty(trim($item->tranote ?? ''))) $notes[] = "TRAFICO: " . trim($item->tranote);
            if (!empty(trim($item->antnote ?? ''))) $notes[] = "ANTICIPO: " . trim($item->antnote);
            if (!empty(trim($item->nota_cierre ?? ''))) $notes[] = "CIERRE: " . trim($item->nota_cierre);

            $observaciones_pila = implode(" | ", $notes);

            return [
                $item->id,
                $item->fecha_solicitud,
                $item->mes,
                $item->fecha_cargue,
                $item->fecha_descargue,
                $item->hora_cargue,
                $item->hora_descargue,
                $item->oridate,
                $item->saldate,
                $item->desdate,
                $item->findate,
                $item->sacnote,
                $item->responsable,
                $item->cliente,
                $item->origen,
                $item->destino,
                $item->ejecutivo,
                $item->tipo_vehiculo,
                $observaciones_pila, // Campo OBSERVACIONES actualizado
                $item->tipo_trayecto,
                $item->razon,
                $item->placa,
                $item->states
            ];
        });
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
