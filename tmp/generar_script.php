<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$sql = file_get_contents('tmp/actualizar_vista_peticiones.sql');
$adelantos = file_get_contents('tmp/vista_adelantos.sql');
$cuentas = file_get_contents('tmp/vista_cuentas.sql');

$full = "-- ============================================================\n";
$full .= "-- SCRIPT PRODUCCION - Agregar campo FOPAT a vista peticiones\n";
$full .= "-- FOPAT = 0.1% del COSTO (solo desde 2026-07-17 en adelante)\n";
$full .= "-- SOLO aplica para vehiculos con especificacion >= 7000\n";
$full .= "-- VALOR_A_PAGAR descuenta FOPAT cuando pago_completo = 'SI'\n";
$full .= "-- ============================================================\n\n";
$full .= "-- PASO 1: Eliminar vistas dependientes\n";
$full .= "DROP VIEW IF EXISTS adelantos;\n";
$full .= "DROP VIEW IF EXISTS cuentas;\n";
$full .= "DROP VIEW IF EXISTS peticiones;\n\n";
$full .= "-- PASO 2: Recrear vista peticiones con FOPAT\n";
$full .= $sql . "\n\n";
$full .= "-- PASO 3: Recrear vistas dependientes\n";
$full .= "CREATE VIEW adelantos AS\n" . trim($adelantos) . ";\n\n";
$full .= "CREATE VIEW cuentas AS\n" . trim($cuentas) . ";\n";

file_put_contents('tmp/script_produccion_fopat.sql', $full);
echo "Script actualizado exitosamente\n";
