<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HistoricosExport implements FromCollection, WithHeadings
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
        $incluidos = ['Servicio finalizado', 'Servicio cancelado'];

        return DB::table('peticiones')
                    ->select('id','fecha_solicitud','fecha_cargue','hora_cargue','fecha_descargue','hora_descargue','nit','cliente','origen','destino','ejecutivo',
                             'tipo_vehiculo','tipo_trayecto','placa','costo','conductor','cedula_conductor','telefono_conductor','usuario_gps','clave_gps',
                             'empresa_gps','states','paytype','sucursal','remesa','radicado','retorno','razon','oriuser','oridate','orinote','saluser','saldate','salnote',
                             'desuser','desdate','desnote','finuser','findate','finnote','nota_cierre','canuser','candate','cannote')
                    ->whereIn('states', $incluidos)
                    ->whereYear('fecha_cargue', $this->year)
                    ->whereMonth('fecha_cargue', $this->month)
                    ->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'FECHA_SOLICITUD',
            'FECHA_CARGUE',
            'HORA_CARGUE',
            'FECHA_DESCARGUE',
            'HORA_DESCARGUE',
            'NIT',
            'CLIENTE',
            'ORIGEN',
            'DESTINO',
            'EJECUTIVO',
            'TIPO_VEHICULO',
            'TIPO_TRAYECTO',
            'PLACA',
            'COSTO',
            'CONDUCTOR',
            'CEDULA_CONDUCTOR',
            'TELEFONO_CONDUCTOR',
            'USUARIO_GPS',
            'CLAVE_GPS',
            'EMPRESA_GPS',
            'ESTADO',            
            'CONDICION_DE_PAGO',
            'SUCURSAL',          
            'REMESA',
            'RADICADO',
            'PEDIDO',
            'MANIFIESTO',
            'USUARIO_LLEGADA_ORIGEN',
            'FECHA_LLEGADA_ORIGEN',
            'NOTA_LLEGADA_ORIGEN',            
            'USUARIO_SALIDA',
            'FECHA_SALIDA',
            'NOTA_SALIDA',            
            'USUARIO_LLEGADA_DESTINO',
            'FECHA_LLEGADA_DESTINO',
            'NOTA_LLEGADA_DESTINO',            
            'USUARIO_SERVICIO_FINALIZADO',
            'FECHA_SERVICIO_FINALIZADO',
            'NOTA_SERVICIO_FINALIZADO',
            'NOTA CIERRE',
            'USUARIO_SERVICIO_CANCELADO',
            'FECHA_SERVICIO_CANCELADO',
            'NOTA_SERVICIO_CANCELADO'
        ];
    }
}
