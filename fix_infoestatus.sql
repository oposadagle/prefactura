CREATE OR REPLACE VIEW public.infoestatus
 AS
 SELECT a.id,
    a.guia,
    a.documento_cliente,
    a.destinatario,
    a.direccion,
    a.piezas,
    a.peso,
    a.valor_declarado,
    a.monto_seguro,
    a.monto_costo,
    a.seguro_03,
    a.costo_seguro,
    a.costo_tiposerv,
        CASE
            WHEN f.cargaone <> 0 AND f.avalado = true THEN f.cargaone
            ELSE a.costo_cardes
        END AS costo_cardes,
        CASE
            WHEN f.cargatwo <> 0 AND f.avalado = true THEN f.cargatwo
            ELSE a.costo_auxiliar
        END AS costo_auxiliar,
        CASE
            WHEN f.standby <> 0 AND f.avalado = true THEN f.standby
            ELSE a.costo_standby
        END AS costo_standby,
    a.costo_montacarga,
    a.costo_escolta,
    a.costo_cs,
    a.costo_monitoreo,
    a.costo_estudio,
    a.costo_prorateo,
    a.costo_ampoliza,
    a.sobrecosto_op,
    a.transportadora,
    a.causal,
    a.causal_mas,
    a.seguro,
    a.proveedores,
    a.tipo_servicio,
    a.nota_servicio,
    a.seguros,
    a.valor_cliente,
    a.valor_sobrecosto,
    a.valor_manejo,
    a.valor_servicios,
    a.valor_cobrar,
    a.facturar,
    a.ffacturar,
        CASE
            WHEN a.factura_siigo IS NOT NULL THEN 'SI'::text
            ELSE 'NO'::text
        END AS facturaro,
    a.plfpli,
    b.carnote,
    a.ide,
    a.factura_siigo,
    a.fecha_siigo,
    a.created_at,
    a.updated_at,
    COALESCE(a.costo_flete, 0)::numeric + COALESCE(a.monto_costo, 0::numeric) + COALESCE(a.costo_seguro, 0::numeric) + COALESCE(a.costo_tiposerv, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.cargaone
            ELSE a.costo_cardes
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.cargatwo
            ELSE a.costo_auxiliar
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.standby
            ELSE a.costo_standby
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.costo_desplazamiento
            ELSE 0
        END, 0)::numeric + COALESCE(a.costo_montacarga, 0)::numeric + COALESCE(a.costo_escolta, 0)::numeric + COALESCE(a.costo_cs, 0)::numeric + COALESCE(a.costo_monitoreo, 0)::numeric + COALESCE(a.costo_estudio, 0)::numeric + COALESCE(a.costo_ampoliza, 0)::numeric + COALESCE(a.sobrecosto_op, 0)::numeric - COALESCE(a.desconductor, 0)::numeric AS costo_total,
    a.valor_cobrar - (COALESCE(a.costo_flete, 0)::numeric + COALESCE(a.monto_costo, 0::numeric) + COALESCE(a.costo_seguro, 0::numeric) + COALESCE(a.costo_tiposerv, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.cargaone
            ELSE a.costo_cardes
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.cargatwo
            ELSE a.costo_auxiliar
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.standby
            ELSE a.costo_standby
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.costo_desplazamiento
            ELSE 0
        END, 0)::numeric + COALESCE(a.costo_montacarga, 0)::numeric + COALESCE(a.costo_escolta, 0)::numeric + COALESCE(a.costo_cs, 0)::numeric + COALESCE(a.costo_monitoreo, 0)::numeric + COALESCE(a.costo_estudio, 0)::numeric + COALESCE(a.costo_ampoliza, 0)::numeric + COALESCE(a.sobrecosto_op, 0)::numeric - COALESCE(a.desconductor, 0)::numeric) AS utilidad,
    round(COALESCE((a.valor_cobrar - (COALESCE(a.costo_flete, 0)::numeric + COALESCE(a.monto_costo, 0::numeric) + COALESCE(a.costo_seguro, 0::numeric) + COALESCE(a.costo_tiposerv, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.cargaone
            ELSE a.costo_cardes
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.cargatwo
            ELSE a.costo_auxiliar
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.standby
            ELSE a.costo_standby
        END, 0)::numeric + COALESCE(
        CASE
            WHEN e.ide IS NOT NULL THEN e.costo_desplazamiento
            ELSE 0
        END, 0)::numeric + COALESCE(a.costo_montacarga, 0)::numeric + COALESCE(a.costo_escolta, 0)::numeric + COALESCE(a.costo_cs, 0)::numeric + COALESCE(a.costo_monitoreo, 0)::numeric + COALESCE(a.costo_estudio, 0)::numeric + COALESCE(a.costo_ampoliza, 0)::numeric + COALESCE(a.sobrecosto_op, 0)::numeric - COALESCE(a.desconductor, 0)::numeric)) / NULLIF(a.valor_cobrar, 0::numeric) * 100::numeric, 0::numeric))::integer AS rentabilidad,
    b.remesa,
    b.remesa_proveedor,
    b.radicado,
    b.retorno,
    b.razon,
    b.manifiesto,
    b.fecha_solicitud,
    b.cliente,
    b.origen,
    b.destino,
    a.destino_real,
    COALESCE(a.destino_real, b.destino) AS destino_final,
    b.tipo_vehiculo,
    b.carroceria,
    b.placa,
    c.conductor,
    c.asociado,
    b.fecha_cargue,
    a.costo_flete,
    a.desconductor,
    d.nit,
    d.estado,
    d.fecha_cierre,
    d.frecuencia,
        CASE
            WHEN f.cargaone IS NOT NULL AND f.cargaone <> 0 THEN
            CASE
                WHEN c.pagcon::text = 'TENEDOR'::text THEN c.nomten
                WHEN c.pagcon::text = 'PROPIETARIO'::text THEN c.propietario
                WHEN c.pagcon::text = 'CONDUCTOR'::text THEN c.conductor
                ELSE a.pcyd
            END
            ELSE a.pcyd
        END::character varying(50) AS pcyd,
        CASE
            WHEN f.standby IS NOT NULL AND f.standby <> 0 AND f.avalado = true THEN
            CASE
                WHEN c.pagcon::text = 'TENEDOR'::text THEN c.nomten
                WHEN c.pagcon::text = 'PROPIETARIO'::text THEN c.propietario
                WHEN c.pagcon::text = 'CONDUCTOR'::text THEN c.conductor
                ELSE a.psby
            END
            ELSE a.psby
        END::character varying(50) AS psby,
    a.pmtc,
    a.pesc,
    a.pcas,
    a.pmon,
    a.pesg,
        CASE
            WHEN f.cargatwo IS NOT NULL AND f.cargatwo <> 0 THEN
            CASE
                WHEN c.pagcon::text = 'TENEDOR'::text THEN c.nomten
                WHEN c.pagcon::text = 'PROPIETARIO'::text THEN c.propietario
                WHEN c.pagcon::text = 'CONDUCTOR'::text THEN c.conductor
                ELSE a.paux
            END
            ELSE a.paux
        END::character varying(50) AS paux,
    a.dst,
    a.dpesg,
    a.dpmon,
    a.dpcas,
    a.dpesc,
    a.dpmtc,
    a.dpsby,
    a.dpaux,
    a.dcyd,
    a.dts,
    a.dcf,
    a.fecha_saldo,
    a.egreso_saldo,
    a.egreso_anticipo,
        CASE
            WHEN e.ide IS NOT NULL THEN e.costo_desplazamiento
            ELSE 0
        END AS costo_desplazamiento,
        CASE
            WHEN e.ide IS NOT NULL THEN e.cedula
            ELSE 0
        END AS cedula,
        CASE
            WHEN f.costo_desplazamiento IS NOT NULL AND f.costo_desplazamiento <> 0 AND f.avalado = true THEN
            CASE
                WHEN c.pagcon::text = 'TENEDOR'::text THEN c.nomten
                WHEN c.pagcon::text = 'PROPIETARIO'::text THEN c.propietario
                WHEN c.pagcon::text = 'CONDUCTOR'::text THEN c.conductor
                ELSE NULL::character varying
            END
            ELSE ''::character varying
        END::character varying(50) AS pcd,
    b.regional
   FROM estatus a
     LEFT JOIN solicitudes b ON a.id = b.id
     LEFT JOIN vehiculos c ON b.placa::text = c.placa::text
     LEFT JOIN clientesa d ON b.cliente::text = d.nombre::text
     LEFT JOIN verificados e ON a.ide = e.ide
     LEFT JOIN (
        SELECT DISTINCT ON (ide) *
        FROM estatos
        ORDER BY ide, avalado DESC, cargaone DESC
     ) f ON a.ide = f.ide;
