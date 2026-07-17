<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Obtener definiciones de vistas dependientes
$vistas = ['adelantos', 'cuentas'];

foreach ($vistas as $vista) {
    $result = DB::select("SELECT pg_get_viewdef('$vista', true) as definition");
    $def = $result[0]->definition ?? 'N/A';
    file_put_contents("tmp/vista_{$vista}.sql", $def);
    echo "Vista $vista exportada a tmp/vista_{$vista}.sql\n";
}
