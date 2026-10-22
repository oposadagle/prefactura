<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('DROP MATERIALIZED VIEW IF EXISTS masas_mat');

        $createMasas = <<<'SQL'
CREATE MATERIALIZED VIEW masas_mat AS
SELECT EXTRACT(year FROM masivos.fecha) AS "AÑO",
    EXTRACT(month FROM masivos.fecha) AS "MES",
    count(masivos.guia) AS "CANTIDAD_GUIAS",
    masivos.cliente AS "CLIENTE",
    'BOGOTA'::character varying AS "REGIONAL",
    sum(masivos.total_gle) AS "TOTAL_GLE",
    sum(masivos.total_proveedor) AS "TOTAL_PROVEEDOR",
    round((sum(masivos.total_gle) - sum(masivos.total_proveedor))::numeric / NULLIF(sum(masivos.total_gle), 0)::numeric * 100::numeric, 2) AS "UTILIDAD"
FROM masivos
GROUP BY (EXTRACT(year FROM masivos.fecha)), (EXTRACT(month FROM masivos.fecha)), masivos.cliente
UNION ALL
SELECT EXTRACT(year FROM masivas."FECHA") AS "AÑO",
    EXTRACT(month FROM masivas."FECHA") AS "MES",
    count(masivas."GUIA") AS "CANTIDAD_GUIAS",
    masivas."CLIENTE",
    CASE
        WHEN UPPER(BTRIM(masivas."REGIONAL")) = 'BOGOTÁ' THEN 'BOGOTA'
        ELSE UPPER(BTRIM(masivas."REGIONAL"))
    END AS "REGIONAL",
    sum(masivas."TOTAL_GLE") AS "TOTAL_GLE",
    sum(masivas."TOTAL_PROVEEDOR") AS "TOTAL_PROVEEDOR",
    round((sum(masivas."TOTAL_GLE") - sum(masivas."TOTAL_PROVEEDOR")) / NULLIF(sum(masivas."TOTAL_GLE"), 0::numeric) * 100::numeric, 2) AS "UTILIDAD"
FROM masivas
GROUP BY (EXTRACT(year FROM masivas."FECHA")), (EXTRACT(month FROM masivas."FECHA")), masivas."CLIENTE",
    CASE
        WHEN UPPER(BTRIM(masivas."REGIONAL")) = 'BOGOTÁ' THEN 'BOGOTA'
        ELSE UPPER(BTRIM(masivas."REGIONAL"))
    END
SQL;

        DB::statement($createMasas);
        DB::statement('CREATE UNIQUE INDEX IF NOT EXISTS idx_masas_mat_unique ON masas_mat("AÑO", "MES", "CLIENTE", "REGIONAL")');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mat_ano ON masas_mat("AÑO")');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mat_mes ON masas_mat("MES")');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mat_ano_mes ON masas_mat("AÑO", "MES")');
    }

    public function down(): void
    {
        DB::statement('DROP MATERIALIZED VIEW IF EXISTS masas_mat');

        $createMasas = <<<'SQL'
CREATE MATERIALIZED VIEW masas_mat AS
SELECT EXTRACT(year FROM masivos.fecha) AS "AÑO",
    EXTRACT(month FROM masivos.fecha) AS "MES",
    count(masivos.guia) AS "CANTIDAD_GUIAS",
    masivos.cliente AS "CLIENTE",
    'BOGOTA'::character varying AS "REGIONAL",
    sum(masivos.total_gle) AS "TOTAL_GLE",
    sum(masivos.total_proveedor) AS "TOTAL_PROVEEDOR",
    round((sum(masivos.total_gle) - sum(masivos.total_proveedor))::numeric / NULLIF(sum(masivos.total_gle), 0)::numeric * 100::numeric, 2) AS "UTILIDAD"
FROM masivos
GROUP BY (EXTRACT(year FROM masivos.fecha)), (EXTRACT(month FROM masivos.fecha)), masivos.cliente
UNION ALL
SELECT EXTRACT(year FROM masivas."FECHA") AS "AÑO",
    EXTRACT(month FROM masivas."FECHA") AS "MES",
    count(masivas."GUIA") AS "CANTIDAD_GUIAS",
    masivas."CLIENTE",
    masivas."REGIONAL",
    sum(masivas."TOTAL_GLE") AS "TOTAL_GLE",
    sum(masivas."TOTAL_PROVEEDOR") AS "TOTAL_PROVEEDOR",
    round((sum(masivas."TOTAL_GLE") - sum(masivas."TOTAL_PROVEEDOR")) / NULLIF(sum(masivas."TOTAL_GLE"), 0::numeric) * 100::numeric, 2) AS "UTILIDAD"
FROM masivas
GROUP BY (EXTRACT(year FROM masivas."FECHA")), (EXTRACT(month FROM masivas."FECHA")), masivas."CLIENTE", masivas."REGIONAL"
SQL;

        DB::statement($createMasas);
        DB::statement('CREATE UNIQUE INDEX IF NOT EXISTS idx_masas_mat_unique ON masas_mat("AÑO", "MES", "CLIENTE", "REGIONAL")');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mat_ano ON masas_mat("AÑO")');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mat_mes ON masas_mat("MES")');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mat_ano_mes ON masas_mat("AÑO", "MES")');
    }
};
