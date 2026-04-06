<?php
require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$lastGuia = DB::table('estatus')->where('guia', 'LIKE', 'MAS-%')->orderBy('ide', 'desc')->value('guia');
echo "Last MAS guide: " . $lastGuia . "\n";

$lastSolicitudGuia = DB::table('solicitudes')->where('guia', 'LIKE', 'MAS-%')->orderBy('id', 'desc')->value('guia');
echo "Last solicitud guide: " . $lastSolicitudGuia . "\n";
