<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class PrefacturasExport implements FromCollection, WithHeadings
{
    use Exportable;

    protected $year;
    protected $month;

    public function __construct($year, $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function collection()
    {
        $startDate = sprintf('%04d-%02d-01', $this->year, $this->month);
        $endDate = date('Y-m-t', strtotime($startDate));

        $records = DB::table('infoestatus')
            ->select(
                'guia', 'razon', 'remesa', 'radicado', 'tipo_servicio',
                'cliente', 'origen', 'destino',
                'documento_cliente', 'destinatario', 'direccion', 'piezas',
                'peso', 'valor_declarado', 'tipo_vehiculo',
                'placa', 'conductor', 'asociado', 'proveedores',
                'fecha_cargue', 'causal', 'causal_mas', 'valor_cobrar'
            )
            ->whereBetween('fecha_cargue', [$startDate, $endDate])
            ->where('facturar', 'SI')
            ->orderBy('fecha_cargue', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        $rows = collect();

        foreach ($records as $record) {
            $radicados = explode('-', $record->radicado ?? '');
            $remesas = preg_split('/[\s-]+/', $record->remesa ?? '', -1, PREG_SPLIT_NO_EMPTY);

            $count = max(count($radicados), count($remesas));
            $valorCobrar = round(($record->valor_cobrar ?? 0) / $count);

            for ($i = 0; $i < $count; $i++) {
                $rows->push([
                    $record->guia,
                    $record->razon,
                    $remesas[$i] ?? '',
                    $radicados[$i] ?? '',
                    $record->tipo_servicio,
                    $record->cliente,
                    $record->origen,
                    $record->destino,
                    $record->documento_cliente,
                    $record->destinatario,
                    $record->direccion,
                    $record->piezas,
                    $record->peso,
                    $record->valor_declarado,
                    $record->tipo_vehiculo,
                    $record->placa,
                    $record->conductor,
                    $record->asociado,
                    $record->proveedores,
                    $record->fecha_cargue,
                    $record->causal,
                    $record->causal_mas,
                    $valorCobrar,
                ]);
            }
        }

        return $rows;
    }

    public function headings(): array
    {
        return [
            'GUIA', 'MANIFIESTO', 'REMESA', 'RADICADO', 'TIPO SERVICIO',
            'CLIENTE', 'ORIGEN', 'DESTINO',
            'DOCUMENTO CLIENTE', 'DESTINATARIO', 'DIRECCION', 'PIEZAS',
            'PESO', 'VALOR DECLARADO', 'TIPO VEHICULO',
            'PLACA', 'CONDUCTOR', 'PAGAR A', 'PROVEEDORES', 'FECHA CARGUE',
            'CAUSAL', 'CAUSALMAS', 'VALOR POR COBRAR'
        ];
    }
}
