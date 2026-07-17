<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== SIMULACION: Si existiera un registro con fecha 2026-07-17 ===\n";
$result = DB::select("
    SELECT 
        200000 as costo,
        '2026-07-17'::date as fecha_cargue,
        CASE WHEN '2026-07-17'::date >= '2026-07-17'::date THEN round(200000::numeric * 0.001)::integer ELSE 0 END as fopat_esperado,
        CASE WHEN '2026-07-16'::date >= '2026-07-17'::date THEN round(200000::numeric * 0.001)::integer ELSE 0 END as fopat_dia_anterior
");
echo "FOPAT para 2026-07-17: " . $result[0]->fopat_esperado . " (debe ser 200)\n";
echo "FOPAT para 2026-07-16: " . $result[0]->fopat_dia_anterior . " (debe ser 0)\n";

echo "\n=== RESUMEN FINAL ===\n";
$total_antes = DB::table('peticiones')->where('fecha_cargue', '<', '2026-07-17')->where('costo', '>', 0)->count();
$total_despues = DB::table('peticiones')->where('fecha_cargue', '>=', '2026-07-17')->where('costo', '>', 0)->count();
$fopat_cero = DB::table('peticiones')->where('fecha_cargue', '<', '2026-07-17')->where('costo', '>', 0)->where('fopat', 0)->count();

echo "Registros antes de 2026-07-17 con costo > 0: $total_antes\n";
echo "Registros antes de 2026-07-17 con FOPAT = 0: $fopat_cero\n";
echo "Registros desde 2026-07-17 con costo > 0: $total_despues\n";

if ($fopat_cero == $total_antes) {
    echo "\n✓ Todos los registros anteriores a 2026-07-17 tienen FOPAT = 0\n";
} else {
    echo "\n✗ ERROR: Algunos registros anteriores no tienen FOPAT = 0\n";
}
