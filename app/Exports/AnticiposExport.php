<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Carbon\Carbon;

class AnticiposExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $incluidos = ['PM. ANTICIPAR', 'AM. ANTICIPAR', 'CONTADO', 'CONTADO AM.', 'CONTADO PM.'];
        $festivos = [
            '2025-01-01', '2025-01-05', '2025-01-06', '2025-01-12', '2025-01-19', '2025-01-26', '2025-02-02', '2025-02-09',
            '2025-02-16', '2025-02-23', '2025-03-02', '2025-03-09', '2025-03-16', '2025-03-23', '2025-03-24', '2025-03-30', 
            '2025-04-06', '2025-04-13', '2025-04-17', '2025-04-18', '2025-04-20', '2025-04-27', '2025-05-01', '2025-05-04', 
            '2025-05-11', '2025-05-18', '2025-05-25', '2025-06-01', '2025-06-02', '2025-06-08', '2025-06-15', '2025-06-22', 
            '2025-06-23', '2025-06-29', '2025-06-30', '2025-07-06', '2025-07-13', '2025-07-20', '2025-07-27', '2025-08-03', 
            '2025-08-07', '2025-08-10', '2025-08-17', '2025-08-18', '2025-08-24', '2025-08-31', '2025-09-07', '2025-09-14', 
            '2025-09-21', '2025-09-28', '2025-10-05', '2025-10-12', '2025-10-13', '2025-10-19', '2025-10-26', '2025-11-02', 
            '2025-11-03', '2025-11-09', '2025-11-16', '2025-11-17', '2025-11-23', '2025-11-30', '2025-12-07', '2025-12-08', 
            '2025-12-14', '2025-12-21', '2025-12-25', '2025-12-28'
        ];

        $records = DB::table('peticiones')
            ->select(
                'id', 'fecha_cargue', 'razon', 'paytype', 'state', 'cliente', 'origen', 'destino', 'placa', 'conductor',
                'asociado', 'cedula_asociado','pagarsaldo','cedula_saldo','facele','tipo_vehiculo', 'costo', 'costo_tiposerv', 'pago_completo','observacion_pago',
                'anticipo', 'estado_anticipo','saldo', 'estado_saldo', 'recibido_cumplido', 'cumplido', 'pagar_saldo', 
                'tipo_pago', 'fecha_envio','estado_pago', 'carnote', 'orinote', 'salnote', 'desnote', 'finnote','cannote', 
                'tranote', 'egreso_anticipo','egreso_saldo', 'fecha_saldo', 'saldo_final'
            )
            ->whereIn('paytype', $incluidos)
            ->get();

        foreach ($records as $record) {
            $record->fecha_tentativa = $this->calcularFechaTentativa($record->fecha_envio, 9, $festivos);
        }

        return $records;
    }

    private function calcularFechaTentativa($fechaInicial, $diasHabiles, $festivos)
    {
        if (is_null($fechaInicial)) {
            return null;
        }

        $fecha = Carbon::parse($fechaInicial);
        $contador = 0;

        while ($contador < $diasHabiles) {
            $fecha->addDay();
            if (!in_array($fecha->toDateString(), $festivos)) {
                $contador++;
            }
        }

        return $fecha->toDateString();
    }

    public function headings(): array
    {
        return [
            'ID', 'FECHA CARGUE', 'MANIFIESTO', 'MEDIO DE PAGO', 'ESTADO', 'CLIENTE', 'ORIGEN', 'DESTINO', 'PLACA',
            'CONDUCTOR', 'PAGAR_ANTICIPO_A','CEDULA_ANTICIPO','PAGAR_SALDO_A','CEDULA_SALDO','FACT ELECTRONICA',
            'TIPO VEHICULO', 'COSTO', 'EXTRA', 'PAGO COMPLETO', 'OBSERVACION PAGO', 'ANTICIPO',
            'ESTADO ANTICIPO', 'SALDO', 'ESTADO SALDO', 'RECIBIDO CUMPLIDO', 'CUMPLIDO', 'PAGAR SALDO', 'TIPO PAGO',
            'FECHA ENVIO', 'ESTADO PAGO', 'NOTA CARGUE', 'NOTA LLEGADA ORIGEN', 'NOTA SALIDA', 'NOTA LLEGADA DESTINO',
            'NOTA SERVICIO FINALIZADO', 'NOTA SERVICIO CANCELADO', 'NOTA TRAFICO', 'EGRESO ANTICIPO', 'EGRESO SALDO',
            'FECHA SALDO', 'SALDO FINAL', 'FECHA TENTATIVA'
        ];
    }
}