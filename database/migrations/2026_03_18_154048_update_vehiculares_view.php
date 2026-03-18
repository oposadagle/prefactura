<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $sql = "CREATE OR REPLACE VIEW public.vehiculares AS
 SELECT id,
    placa,
    fecha_creacion,
    requisitos,
    estudio_seguridad,
    acuerdo_seguridad,
    evaluacion,
    nota_evaluacion,
    fecha_evaluacion,
    conductor,
    cedula_conductor,
    telefono_conductor,
    asociado,
    cedula_asociado,
    propietario,
    cedpro,
    corpro,
    dirpro,
    telpro,
    tenedor,
    nomten,
    cedten,
    corten,
    dirten,
    telten,
    facele,
    pagant,
    pagsal,
    pagcon,
    pagarsaldo,
    cedula_saldo,
    tipo_vehiculo,
    observacion,
    creado_contable,
    usuario_gps,
    clave_gps,
    empresa_gps,
    estudio3,
    rep_legal,
    cel_rep_legal,
    fec_nac_con,
    num_chasis,
    num_motor,
    ano_fabricacion,
    especificacion,
    soat,
    tecnomecanica,
    simur,
    simit,
    infracciones,
    ica,
        CASE
            WHEN compraventa = 'SI' AND fechacventa <= (CURRENT_DATE - '15 days'::interval) THEN 'INACTIVO'::text
            WHEN COALESCE(fecha_evaluacion, fecha_creacion) < (CURRENT_DATE - '1 year'::interval) THEN 'DESACTIVADO'::text
            WHEN COALESCE(requisitos, ''::character varying)::text <> 'SI'::text OR COALESCE(estudio_seguridad, ''::character varying)::text <> 'SI'::text OR COALESCE(acuerdo_seguridad, ''::character varying)::text <> 'SI'::text OR COALESCE(evaluacion, ''::character varying)::text <> 'SI'::text THEN 'NO CUMPLE'::text
            ELSE 'ACTIVO'::text
        END AS estado,
    create_user,
    update_user,
    created_at,
    updated_at
   FROM vehiculos";

        DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
