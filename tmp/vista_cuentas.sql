 SELECT a.id,
    a.guia,
    b.verificado,
    b.pagada,
    b.fecha_envio,
    b.placa,
    b.cargaone,
    b.cargatwo,
    b.standby,
    b.costo_desplazamiento,
    c.ica,
    c.pagcon,
    c.cpagcon,
    c.tpagcon,
    b.cliente,
    b.soporte,
    b.avalado,
    b.pagado,
    b.razon,
    c.asociado,
    b.fecver
   FROM estatos o
     LEFT JOIN estatus a ON o.ide = a.ide
     LEFT JOIN solicitudes b ON a.id = b.id
     LEFT JOIN peticiones c ON a.id = c.id
  WHERE b.soporte IS NOT NULL;