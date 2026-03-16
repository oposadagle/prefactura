<?php

include 'vendor/autoload.php';
$app = include_once 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;

try {
    $createView = DB::select('SHOW CREATE VIEW peticiones');
    echo "PETICIONES IS A VIEW:\n";
    print_r($createView);
} catch (\Exception $e) {
    try {
        $createTable = DB::select('SHOW CREATE TABLE peticiones');
        echo "PETICIONES IS A TABLE:\n";
        print_r($createTable);
    } catch (\Exception $e2) {
        echo "Error: " . $e2->getMessage();
    }
}

echo "\nCOLUMNS:\n";
$columns = DB::select('DESCRIBE peticiones');
print_r($columns);
