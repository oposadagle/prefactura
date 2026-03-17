<?php
require 'c:/xampp/htdocs/laravel/prefactura/vendor/autoload.php';
$app = require_once 'c:/xampp/htdocs/laravel/prefactura/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $rows = DB::select("SELECT id, cliente, razon, observaciones FROM peticiones WHERE cliente ILIKE '%Industrias%' OR razon ILIKE '%Industrias%' LIMIT 5");
    echo "Peticiones Search Results:\n";
    print_r($rows);
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
