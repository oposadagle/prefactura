 SELECT id,
    razon AS mlog,
    EXTRACT(year FROM fecha_cargue) AS anio,
    EXTRACT(month FROM fecha_cargue) AS mes,
    anticipo,
    saldo_final,
    estado_anticipo,
    estado_saldo,
    estado_pago,
    fecha_envio
   FROM peticiones
  WHERE (paytype::text = ANY (ARRAY['PM. ANTICIPAR'::character varying::text, 'AM. ANTICIPAR'::character varying::text, 'CONTADO'::character varying::text, 'CONTADO AM.'::character varying::text, 'CONTADO PM.'::character varying::text])) AND fecha_cargue >= '2024-10-01'::date AND razon::text ~~ 'MLOG%'::text;