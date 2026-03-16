<?php

include 'vendor/autoload.php';
$app = include_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $type = DB::select("SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_NAME = 'peticiones'");
    echo "TYPE:\n";
    print_r($type);

    echo "\nCOLUMNS:\n";
    $columns = DB::select('SHOW COLUMNS FROM peticiones');
    foreach ($columns as $column) {
        echo $column->Field . " (" . $column->Type . ")\n";
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
