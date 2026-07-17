<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    // Paso 1: DROP vistas dependientes
    DB::statement("DROP VIEW IF EXISTS adelantos");
    echo "Vista adelantos eliminada.\n";
    
    DB::statement("DROP VIEW IF EXISTS cuentas");
    echo "Vista cuentas eliminada.\n";

    // Paso 2: DROP vista peticiones
    DB::statement("DROP VIEW IF EXISTS peticiones");
    echo "Vista peticiones eliminada.\n";

    // Paso 3: CREATE vista peticiones con FOPAT
    $sql = file_get_contents('tmp/actualizar_vista_peticiones.sql');
    // Quitar comentarios y DROP VIEW del archivo SQL
    $sql = preg_replace('/^--.*\n/m', '', $sql);
    $sql = preg_replace('/^DROP VIEW.*;\s*/m', '', $sql);
    $sql = trim($sql);
    
    DB::statement($sql);
    echo "Vista peticiones creada correctamente con FOPAT.\n";
    
    // Paso 4: Recrear vistas dependientes
    $sql_adelantos = file_get_contents('tmp/vista_adelantos.sql');
    DB::statement("CREATE VIEW adelantos AS " . trim($sql_adelantos));
    echo "Vista adelantos recreada.\n";
    
    $sql_cuentas = file_get_contents('tmp/vista_cuentas.sql');
    DB::statement("CREATE VIEW cuentas AS " . trim($sql_cuentas));
    echo "Vista cuentas recreada.\n";
    
    // Verificar que el campo fopat existe
    $result = DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = 'peticiones' AND column_name = 'fopat'");
    if (count($result) > 0) {
        echo "\n✓ Campo FOPAT verificado en la vista peticiones.\n";
    } else {
        echo "\n✗ ERROR: Campo FOPAT no encontrado.\n";
    }
    
    // Verificar datos de prueba
    echo "\n=== DATOS DE PRUEBA (pago_completo = 'SI') ===\n";
    echo "Fórmula: VALOR_A_PAGAR = COSTO - RETEICA - RETEFUENTE - SEGURO - FOPAT\n\n";
    $samples = DB::table('peticiones')
        ->select('id', 'costo', 'reteica', 'retefuente', 'fopat', 'seguro', 'valor_a_pagar', 'pago_completo')
        ->where('pago_completo', 'SI')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples as $s) {
        $esperado = $s->costo - $s->reteica - $s->retefuente - $s->seguro - $s->fopat;
        $estado = ($s->valor_a_pagar == $esperado) ? '✓ OK' : '✗ DIFF';
        echo sprintf(
            "ID=%s | costo=%s | reteica=%s | retefuente=%s | fopat=%s | seguro=%s | valor_a_pagar=%s | esperado=%s | %s\n",
            $s->id, $s->costo, $s->reteica, $s->retefuente, $s->fopat, $s->seguro, $s->valor_a_pagar, $esperado, $estado
        );
    }
    
    echo "\n=== DATOS DE PRUEBA (pago_completo = 'NO') ===\n";
    echo "Fórmula: VALOR_A_PAGAR = COSTO * 0.70 (sin cambios)\n\n";
    $samples2 = DB::table('peticiones')
        ->select('id', 'costo', 'reteica', 'retefuente', 'fopat', 'seguro', 'valor_a_pagar', 'pago_completo')
        ->where('pago_completo', 'NO')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples2 as $s) {
        $esperado = intval($s->costo * 0.70);
        $estado = ($s->valor_a_pagar == $esperado) ? '✓ OK' : '✗ DIFF';
        echo sprintf(
            "ID=%s | costo=%s | fopat=%s | valor_a_pagar=%s | esperado(70%%)=%s | %s\n",
            $s->id, $s->costo, $s->fopat, $s->valor_a_pagar, $esperado, $estado
        );
    }
    
    echo "\n=== VERIFICAR FOPAT = 0.1% DEL COSTO ===\n";
    $samples3 = DB::table('peticiones')
        ->select('id', 'costo', 'fopat')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples3 as $s) {
        $esperado_fopat = intval(round($s->costo * 0.001));
        $estado = ($s->fopat == $esperado_fopat) ? '✓ OK' : '✗ DIFF';
        echo sprintf(
            "ID=%s | costo=%s | fopat=%s | esperado(0.1%%)=%s | %s\n",
            $s->id, $s->costo, $s->fopat, $esperado_fopat, $estado
        );
    }
    
    echo "\n✓ Todos los cambios aplicados correctamente.\n";
    
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
