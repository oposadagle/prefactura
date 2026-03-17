<?php
require 'c:/xampp/htdocs/laravel/prefactura/vendor/autoload.php';
$app = require_once 'c:/xampp/htdocs/laravel/prefactura/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $columns = DB::select("SELECT column_name FROM information_schema.columns WHERE table_name = 'peticiones'");
    echo "Columns of peticiones:\n";
    foreach ($columns as $column) {
        echo $column->column_name . "\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
