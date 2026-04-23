<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Carbon\Carbon;

class DiariosExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.', 'ANTICIPO NOCHE']);
        $excluidos = (['Servicio finalizado', 'Servicio cancelado']);
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString(); // Inicio del mes anterior
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual

        return DB::table('peticiones')
            ->select(
                'razon', 'fecha_cargue', 'paytype', 'nit', 'cliente', 'origen', 'destino', 'placa', 
                'conductor', 'pagant', 'cpagant', 'tpagant', 'pagsal', 'cpagsal', 'pagcon', 'cpagcon',
                'tipo_vehiculo', 'costo', 'costo_tiposerv', 'anticipo', 'pago_completo', 
                'centro_costo', 'reteica', 'retefuente', 'seguro', 'valor_a_pagar'
            )
            ->where('enviado', 'SI')
            ->where('confirmado', 'NO')
            ->whereNotNull('razon')
            ->whereIn('paytype', $incluidos)
            ->whereNotIn('states', $excluidos)
            ->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])
            ->orderBy('fecha_cargue', 'desc')
            ->get();
    }

    public function map($record): array
    {
        return [
            $record->razon,
            $record->fecha_cargue,
            $record->paytype,
            $record->nit,
            $record->cliente,
            strtoupper($record->origen),
            strtoupper($record->destino),
            $record->placa,
            strtoupper($record->conductor),
            $record->pagant,
            $record->cpagant,
            $record->tpagant,
            $record->pagsal,
            $record->cpagsal,
            $record->pagcon,
            $record->cpagcon,
            $record->tipo_vehiculo,
            $record->costo,
            $record->costo_tiposerv,
            $record->anticipo,
            $record->pago_completo,
            $record->centro_costo,
            $record->reteica,
            $record->retefuente,
            $record->seguro,
            $record->valor_a_pagar            
        ];
    }

    public function headings(): array
    {
        return [
            'MANIFIESTO', 'CARGUE', 'CONDICION DE PAGO', 'NIT', 'CLIENTE', 'ORIGEN', 'DESTINO', 'PLACA',
            'CONDUCTOR', 'PAGAR ANTICIPO A', 'CEDULA ANTICIPO', 'TELEFONO ANTICIPO', 'PAGAR SALDO A', 'CEDULA SALDO', 
            'PAGAR CONTADO A', 'CEDULA CONTADO', 'TIPO VEHICULO', 'COSTO', 'EXTRA', 'ANTICIPO', 'PAGO COMPLETO', 
            'CENTRO DE COSTO', 'RETEICA', 'RETEFUENTE', 'SEGURO', 'VALOR A PAGAR'
        ];
    }
}
