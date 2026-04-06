<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$maxEstatus = DB::table('estatus')->where('guia', 'LIKE', 'MAS-2026%')->orderBy('guia', 'desc')->value('guia');
$maxSolicitudes = DB::table('solicitudes')->where('guia', 'LIKE', 'MAS-2026%')->orderBy('guia', 'desc')->value('guia');

echo "Max Estatus: $maxEstatus\n";
echo "Max Solicitudes: $maxSolicitudes\n";
