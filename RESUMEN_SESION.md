# Contexto de sesión — Módulo de Novedades (GLE Prefactura)

> Documento de handoff para continuar en una próxima sesión.
> Aplicación: Laravel + PostgreSQL.
> Vistas principales involucradas: `/solicitud`, `/anticipos`, `/anticipo`, `/saldos`, `/historico-pagos`, `/congelado`, `/historico`, `/infoestatus`, `/vehiculo`.

---

## 1. Tabla `novedades`

Tabla creada para registrar las novedades de los servicios (manifiestos).

| Campo | Tipo | Notas |
|---|---|---|
| `id` | bigserial PK | |
| `ide` | bigint | id de la solicitud (`solicitudes.id`) |
| `ide_aplicado` | bigint nullable | **nuevo** — servicio destino al que se traslada un ACUERDO DE PAGO |
| `placa` | varchar nullable | **nuevo** — placa del servicio al crear la novedad |
| `manifiesto` | varchar | `razon` de la solicitud |
| `manifiesto_origen` | varchar nullable | **nuevo** — manifiesto de donde viene un `DESCUENTO` (origen) |
| `tipo_novedad` | varchar | ver lista abajo |
| `clase_novedad` | varchar nullable | CONGELAR/DESCONGELAR, DEVOLUCION TOTAL/PARCIAL, etc. |
| `valor` | integer | valor de la novedad |
| `valor_faltante` | integer default 0 | monto que quedó como deuda (faltante) |
| `cuotas` | integer default 0 | 0–3 |
| `nota` | varchar(1000) | |
| `soporte` | text | archivo codificado en base64 (jpg/png/pdf) |
| `update_user` | varchar | usuario que crea |
| `created_at` / `updated_at` | timestamp | |

**Migraciones relacionadas:**
- `2026_08_09_000000_create_novedades_table.php`
- `2026_08_20_000000_add_valor_faltante_to_novedades_table.php`
- `2026_08_20_000001_add_cuotas_to_novedades_table.php`
- `2026_09_20_000000_add_placa_to_novedades_table.php`
- `2026_09_23_000000_add_ide_aplicado_to_novedades_table.php`
- `2026_09_30_000000_add_manifiesto_origen_to_novedades_table.php`

> **Importante:** en producción (Laravel Cloud) la tabla `novedades` se creó **manualmente** y varias columnas también se aplicaron con SQL directo. Si se agregan migraciones nuevas, probablemente toque aplicarlas manualmente en producción (ver sección 9).

---

## 2. Tipos de novedad y su lógica

Definidos en `SolicitudController@guardarNovedad`.

| Tipo | Grupo | Efecto |
|---|---|---|
| AUXILIARES | costo (resta) | resta a `solicitudes.costo`; excedente → faltante |
| PUNTO NO CARGADO | costo (resta) | resta a `costo`; excedente → faltante |
| TRANSBORDO | costo (resta) | resta a `costo`; excedente → faltante |
| PUNTO ADICIONAL | costo (suma) | suma a `costo` |
| AVERIA | saldo (resta) | excedente sobre `valor_saldo` → faltante |
| DAÑO A TERCEROS | saldo (resta) | igual |
| ESCOLTA Y CANDADO SATELITAL | saldo (resta) | igual |
| HURTO | saldo (resta) | igual |
| PENALIZACIONES | saldo (resta) | igual |
| PENDIENTES | especial | Excel (MANIFIESTO, NOTA) + CONGELAR/DESCONGELAR; deshabilita pagos |
| VIAJE CANCELADO | especial | DEVOLUCION TOTAL / PARCIAL; saca el registro de Saldos (`confirmado = 'VC'`) |
| ACUERDO DE PAGO | especial | solo permiso `acuerdo`; resuelve faltante; cuotas 0–3 (0–1 si hay VIAJE CANCELADO) |
| DESCUENTO | especial | **nuevo** — automático desde ACUERDO DE PAGO de origen CONTADO; descuenta saldos sin confirmar de la placa; usuario `'sistema'` |

