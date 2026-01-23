<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PrefacturasExport implements FromCollection, WithHeadings
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
        return DB::table('infoestatus')
            ->select(
                'id',
                'guia',
                'razon',
                'remesa',
                'radicado',
                'tipo_servicio',
                'fecha_solicitud',
                'nit',
                'cliente',
                'origen',
                'destino',
                'documento_cliente',
                'destinatario',
                'direccion',
                'piezas',
                'peso',
                'valor_declarado',
                'seguro_03',
                'tipo_vehiculo',
                'placa',
                'conductor',
                'asociado',
                'proveedores',
                'fecha_cargue',
                'causal',
                'causal_mas',
                'costo_flete',
                'costo_cardes',
                'costo_auxiliar',
                'costo_standby',
                'costo_montacarga',
                'costo_escolta',
                'costo_cs',
                'costo_monitoreo',
                'costo_estudio',
                'costo_prorateo',
                'costo_ampoliza',
                'sobrecosto_op',
                'costo_total',
                'seguros',
                'valor_cliente',
                'valor_sobrecosto',
                'valor_manejo',
                'valor_servicios',
                'valor_cobrar',
                'utilidad',
                'facturar',
                'plfpli',
                'factura_siigo',
                'fecha_siigo'
            )
            ->whereYear('fecha_cargue', $this->year)
            ->whereMonth('fecha_cargue', $this->month)
            ->where('facturar', 'SI')
            ->get()
            ->map(function ($item) {
                $item->valor_cobrar = round($item->valor_cobrar ?? 0);
                $item->utilidad = round($item->utilidad ?? 0);
                return $item;
            });
    }

    public function headings(): array
    {
        return [
            'ID',
            'GUIA',
            'MANIFIESTO',
            'REMESA',
            'RADICADO',
            'TIPO SERVICIO',
            'FECHA SOLICITUD',
            'NIT',
            'CLIENTE',
            'ORIGEN',
            'DESTINO',
            'DOCUMENTO CLIENTE',
            'DESTINATARIO',
            'DIRECCION',
            'PIEZAS',
            'PESO',
            'VALOR DECLARADO',
            'SEGURO 0.3',
            'TIPO VEHICULO',
            'PLACA',
            'CONDUCTOR',
            'PAGAR A',
            'PROVEEDORES',
            'FECHA CARGUE',
            'CAUSAL',
            'CAUSALMAS',
            'COSTO DE FLETE',
            'COSTO CARGUE Y DESCARGUE',
            'COSTO AUXILIAR',
            'COSTO STAND BY',
            'COSTO MONTACARGAS',
            'COSTO ESCOLTA',
            'COSTO CANDADO SATELITAL',
            'COSTO MONITOREO',
            'COSTO ESTUDIO SEGURIDAD',
            'COSTO PRORATEO POLIZA',
            'COSTO AMPLIACION POLIZA',
            'SOBRECOSTOS TRANSPORTADORA',
            'COSTO TOTAL',
            'SEGUROS',
            'VALOR EN FLETE',
            'VALOR SOBRE COSTOS',
            'VALOR COSTO MANEJO',
            'VALOR SERVICIOS COMP.',
            'VALOR POR COBRAR',
            'UTILIDAD',
            'RENTABILIDAD',
            'CONGELADO',
            'PLFPLI',
            'FACTURA SIIGO',
            'FECHA SIIGO'
        ];
    }
}
