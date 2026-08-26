<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Índice único parcial: protege únicamente las filas nuevas (id mayor al máximo
        // actual), de modo que no obliga a corregir las guías duplicadas ya existentes,
        // pero impide que se creen nuevos duplicados a partir de ahora.
        $maxSolicitudes = (int) DB::table('solicitudes')->max('id');
        $maxEstatus = (int) DB::table('estatus')->max('id');

        DB::statement('CREATE UNIQUE INDEX IF NOT EXISTS idx_solicitudes_guia_unique ON solicitudes(guia) WHERE id > '.$maxSolicitudes);
        DB::statement('CREATE UNIQUE INDEX IF NOT EXISTS idx_estatus_guia_unique ON estatus(guia) WHERE id > '.$maxEstatus);
    }

    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS idx_solicitudes_guia_unique');
        DB::statement('DROP INDEX IF EXISTS idx_estatus_guia_unique');
    }
};
