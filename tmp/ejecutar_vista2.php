<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

try {
    // Paso 1: DROP VIEW
    DB::statement("DROP VIEW IF EXISTS peticiones");
    echo "Vista peticiones eliminada.\n";

    // Paso 2: CREATE VIEW
    $sql = file_get_contents('tmp/actualizar_vista_peticiones.sql');
    // Quitar el DROP VIEW del archivo SQL ya que ya lo ejecutamos
    $sql = preg_replace('/^--.*\n/m', '', $sql);
    $sql = preg_replace('/^DROP VIEW.*;\s*/m', '', $sql);
    $sql = trim($sql);
    
    DB::statement($sql);
    echo "Vista peticiones creada correctamente.\n";
    
    // Verificar que el campo fopat existe
    $result = DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = 'peticiones' AND column_name = 'fopat'");
    if (count($result) > 0) {
        echo "Campo FOPAT verificado en la vista.\n";
    } else {
        echo "ERROR: Campo FOPAT no encontrado.\n";
    }
    
    // Verificar datos de prueba
    echo "\nDatos de prueba (5 registros con costo > 0 y pago_completo = 'SI'):\n";
    $samples = DB::table('peticiones')
        ->select('id', 'costo', 'reteica', 'retefuente', 'fopat', 'seguro', 'valor_a_pagar', 'pago_completo')
        ->where('pago_completo', 'SI')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples as $s) {
        $esperado = $s->costo - $s->reteica - $s->retefuente - $s->seguro - $s->fopat;
        echo sprintf(
            "ID=%s | costo=%s | reteica=%s | retefuente=%s | fopat=%s | seguro=%s | valor_a_pagar=%s | esperado=%s | %s\n",
            $s->id, $s->costo, $s->reteica, $s->retefuente, $s->fopat, $s->seguro, $s->valor_a_pagar, $esperado,
            ($s->valor_a_pagar == $esperado) ? 'OK' : 'DIFF'
        );
    }
    
    echo "\nDatos de prueba (5 registros con costo > 0 y pago_completo = 'NO'):\n";
    $samples2 = DB::table('peticiones')
        ->select('id', 'costo', 'reteica', 'retefuente', 'fopat', 'seguro', 'valor_a_pagar', 'pago_completo')
        ->where('pago_completo', 'NO')
        ->where('costo', '>', 0)
        ->limit(5)
        ->get();
    
    foreach ($samples2 as $s) {
        $esperado = intval($s->costo * 0.70);
        echo sprintf(
            "ID=%s | costo=%s | fopat=%s | valor_a_pagar=%s | esperado(70%%)=%s | %s\n",
            $s->id, $s->costo, $s->fopat, $s->valor_a_pagar, $esperado,
            ($s->valor_a_pagar == $esperado) ? 'OK' : 'DIFF'
        );
    }
    
} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
}
