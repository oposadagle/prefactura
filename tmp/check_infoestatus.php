<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

// Check if infoestatus depends on peticiones
$deps = DB::select("
    SELECT dependent_view.relname as view_name
    FROM pg_depend
    JOIN pg_rewrite ON pg_depend.objid = pg_rewrite.oid
    JOIN pg_class as dependent_view ON pg_rewrite.ev_class = dependent_view.oid
    WHERE pg_depend.classid = 'pg_class'::regclass
    AND pg_depend.refclassid = 'pg_class'::regclass
    AND pg_depend.refobjid = 'peticiones'::regclass
");

echo "Vistas que dependen de peticiones:\n";
foreach ($deps as $d) {
    echo "  - " . $d->view_name . "\n";
}

// Check infoestatus definition
echo "\n\nDefinicion de infoestatus:\n";
try {
    $def = DB::select("SELECT pg_get_viewdef('infoestatus', true) as definition");
    echo $def[0]->definition . "\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