### Regla por `paytype` (muy importante)
Al crear una novedad se determina si **el pago ya está completo**:
```php
$pagoCompleto = in_array($paytype, ['CONTADO', 'CONTADO AM.', 'CONTADO PM.'])
    || $confirmado === 'SI';
```
- **Pago completo** → el descuento **no puede aplicarse al mismo id** → **todo el valor pasa a `valor_faltante`** y se **deshabilita la placa** hasta un ACUERDO DE PAGO.
- **Pago pendiente**:
  - tipo costo → descuenta `costo`.
  - tipo saldo → descuenta `valor_saldo` (vía columnas NOVEDADES/SALDO TOTAL).

`paytype` incluye: `PM. ANTICIPAR`, `AM. ANTICIPAR`, `CONTADO AM.`, `ANTICIPO NOCHE`, `CONTADO PM.`, `CONTADO`, `SEMANAL`, `ANTICIPO PM`, `CREDITO`.

---

## 3. Flujo de estados de un servicio

| Campo `confirmado` | Vista donde aparece |
|---|---|
| `'NO'` | Anticipos diarios (`/anticipos`) |
| `'AC'` | Saldos (`/saldos`) |
| `'SI'` | Histórico pagos (`/historico-pagos`) |
| `'VC'` | Viaje cancelado (oculto) |

- **Enviar a anticipo** (`update14`): `enviado='SI'`, `fecha_envio=hoy`, log en `solicitudes_logs` (campo `'enviado'`). Requiere `pagant`/`cpagant`/`tpagant`.
- **Confirmar anticipo** (`confirmarAnticipos`):
  - `pago_completo='SI'` → `confirmado='SI'`, `fecha_pago_completo`, `nota_pc` → Histórico pagos.
  - `pago_completo='NO'` → `confirmado='AC'`, `fecha_pago_anticipo`, `nota_pa` → Saldos.
- **Confirmar saldo** (`confirmarSaldos`): `confirmado='SI'`, `fecha_pago_saldo`, `nota_ps` → Histórico pagos.

Campos generados en `solicitudes`: `estado_anticipo`, `estado_saldo`, `saldo` (`costo*0.3`).

---

## 4. Faltantes, placa y acuerdos de pago

### Faltante
- Se guarda en `novedades.valor_faltante`.
- **Faltante por servicio** = `SUM(valor_faltante)` de novedades con `valor_faltante > 0` y `tipo_novedad != 'ACUERDO DE PAGO'`.
- Se pasa al botón NOVEDAD como `data-faltante` (en `/solicitud` e `/historico`).

### Deshabilitación de placa (`SolicitudController@index`)
```php
$placasConFaltante = novedades JOIN solicitudes
    WHERE valor_faltante > 0 AND tipo_novedad != 'ACUERDO DE PAGO'
    -> pluck(solicitudes.placa)
```
Esas placas se excluyen del editable-select PLACA. Se rehabilitan cuando se registra un ACUERDO DE PAGO (que pone el faltante en 0).

### Acuerdo de pago
- Requiere permiso `acuerdo`.
- `faltante = SUM(valor_faltante)` del ide (excluyendo acuerdos). Si es 0 → error.
- `cuotas` 0–3 (0–1 si hay VIAJE CANCELADO con faltante).
- `cuotas = 0` → nota fija **"Acuerdo de pago en perdida."**
- Resuelve el faltante de las novedades de descuento (`valor_faltante = 0`) → rehabilita placa.
- `aplicarCuotasAcuerdo($ide)`: reparte cuotas en `deducciones` de otros servicios de la misma placa (solo para NO pago completo).
- Hook `aplicarCuotasPendientesPlaca($placa, $nuevoId)`: al asignar placa a un servicio nuevo, aplica cuotas pendientes.

