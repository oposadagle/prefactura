<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransitosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {        
        return DB::table('peticiones')
                    ->select('id','fecha_cargue','hora_cargue','fecha_descargue','nit','cliente','state','remesa','razon','origen','destino',
                             'tipo_trayecto','tipo_vehiculo','placa','conductor','cedula_conductor','telefono_conductor','usuario_gps',
                             'clave_gps','empresa_gps',)
                    ->where('trafico', 1)->get();
    }
    public function headings(): array
    {
        return [
            'ID',            
            'FECHA_CARGUE',
            'HORA_CARGUE',
            'FECHA_DESCARGUE', 
            'NIT',
            'CLIENTE',
            'ESTADO',
            'REMESA',            
            'MANIFIESTO',            
            'ORIGEN',
            'DESTINO',            
            'TIPO_TRAYECTO',
            'TIPO_VEHICULO',            
            'PLACA',            
            'CONDUCTOR',
            'CEDULA_CONDUCTOR',
            'TELEFONO_CONDUCTOR',
            'USUARIO_GPS',
            'CLAVE_GPS',
            'EMPRESA_GPS'
        ];
    }
}
