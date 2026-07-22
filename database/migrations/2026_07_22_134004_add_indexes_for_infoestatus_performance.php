<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement('CREATE INDEX IF NOT EXISTS idx_solicitudes_fecha_cargue ON solicitudes(fecha_cargue)');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_estatus_id ON estatus(id)');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_vehiculos_placa ON vehiculos(placa)');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_clientesa_nombre ON clientesa(nombre)');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_verificados_ide ON verificados(ide)');
        DB::statement('CREATE INDEX IF NOT EXISTS idx_estatos_ide ON estatos(ide)');
    }

    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS idx_solicitudes_fecha_cargue');
        DB::statement('DROP INDEX IF EXISTS idx_estatus_id');
        DB::statement('DROP INDEX IF EXISTS idx_vehiculos_placa');
        DB::statement('DROP INDEX IF EXISTS idx_clientesa_nombre');
        DB::statement('DROP INDEX IF EXISTS idx_verificados_ide');
        DB::statement('DROP INDEX IF EXISTS idx_estatos_ide');
    }
};
