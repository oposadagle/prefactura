<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

$result = DB::select("SELECT pg_get_viewdef('peticiones', true) as definition");
file_put_contents('tmp/vista_peticiones_actual.sql', $result[0]->definition);
echo "Vista exportada a tmp/vista_peticiones_actual.sql\n";
