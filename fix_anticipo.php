<?php
$file = "c:/xampp/htdocs/laravel/prefactura/resources/views/Solicitud/anticipo.blade.php";
$content = file_get_contents($file);

// Regex matching the click handler structure
$pattern = '/\s*\$\(\'\.editablef\'\)\.on\(\'click\',\s*function\s*\(e\)\s*\{\s*e\.preventDefault\(\);\s*\/\/.*?\n\s*var\s+pk\s*=\s*\$\(this\)\.data\(\'pk\'\);/s';

$replacement = "    $('.editablef').on('click', function(e) {\n        e.preventDefault(); \n\n        var pk = $(this).data('pk'); \n        var pagant = $(this).data('pagant');\n        var cpagant = $(this).data('cpagant');\n        var tpagant = $(this).data('tpagant');\n\n        // Validacion de datos del receptor\n        if (!pagant || !cpagant || !tpagant) {\n            Swal.fire({\n                icon: 'warning',\n                title: 'Atención',\n                text: 'datos incompletos del receptor del anticipo'\n            });\n            return;\n        }\n";

if (preg_match($pattern, $content)) {
    $content = preg_replace($pattern, $replacement, $content);
    file_put_contents($file, $content);
    echo "SUCCESS\n";
} else {
    echo "FAIL\n";
}
?>
