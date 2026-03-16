<?php

include 'vendor/autoload.php';
$app = include_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

$outputFile = 'c:\\xampp\\htdocs\\laravel\\prefactura\\tmp\\peticiones_info.txt';
$log = "";

try {
    $type = DB::select("SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_NAME = 'peticiones'");
    $log .= "TYPE:\n" . print_r($type, true) . "\n";

    $log .= "COLUMNS:\n";
    $columns = DB::select('SHOW COLUMNS FROM peticiones');
    foreach ($columns as $column) {
        $log .= $column->Field . " (" . $column->Type . ")\n";
    }
} catch (\Exception $e) {
    $log .= "Error: " . $e->getMessage() . "\n";
}

file_put_contents($outputFile, $log);
echo "Done\n";
