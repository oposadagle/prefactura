<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE TEMP TABLE _saved_views AS
            SELECT DISTINCT dv.relname AS name, pg_get_viewdef(dv.oid, true) AS def
            FROM pg_depend
            JOIN pg_rewrite ON pg_depend.objid = pg_rewrite.oid
            JOIN pg_class AS dv ON pg_rewrite.ev_class = dv.oid
            JOIN pg_class AS st ON pg_depend.refobjid = st.oid
            JOIN pg_attribute ON pg_depend.refobjid = pg_attribute.attrelid
                AND pg_depend.refobjsubid = pg_attribute.attnum
            WHERE st.relname = 'vehiculos'
                AND pg_attribute.attname = 'especificacion'
                AND dv.relname != 'vehiculares'
        ");

        DB::statement("
            DO \$\$
            DECLARE
                r record;
            BEGIN
                FOR r IN SELECT name FROM _saved_views LOOP
                    EXECUTE 'DROP VIEW IF EXISTS ' || r.name || ' CASCADE';
                END LOOP;
            END
            \$\$;
        ");

        DB::statement('DROP VIEW IF EXISTS vehiculares CASCADE');

        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion DROP DEFAULT');
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion TYPE integer USING especificacion::integer');
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion SET DEFAULT 0');

        $this->recreateVehicularesView();

        $this->recreateSavedViews();
    }

    public function down(): void
    {
        DB::statement("
            CREATE TEMP TABLE _saved_views AS
            SELECT DISTINCT dv.relname AS name, pg_get_viewdef(dv.oid, true) AS def
            FROM pg_depend
            JOIN pg_rewrite ON pg_depend.objid = pg_rewrite.oid
            JOIN pg_class AS dv ON pg_rewrite.ev_class = dv.oid
            JOIN pg_class AS st ON pg_depend.refobjid = st.oid
            JOIN pg_attribute ON pg_depend.refobjid = pg_attribute.attrelid
                AND pg_depend.refobjsubid = pg_attribute.attnum
            WHERE st.relname = 'vehiculos'
                AND pg_attribute.attname = 'especificacion'
                AND dv.relname != 'vehiculares'
        ");

        DB::statement("
            DO \$\$
            DECLARE
                r record;
            BEGIN
                FOR r IN SELECT name FROM _saved_views LOOP
                    EXECUTE 'DROP VIEW IF EXISTS ' || r.name || ' CASCADE';
                END LOOP;
            END
            \$\$;
        ");

        DB::statement('DROP VIEW IF EXISTS vehiculares CASCADE');

        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion DROP DEFAULT');
        DB::statement('ALTER TABLE vehiculos ALTER COLUMN especificacion TYPE varchar(20) USING especificacion::varchar');
        DB::statement("ALTER TABLE vehiculos ALTER COLUMN especificacion SET DEFAULT ''");

        $this->recreateVehicularesView();

        $this->recreateSavedViews();
    }

    private function recreateVehicularesView(): void
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

    private function recreateSavedViews(): void
    {
        $remaining = DB::select("SELECT * FROM _saved_views");
        $maxAttempts = 20;

        while (!empty($remaining) && $maxAttempts > 0) {
            $maxAttempts--;
            $stillRemaining = [];

            foreach ($remaining as $row) {
                try {
                    DB::statement('CREATE OR REPLACE VIEW ' . $row->name . ' AS ' . $row->def);
                } catch (\Exception $e) {
                    $stillRemaining[] = $row;
                }
            }

            $remaining = $stillRemaining;
        }

        DB::statement('DROP TABLE IF EXISTS _saved_views');
    }
};
