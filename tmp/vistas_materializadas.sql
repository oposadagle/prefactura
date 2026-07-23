-- ============================================================
-- SCRIPT PRODUCCION - Vistas Materializadas para performance
-- ============================================================

-- Vista materializada para masas
DROP MATERIALIZED VIEW IF EXISTS masas_mat;
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
GROUP BY (EXTRACT(year FROM masivas."FECHA")), (EXTRACT(month FROM masivas."FECHA")), masivas."CLIENTE", masivas."REGIONAL";

CREATE INDEX IF NOT EXISTS idx_masas_mat_ano ON masas_mat("AÑO");
CREATE INDEX IF NOT EXISTS idx_masas_mat_mes ON masas_mat("MES");
CREATE INDEX IF NOT EXISTS idx_masas_mat_ano_mes ON masas_mat("AÑO", "MES");

-- Vista materializada para utiles (basada en la estructura que usa el controlador)
DROP MATERIALIZED VIEW IF EXISTS utiles_mat;
CREATE MATERIALIZED VIEW utiles_mat AS
SELECT * FROM utiles;

CREATE INDEX IF NOT EXISTS idx_utiles_mat_ano ON utiles_mat("AÑO");
CREATE INDEX IF NOT EXISTS idx_utiles_mat_mes ON utiles_mat("MES");
CREATE INDEX IF NOT EXISTS idx_utiles_mat_ano_mes ON utiles_mat("AÑO", "MES");
