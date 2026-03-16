<?php

include 'vendor/autoload.php';
$app = include_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

$outputFile = 'c:\\xampp\\htdocs\\laravel\\prefactura\\tmp\\peticiones_info_pg.txt';
$log = "";

try {
    $columns = DB::select("
        SELECT column_name, data_type 
        FROM information_schema.columns 
        WHERE table_name = 'peticiones'
    ");
    $log .= "COLUMNS:\n";
    foreach ($columns as $column) {
        $log .= $column->column_name . " (" . $column->data_type . ")\n";
    }
} catch (\Exception $e) {
    $log .= "Error: " . $e->getMessage() . "\n";
}

file_put_contents($outputFile, $log);
echo "Done\n";
