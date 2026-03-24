<?php
$file = "c:/xampp/htdocs/laravel/prefactura/app/Http/Controllers/SolicitudController.php";
$content = file_get_contents($file);

// Regex matching the update14 start structure
$pattern = '/\s*\$diario\s*=\s*DB::table\(\'solicitudes\'\)->where\(\'id\',\s*\$id\)->first\(\);\s*if\s*\(\!\$diario\)\s*\{\s*return\s*response\(\)->json\(\[\'success\'\s*=>\s*false,\s*\'message\'\s*=>\s*\'Registro\s+no\s+encontrado\'\],\s*404\);\s*\}/s';

// Include the validation in the replacement
$replacement = "            \$diario = DB::table('solicitudes')->where('id', \$id)->first();\n            if (!\$diario) {\n                return response()->json(['success' => false, 'message' => 'Registro no encontrado'], 404);\n            }\n\n            // Validar que los campos de anticipo estén completos\n            if (empty(\$diario->pagant) || empty(\$diario->cpagant) || empty(\$diario->tpagant)) {\n                return response()->json(['success' => false, 'message' => 'datos incompletos del receptor del anticipo'], 400);\n            }\n";

if (preg_match($pattern, $content)) {
    $content = preg_replace($pattern, $replacement, $content);
    file_put_contents($file, $content);
    echo "SUCCESS\n";
} else {
    echo "FAIL\n";
}
?>