### Traslado del ACUERDO DE PAGO al siguiente servicio (nuevo)
Cuando el pago está completo, el acuerdo no puede aplicarse al mismo id:
- Se busca el **siguiente servicio de la misma placa** (`fecha_cargue > actual`) y se guarda en `novedades.ide_aplicado`.
- Hook `aplicarAcuerdosPendientesPlaca($placa, $nuevoId)`: si el siguiente servicio aún no existe, enlaza acuerdos pendientes (`ide_aplicado IS NULL`, `valor > 0` y `valor_faltante = 0`) cuando se asigne la placa.
- En el servicio destino:
  - **NOVEDADES** = novedades propias + traslado.
  - **CONTADO** → el traslado descuenta **VALOR A PAGAR**.
  - **No CONTADO** → el traslado descuenta **VALOR SALDO** (reflejado en SALDO TOTAL).
- El modal DETALLE muestra `manifiesto_origen → manifiesto` (ej. `202607310089262 → 123456789101234`).

### Descuento del faltante contra saldos sin confirmar (nuevo)
Cuando el origen del ACUERDO DE PAGO es **CONTADO** (`CONTADO`, `CONTADO AM.`, `CONTADO PM.`) y el pago ya está completo, antes de buscar el siguiente servicio se ejecuta `SolicitudController@descontarFaltanteEnSaldosNoConfirmados($solicitud, $faltante, $ahora)`:
1. Busca servicios de la misma placa con `confirmado = 'AC'` y paytype `PM. ANTICIPAR`, `AM. ANTICIPAR` o `ANTICIPO NOCHE` (los que aparecen en `/saldos`), ordenados por `fecha_cargue` asc.
2. Por cada uno, saldo disponible = `valor_saldo − novedades propias − traslados de acuerdos` (igual que el SALDO TOTAL de `/saldos`).
3. Inserta una novedad `DESCUENTO` con: `ide` = servicio destino, `manifiesto` = destino, `manifiesto_origen` = origen, `valor` = monto descontado, `update_user = 'sistema'`, fecha actual.
4. Si el descuento cubre **todo** el saldo → confirmación automática del saldo (`confirmado = 'SI'`, `fecha_pago_saldo`, `nota_ps = 'DESCUENTO AUTOMATICO'`) y sale de Saldos.
5. Si el faltante es **menor** al saldo → solo descuenta; el servicio permanece en Saldos con el saldo restante.
6. Continúa con los demás servicios de la placa hasta agotar el faltante. El **sobrante** sigue la regla actual (siguiente servicio por `fecha_cargue` vía `ide_aplicado`, o el hook si aún no existe).

Detalles de implementación:
- La novedad `ACUERDO DE PAGO` se mantiene en el origen (excluida de sumas). Si hubo descuento a saldos, su `valor` queda igual al **sobrante** (0 si todo se cubrió) para no duplicar descuentos; la `nota` registra `Faltante | Descuento automático en saldos | Trasladado`.
- `aplicarAcuerdosPendientesPlaca` ahora solo enlaza acuerdos con `valor > 0` (evita re-descontar acuerdos ya cubiertos por saldos).
- El modal DETALLE resuelve `manifiesto_origen → manifiesto` desde la columna `manifiesto_origen` (también en `/vehiculo`).

---

## 5. Cambios en vistas

### `/solicitud` (Registros activos)
- Columna **NOVEDAD** (botón `+` verde `#00FF9C`) antes de PLACA. Solo visible con permiso `novedades`.
- Botón habilitado solo si: `razon` no nulo, `costo > 0`, paytype válido, estado ≠ cancelado.
- Modal NOVEDAD (formulario) con lógica por tipo.
- Placa con borde amarillo `#e9af00` cuando tiene valor.

