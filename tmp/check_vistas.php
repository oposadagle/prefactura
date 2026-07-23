<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Get view definitions
try {
    $masas = DB::select("SELECT pg_get_viewdef('masas', true) as definition");
    echo "VISTA MASAS:\n" . $masas[0]->definition . "\n\n";
} catch (\Exception $e) {
    echo "Error masas: " . $e->getMessage() . "\n";
}

try {
    $utiles = DB::select("SELECT pg_get_viewdef('utiles', true) as definition");
    echo "VISTA UTILES:\n" . $utiles[0]->definition . "\n\n";
} catch (\Exception $e) {
    echo "Error utiles: " . $e->getMessage() . "\n";
}
