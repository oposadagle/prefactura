<?php
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();
$r = DB::select("SELECT relkind FROM pg_class WHERE relname = 'matriculas'");
echo count($r) > 0 ? $r[0]->relkind : 'NOT FOUND';
echo "\n";
$deps = DB::select("
    SELECT DISTINCT dv.relname AS view_name
    FROM pg_depend
    JOIN pg_rewrite ON pg_depend.objid = pg_rewrite.oid
    JOIN pg_class AS dv ON pg_rewrite.ev_class = dv.oid
    JOIN pg_class AS st ON pg_depend.refobjid = st.oid
    WHERE st.relname = 'matriculas'
");
foreach($deps as $d) { echo '  depends on matriculas: ' . $d->view_name . "\n"; }

$deps2 = DB::select("
    SELECT DISTINCT st.relname AS depends_on
    FROM pg_depend
    JOIN pg_rewrite ON pg_depend.objid = pg_rewrite.oid
    JOIN pg_class AS dv ON pg_rewrite.ev_class = dv.oid
    JOIN pg_class AS st ON pg_depend.refobjid = st.oid
    WHERE dv.relname = 'matriculas'
");
foreach($deps2 as $d) { echo '  matriculas depends on: ' . $d->depends_on . "\n"; }
