<?php
require 'c:/xampp/htdocs/laravel/prefactura/vendor/autoload.php';
$app = require_once 'c:/xampp/htdocs/laravel/prefactura/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $cols = DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = 'peticiones' AND column_name = 'asociado'");
    if (count($cols) > 0) {
        echo "Found column: asociado\n";
    } else {
        echo "Column 'asociado' NOT found in peticiones.\n";
        // Let's print all column names to see if it is named something else
        $allCols = DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = 'peticiones'");
        echo "Available columns:\n";
        foreach ($allCols as $c) {
            echo $c->column_name . " ";
        }
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
