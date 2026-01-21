<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VehiculosExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('vehiculares')
            ->select([
                'placa',
                'fecha_creacion',
                'fecha_evaluacion',
                'estado',
                'conductor',
                'cedula_conductor',
                'telefono_conductor',
                'propietario',
                'cedpro',
                'corpro',
                'dirpro',
                'telpro',
                'tenedor',
                'nomten',
                'cedten',
                'corten',
                'dirten',
                'telten',
                'facele',
                'pagant',
                'pagsal',
                'pagcon',
                'tipo_vehiculo',
                'requisitos',
                'estudio_seguridad',
                'acuerdo_seguridad',
                'evaluacion',
                'nota_evaluacion',
                'creado_contable',
                'usuario_gps',
                'clave_gps',
                'empresa_gps',
                'estudio3',
                'fec_nac_con',
                'num_chasis',
                'num_motor',
                'ano_fabricacion',
                'especificacion',
                'soat',
                'tecnomecanica',
                'simur',
                'simit',
                'infracciones',
                'observacion',
                'create_user',
                'update_user',
                'created_at',
                'updated_at'
            ])
            ->get();
    }

    public function headings(): array
    {
        return [
            'PLACA',
            'CREACION',
            'EVALUACION',
            'ESTADO',
            'CONDUCTOR',
            'CEDULA_CONDUCTOR',
            'TELEFONO_CONDUCTOR',
            'PROPIETARIO',
            'CEDULA_PROPIETARIO',
            'CORREO_PROPIETARIO',
            'DIRECCION_PROPIETARIO',
            'TELEFONO_PROPIETARIO',
            'TENEDOR',
            'NOMBRE_TENEDOR',
            'CEDULA_TENEDOR',
            'CORREO_TENEDOR',
            'DIRECCION_TENEDOR',
            'TELEFONO_TENEDOR',
            'FACTURA_ELECTRONICA',
            'PAGAR_ANTICIPO_A',
            'PAGAR_SALDO_A',
            'PAGAR_CONTADO_A',
            'TIPO_VEHICULO',
            'REQUISITOS',
            'ESTUDIO SEGURIDAD',
            'ACUERDO SEGURIDAD',
            'REEVALUACION',
            'NOTAS EVALUACION',
            'CREADO_CONTABLE',
            'USUARIO_GPS',
            'CLAVE_GPS',
            'EMPRESA_GPS',
            'ESTUDIO 3+',
            'FECHA NAC CONDUCTOR',
            'NUMERO CHASIS',
            'NUMERO MOTOR',
            'AÑO FABRICACION',
            'ESPECIFICACION',
            'SOAT',
            'TECNOMECANICA',
            'SIMUR',
            'SIMIT',
            'INFRACCIONES',
            'OBSERVACIONES',
            'CREA',
            'FECHA CREA',
            'ACTUALIZA',
            'FECHA ACTUALIZA'
        ];
    }
}
