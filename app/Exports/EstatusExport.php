<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EstatusExport implements FromCollection, WithHeadings
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
        return DB::table('infoestatus')
            ->select(
                'id',
                'guia',
                'razon',
                'remesa',
                'radicado',
                'nit',
                'fecha_solicitud',
                'cliente',
                'origen',
                'destino_final',
                'documento_cliente',
                'destinatario',
                'direccion',
                'piezas',
                'peso',
                'valor_declarado',
                'tipo_vehiculo',
                'carroceria',
                'placa',
                'conductor',
                'asociado',
                'proveedores',
                'fecha_cargue',
                'causal_mas',
                'tipo_servicio',
                'nota_servicio',
                'costo_flete',
                'desconductor',
                'monto_costo',
                'costo_seguro',
                'costo_tiposerv',
                'pcyd',
                'costo_cardes',
                'paux',
                'costo_auxiliar',
                'psby',
                'costo_standby',
                'pmtc',
                'costo_montacarga',
                'pesc',
                'costo_escolta',
                'pcas',
                'costo_cs',
                'pmon',
                'costo_monitoreo',
                'pesg',
                'costo_estudio',
                'costo_ampoliza',
                'sobrecosto_op',
                'seguros',
                'costo_total',
                'valor_cliente',
                'monto_seguro',
                'seguro_03',
                'valor_sobrecosto',
                'valor_servicios',
                'valor_cobrar',
                'utilidad',
                'rentabilidad',
                'facturar',
                'plfpli',
                'carnote',
                'dcf',
                'dts',
                'dcyd',
                'dpaux',
                'dpsby',
                'dpmtc',
                'dpesc',
                'dpcas',
                'dpmon',
                'dpesg',
                'dst',
                'egreso_anticipo',
                'egreso_saldo',
                'fecha_saldo'
            )
            ->whereYear('fecha_cargue', $this->year)
            ->when($this->month !== 'todos', function ($query) {
                return $query->whereMonth('fecha_cargue', $this->month);
            })
            ->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'GUIA',
            'MANIFIESTO',
            'REMESA',
            'RADICADO',
            'NIT',
            'FECHA_SOLICITUD',
            'CLIENTE',
            'ORIGEN',
            'DESTINO',
            'DOCUMENTO CLIENTE',
            'DESTINATARIO',
            'DIRECCION',
            'PIEZAS',
            'PESO',
            'VALOR DECLARADO',
            'TIPO VEHICULO',
            'TIPO CARROCERIA',
            'PLACA',
            'CONDUCTOR',
            'PAGAR A:',
            'PROVEEDORES',
            'FECHA CARGUE',
            'CAUSAL+',
            'TIPO SERVICIO',
            'NOTA SERVICIO',
            'COSTO DE FLETE',
            'DESCUENTO CONDUCTOR',
            '% COSTO SEGURO',
            'COSTO SEGURO',
            'COSTO TIPO SERVICIO',
            'PCYD1',
            'COSTO CARGUE Y DESCARGUE1',
            'PCYD2',
            'COSTO CARGUE Y DESCARGUE2',
            'PSBY',
            'COSTO STAND BY',
            'PMTC',
            'COSTO MONTACARGAS',
            'PESC',
            'COSTO ESCOLTA',
            'PCAS',
            'COSTO CANDADO SATELITAL',
            'PMON',
            'COSTO MONITOREO',
            'PESG',
            'COSTO ESTUDIO SEGURIDAD',
            'COSTO AMPLIACION POLIZA',
            'SOBRECOSTOS TRANSPORTADORA',
            'SEGURO VEHICULO',
            'COSTO TOTAL',
            'VALOR FACTURAR EN FLETE',
            '% FACTURAR SEGURO',
            'VALOR COBRAR_EN SEGURO',
            'VALOR COBRAR SOBRECOSTOS',
            'VALOR SERVICIOS COMP.',
            'VALOR TOTAL_A COBRAR',
            'UTILIDAD',
            'RENTABILIDAD',
            'CONGELADO',
            'PLF-PLI',
            'NOTA DE CARGUE',
            'DOCUMENTO COSTO FLETE',
            'DOCUMENTO TIPO SERVICIO',
            'DOCUMENTO CYD 1',
            'DOCUMENTO CYD 2',
            'DOCUMENTO STANDBY',
            'DOCUMENTO MONTACARGA',
            'DOCUMENTO ESCOLTA',
            'DOCUMENTO CANDADO SATELITAL',
            'DOCUMENTO MONITOREO',
            'DOCUMENTO ESTUDIO SEGURIDAD',
            'DOCUMENTO SOBRECOSTO TRANSPORTE',
            'EGRESO ANTICIPO',
            'EGRESO SALDO',
            'FECHA PAGO SALDO'
        ];
    }
}
