<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    DB::statement("DROP VIEW IF EXISTS adelantos");
    echo "Vista adelantos eliminada.\n";
    
    DB::statement("DROP VIEW IF EXISTS cuentas");
    echo "Vista cuentas eliminada.\n";

    DB::statement("DROP VIEW IF EXISTS peticiones");
    echo "Vista peticiones eliminada.\n";

    $sql = file_get_contents('tmp/actualizar_vista_peticiones.sql');
    $sql = preg_replace('/^--.*\n/m', '', $sql);
    $sql = preg_replace('/^DROP VIEW.*;\s*/m', '', $sql);
    $sql = trim($sql);
    
    DB::statement($sql);
    echo "Vista peticiones creada correctamente con FOPAT condicional por fecha.\n";
    
    $sql_adelantos = file_get_contents('tmp/vista_adelantos.sql');
    DB::statement("CREATE VIEW adelantos AS " . trim($sql_adelantos));
    echo "Vista adelantos recreada.\n";
    
    $sql_cuentas = file_get_contents('tmp/vista_cuentas.sql');
    DB::statement("CREATE VIEW cuentas AS " . trim($sql_cuentas));
    echo "Vista cuentas recreada.\n";
    
    echo "\n=== REGISTROS ANTERIORES A 2026-07-17 (FOPAT debe ser 0) ===\n";
    $samples = DB::table('peticiones')
        ->select('id', 'fecha_cargue', 'costo', 'fopat', 'valor_a_pagar', 'pago_completo')
        ->where('fecha_cargue', '<', '2026-07-17')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples as $s) {
        $estado = ($s->fopat == 0) ? '✓ OK' : '✗ DIFF';
        echo sprintf(
            "ID=%s | fecha=%s | costo=%s | fopat=%s | valor_a_pagar=%s | %s\n",
            $s->id, $s->fecha_cargue, $s->costo, $s->fopat, $s->valor_a_pagar, $estado
        );
    }
    
    echo "\n=== REGISTROS DESDE 2026-07-17 (FOPAT = 0.1% del costo) ===\n";
    $samples2 = DB::table('peticiones')
        ->select('id', 'fecha_cargue', 'costo', 'fopat', 'reteica', 'retefuente', 'seguro', 'valor_a_pagar', 'pago_completo')
        ->where('fecha_cargue', '>=', '2026-07-17')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples2 as $s) {
        $esperado_fopat = intval(round($s->costo * 0.001));
        $estado_fopat = ($s->fopat == $esperado_fopat) ? '✓' : '✗';
        
        if ($s->pago_completo === 'SI') {
            $esperado_vap = $s->costo - $s->reteica - $s->retefuente - $s->seguro - $s->fopat;
        } else {
            $esperado_vap = intval($s->costo * 0.70);
        }
        $estado_vap = ($s->valor_a_pagar == $esperado_vap) ? '✓' : '✗';
        
        echo sprintf(
            "ID=%s | fecha=%s | costo=%s | fopat=%s(%s) | valor_a_pagar=%s(%s) | pago_completo=%s\n",
            $s->id, $s->fecha_cargue, $s->costo, $s->fopat, $estado_fopat, $s->valor_a_pagar, $estado_vap, $s->pago_completo
        );
    }
    
    echo "\n✓ Todos los cambios aplicados correctamente.\n";
    
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