### `/anticipos` (Anticipos diarios)
- Columna FECHA (fecha real de llegada desde `solicitudes_logs`).
- Columnas **NOVEDADES** y **DETALLE** (modal con `manifiesto origen → nuevo`).
- Placa con borde amarillo. VALOR A PAGAR en negrita.
- Para paytype CONTADO, el traslado descuenta VALOR A PAGAR.

### `/anticipo` (Contable y tesorería)
- Columna **OTROS** (antes "OTRAS DEDUCCIONES"), **NOVEDADES**, **DETALLE**, **SALDO TOTAL**.
- `SALDO TOTAL = VALOR SALDO − OTROS − NOVEDADES` (para no CONTADO).
- Filtro de año/mes + botón naranja **NOVEDADES** (export Excel, `NovedadesExport`).
- Botón verde "MANIFIESTO" (antes "SUBIR MANIFIESTO"). Header responsive.
- Placa con borde amarillo.

### `/saldos` (Saldos)
- Vista reescrita: FECHA PAGO ANTICIPO, columnas NOVEDADES/DETALLE/SALDO TOTAL/ESTADO.
- Botón **CONFIRMAR SALDOS**.
- ESTADO: `PAGAR` (badge bg-dark) / `CONGELADO` (badge bg-info, fila azul claro `#d9eeff`).
- **Solo muestra paytypes distintos a CONTADO** (`whereNotIn` CONTADO, CONTADO AM., CONTADO PM.).
- Los descuentos (novedades + traslados) restan del VALOR SALDO → SALDO TOTAL.

### `/historico-pagos` (Histórico pagos)
- Vista nueva (entre Saldos y Cuentas de cobro).
- Columnas: FECHA PAGO COMPLETO, NOTA PC, FECHA PAGO ANTICIPO, NOTA PA, FECHA PAGO SALDO, NOTA PS.
- Filtro año/mes por fecha de llegada (solo meses con datos).

### `/historico` (Registro histórico)
- Columna NOVEDAD + modal DETALLE. Placa con borde amarillo.

### `/congelado` (Histórico estatus)
- Columnas NOVEDADES y DETALLE después de COSTO TOTAL.

### `/infoestatus` (Infoestatus maestro)
- Columnas **NOVEDADES**, **DETALLE** (con MANIFIESTO al inicio del modal) y **FALTANTE** después de COSTO TOTAL.
- COSTO TOTAL ajustado por novedades solo cuando el pago NO está completo.

### `/vehiculo` (Lista de vehículos)
- Columna **DETALLE** después de ESTADO.
- Modal que muestra **todas las novedades de la placa** (ordenadas por fecha desc) — endpoint `detalleNovedadesPorPlaca`.
- En novedades `DESCUENTO` muestra `manifiesto_origen → manifiesto`.

---

## 6. Modales DETALLE (comparten endpoint)
- Endpoint: `GET /solicitud/novedad/detalle/{manifiesto}` → `detalleNovedades()`.
- Por placa: `GET /solicitud/novedad/placa/{placa}` → `detalleNovedadesPorPlaca()`.
- Todos los modales muestran **MANIFIESTO al inicio**.
- Para traslados: `manifiesto origen → nuevo`.
- Soporte: 📄 abre el archivo (jpg/png en `<img>`, pdf en `<iframe>`).

### Fix de modales Bootstrap 5 (importante)
La app usa **Bootstrap 5.0.1** (sin plugin jQuery `.modal` y sin `getOrCreateInstance`).
Se creó el helper global en `resources/views/components/footer.blade.php`:
```js
function abrirModalSeguro(id) {
    var el = document.getElementById(id);
    if (!el) return;
    if (window.bootstrap && window.bootstrap.Modal) {
        var instancia = window.bootstrap.Modal.getInstance(el);
        if (!instancia) instancia = new window.bootstrap.Modal(el);
        instancia.show();
    } else if (window.jQuery && jQuery.fn && jQuery.fn.modal) {
        jQuery(el).modal('show');
    } else {
        el.classList.add('show'); el.style.display = 'block';
    }
}
```
Usar siempre `abrirModalSeguro('idModal')` en vez de `$('#id').modal('show')`.

