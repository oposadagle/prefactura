<?php

namespace App\Exports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReporteExport implements FromCollection, WithHeadings
{
    protected $resultados;

    public function __construct(Collection $resultados)
    {
        $this->resultados = $resultados;
    }

    public function collection()
    {
        return $this->resultados;
    }

    public function headings(): array
    {
        return [
            'ID',
            'GUIA',
            'RAZON',
            'REMESA',
            'RADICADO',
            'NIT',
            'CLIENTE',
            'ORIGEN',
            'DESTINO_FINAL',
            'DOCUMENTO_CLIENTE',
            'DESTINATARIO',
            'DIRECCION',
            'PIEZAS',
            'PESO',
            'VALOR_DECLARADO',
            'TIPO_VEHICULO',
            'CARROCERIA',
            'PLACA',
            'CONDUCTOR',
            'ASOCIADO',
            'PROVEEDORES',
            'FECHA_CARGUE',
            'CAUSAL_MAS',
            'TIPO_SERVICIO',
            'COSTO_FLETE',
            'MONTO_COSTO',
            'COSTO_SEGURO',
            'COSTO_TIPOSERV',
            'COSTO_CARDES',
            'COSTO_AUXILIAR',
            'COSTO_STANDBY',
            'COSTO_MONTACARGA',
            'COSTO_ESCOLTA',
            'COSTO_CS',
            'COSTO_MONITOREO',
            'COSTO_ESTUDIO',
            'COSTO_AMPOLIZA',
            'SOBRECOSTO_OP',
            'SEGUROS',
            'VALOR_CLIENTE',
            'MONTO_SEGURO',
            'SEGURO_03',
            'VALOR_SOBRECOSTO',
            'VALOR_SERVICIOS',
            'VALOR_COBRAR',
            'UTILIDAD',
            'RENTABILIDAD',
            'FACTURAR',
            'PLFPLI',
            'FACTURA_SIIGO',
            'FECHA_SIIGO'
        ];
    }
}
