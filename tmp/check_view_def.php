<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Check if peticiones is a view
$type = DB::select("SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_NAME = 'peticiones'");
echo "TABLE_TYPE: " . ($type[0]->table_type ?? 'NOT FOUND') . "\n\n";

// Try to get view definition
try {
    $def = DB::select("SELECT pg_get_viewdef('peticiones', true) as definition");
    echo "VIEW DEFINITION:\n" . ($def[0]->definition ?? 'N/A') . "\n";
} catch (\Exception $e) {
    echo "Not a view or error: " . $e->getMessage() . "\n";
}

// Check a sample row to see the relationship between costo, anticipo, reteica, retefuente, seguro, valor_a_pagar
echo "\n\nSAMPLE DATA (5 rows with non-null values):\n";
$samples = DB::table('peticiones')
    ->select('id', 'costo', 'costo_tiposerv', 'anticipo', 'pago_completo', 'centro_costo', 'reteica', 'retefuente', 'seguro', 'valor_a_pagar', 'deducciones', 'saldo', 'saldo_final')
    ->whereNotNull('valor_a_pagar')
    ->whereNotNull('costo')
    ->limit(10)
    ->get();

foreach ($samples as $s) {
    echo sprintf(
        "ID=%s | costo=%s | extra=%s | anticipo=%s | pago_completo=%s | centro_costo=%s | reteica=%s | retefuente=%s | seguro=%s | valor_a_pagar=%s | deducciones=%s | saldo=%s | saldo_final=%s\n",
        $s->id, $s->costo, $s->costo_tiposerv, $s->anticipo, $s->pago_completo, $s->centro_costo,
        $s->reteica, $s->retefuente, $s->seguro, $s->valor_a_pagar, $s->deducciones, $s->saldo, $s->saldo_final
    );
}
