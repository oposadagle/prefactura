<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class DiariosExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $incluidos = (['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.']);
        $excluidos = (['Servicio finalizado', 'Servicio cancelado']);
        $startOfLastMonth = Carbon::now()->subMonth()->startOfMonth()->toDateString(); // Inicio del mes anterior
        $endOfCurrentMonth = Carbon::now()->endOfMonth()->toDateString(); // Fin del mes actual

        // Añade el return aquí y corrige 'states' a 'state'
        return DB::table('peticiones')
            ->select(
                'fecha_cargue',
                'razon',
                'paytype',
                'state',
                'cliente',
                'origen',
                'destino',
                'placa',
                'conductor',
                'asociado',
                'cedula_asociado',
                'pagarsaldo',
                'cedula_saldo',
                'tipo_vehiculo',
                'costo',
                'costo_tiposerv',
                'pago_completo',
                'observacion_pago',
                'anticipo',
                'estado_anticipo',
                'saldo',
                'saldo_final',
                'estado_saldo',
                'recibido_cumplido',
                'cumplido',
                'pagar_saldo',
                'tipo_pago',
                'fecha_envio'
            )
            ->where('enviado', 'SI')
            ->where('confirmado', 'NO')
            ->whereNotNull('razon')
            ->whereIn('paytype', $incluidos)
            ->whereNotIn('state', $excluidos) // Corregido 'states' a 'state'
            ->whereBetween('fecha_cargue', [$startOfLastMonth, $endOfCurrentMonth])
            ->orderBy('fecha_cargue', 'desc')
            ->get();
    }

    public function headings(): array
    {
        return [
            'FECHA_CARGUE',
            'MANIFIESTO',
            'CONDICION_PAGO',
            'ESTADO',
            'CLIENTE',
            'ORIGEN',
            'DESTINO',
            'PLACA',
            'CONDUCTOR',
            'PAGAR_ANTICIPO_A',
            'CEDULA_ANTICIPO',
            'PAGAR_SALDO_A',
            'CEDULA_SALDO',
            'TIPO_VEHICULO',
            'COSTO',
            'EXTRA',
            'PAGO_COMPLETO',
            'OBSERVACION_PAGO',
            'ANTICIPO',
            'ESTADO_ANTICIPO',
            'SALDO',
            'SALDO_FINAL',
            'ESTADO_SALDO',
            'RECIBIDO_CUMPLIDO',
            'CUMPLIDO',
            'PAGAR_SALDO',
            'TIPO_PAGO',
            'FECHA_ENVIO'
        ];
    }
}
