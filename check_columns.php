<?php
require 'c:/xampp/htdocs/laravel/prefactura/vendor/autoload.php';
$app = require_once 'c:/xampp/htdocs/laravel/prefactura/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $cols = DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = 'solicitudes'");
    echo "Solicitudes Columns:\n";
    foreach ($cols as $c) {
        echo $c->column_name . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
