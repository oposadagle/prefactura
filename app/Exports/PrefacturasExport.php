<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;

class PrefacturasExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    protected $year;
    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function query()
    {
        $startDate = sprintf('%04d-%02d-01', $this->year, $this->month);
        $endDate = date('Y-m-t', strtotime($startDate));

        return DB::table('infoestatus')
            ->select(
                'id', 'guia', 'razon', 'remesa', 'radicado', 'tipo_servicio',
                'fecha_solicitud', 'nit', 'cliente', 'origen', 'destino',
                'documento_cliente', 'destinatario', 'direccion', 'piezas',
                'peso', 'valor_declarado', 'seguro_03', 'tipo_vehiculo',
                'placa', 'conductor', 'asociado', 'proveedores',
                'fecha_cargue', 'causal', 'causal_mas', 'costo_flete',
                'costo_cardes', 'costo_auxiliar', 'costo_standby',
                'costo_montacarga', 'costo_escolta', 'costo_cs',
                'costo_monitoreo', 'costo_estudio', 'costo_prorateo',
                'costo_ampoliza', 'sobrecosto_op', 'costo_total',
                'seguros', 'valor_cliente', 'valor_sobrecosto',
                'valor_manejo', 'valor_servicios', 'valor_cobrar',
                'facturar', 'factura_siigo', 'fecha_siigo'
            )
            ->whereBetween('fecha_cargue', [$startDate, $endDate])
            ->where('facturar', 'SI')
            ->orderBy('fecha_cargue', 'asc')
            ->orderBy('id', 'asc');
    }

    public function map($record): array
    {
        $record->valor_cobrar = round($record->valor_cobrar ?? 0);
        $record->utilidad = round($record->utilidad ?? 0);

        return [
            $record->id,
            $record->guia,
            $record->razon,
            $record->remesa,
            $record->radicado,
            $record->tipo_servicio,
            $record->fecha_solicitud,
            $record->nit,
            $record->cliente,
            $record->origen,
            $record->destino,
            $record->documento_cliente,
            $record->destinatario,
            $record->direccion,
            $record->piezas,
            $record->peso,
            $record->valor_declarado,
            $record->seguro_03,
            $record->tipo_vehiculo,
            $record->placa,
            $record->conductor,
            $record->asociado,
            $record->proveedores,
            $record->fecha_cargue,
            $record->causal,
            $record->causal_mas,
            $record->costo_flete,
            $record->costo_cardes,
            $record->costo_auxiliar,
            $record->costo_standby,
            $record->costo_montacarga,
            $record->costo_escolta,
            $record->costo_cs,
            $record->costo_monitoreo,
            $record->costo_estudio,
            $record->costo_prorateo,
            $record->costo_ampoliza,
            $record->sobrecosto_op,
            $record->costo_total,
            $record->seguros,
            $record->valor_cliente,
            $record->valor_sobrecosto,
            $record->valor_manejo,
            $record->valor_servicios,
            $record->valor_cobrar,
            $record->facturar,
            $record->factura_siigo,
            $record->fecha_siigo
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function headings(): array
    {
        return [
            'ID', 'GUIA', 'MANIFIESTO', 'REMESA', 'RADICADO', 'TIPO SERVICIO',
            'FECHA SOLICITUD', 'NIT', 'CLIENTE', 'ORIGEN', 'DESTINO',
            'DOCUMENTO CLIENTE', 'DESTINATARIO', 'DIRECCION', 'PIEZAS',
            'PESO', 'VALOR DECLARADO', 'SEGURO 0.3', 'TIPO VEHICULO',
            'PLACA', 'CONDUCTOR', 'PAGAR A', 'PROVEEDORES', 'FECHA CARGUE',
            'CAUSAL', 'CAUSALMAS', 'COSTO DE FLETE', 'COSTO CARGUE Y DESCARGUE',
            'COSTO AUXILIAR', 'COSTO STAND BY', 'COSTO MONTACARGAS',
            'COSTO ESCOLTA', 'COSTO CANDADO SATELITAL', 'COSTO MONITOREO',
            'COSTO ESTUDIO SEGURIDAD', 'COSTO PRORATEO POLIZA',
            'COSTO AMPLIACION POLIZA', 'SOBRECOSTOS TRANSPORTADORA',
            'COSTO TOTAL', 'SEGUROS', 'VALOR EN FLETE', 'VALOR SOBRE COSTOS',
            'VALOR COSTO MANEJO', 'VALOR SERVICIOS COMP.', 'VALOR POR COBRAR',
            'CONGELADO', 'FACTURA SIIGO', 'FECHA SIIGO'
        ];
    }
}