---

## 7. Permisos (Spatie)
Se crearon en BD (local y manualmente en producción):
- **`novedades`** — ver/usar columna NOVEDAD.
- **`acuerdo`** — opción ACUERDO DE PAGO. Rol "Acuerdos" con 2 usuarios.
Al crear permisos nuevos: `php artisan permission:cache-reset`.

---

## 8. Archivos modificados (sesión)
- `app/Http/Controllers/SolicitudController.php` (la mayoría de la lógica)
- `app/Exports/NovedadesExport.php` (nuevo)
- `resources/views/Solicitud/anticipos.blade.php`
- `resources/views/Solicitud/anticipo.blade.php`
- `resources/views/Solicitud/saldos.blade.php`
- `resources/views/Solicitud/historico_pagos.blade.php`
- `resources/views/Solicitud/historico.blade.php`
- `resources/views/Solicitud/congelado.blade.php`
- `resources/views/Solicitud/infoestatus.blade.php`
- `resources/views/Solicitud/index.blade.php`
- `resources/views/Vehiculo/index.blade.php`
- `resources/views/components/footer.blade.php`
- `routes/web.php`
- `database/migrations/2026_09_30_000000_add_manifiesto_origen_to_novedades_table.php` (nuevo)

---

## 9. Pendientes / notas para producción
- Aplicar manualmente en Laravel Cloud (la tabla `novedades` se creó a mano):
  ```sql
  ALTER TABLE novedades ADD COLUMN placa VARCHAR NULL;
  ALTER TABLE novedades ADD COLUMN ide_aplicado BIGINT NULL;
  ALTER TABLE novedades ADD COLUMN manifiesto_origen VARCHAR NULL;
  ```
- Crear permiso `acuerdo` (si no existe) y limpiar cache de Spatie.
- Verificar que `abrirModalSeguro` esté en el footer desplegado.

---

## 10. Estado de datos de ejemplo (local)
- Placa **WEP938**:
  - id **25453** (CONTADO AM., `facturar='SI'`) — manifiesto `202607310089262`; novedad AVERIA 200000 → faltante; ACUERDO DE PAGO 200000 con `ide_aplicado = 26366`.
  - id **26366** (CONTADO AM.) — manifiesto `123456789101234`; recibe el traslado de 200000.
    - En Contable y tesorería: NOVEDADES 200000, VALOR A PAGAR 980000 → 780000.
- Se revirtió una deducción de 200000 que se había aplicado por error al servicio 13483.

---

## 11. Preguntas abiertas para la próxima sesión
1. ¿Aplicar la misma regla de CONTADO a las novedades **propias** (que descuenten solo VALOR A PAGAR y no SALDO TOTAL)? Actualmente el id 25453 muestra SALDO TOTAL = −200000 por su propia AVERIA.
2. Confirmar si el traslado debe mostrarse también en otras vistas además de Contable y tesorería / Anticipos diarios / Saldos.
3. Revisar si el hook `aplicarAcuerdosPendientesPlaca` cubre todos los escenarios (servicio creado sin placa y luego asignada).

---

## 12. Comandos útiles (local)
```powershell
# Migrar
php artisan migrate

# Compilar vistas (verifica errores Blade)
php artisan view:cache

# Verificar sintaxis PHP
php -l app\Http\Controllers\SolicitudController.php

# Cache de permisos Spatie
php artisan permission:cache-reset
```

Conexión PostgreSQL local (`.env`): host 127.0.0.1, puerto 5432, BD `prefactura`, usuario `postgres`.
Vista `peticiones` = join de `solicitudes` + `vehiculos` + `clientesa` + `egresos` + `servs` + `centros_costo` (definida en `tmp/actualizar_vista_peticiones.sql`).
