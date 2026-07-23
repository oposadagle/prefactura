<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Check if masas and utiles are tables or views
        $masasType = DB::select("SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_NAME = 'masas'");
        $utilesType = DB::select("SELECT TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_NAME = 'utiles'");

        if (!empty($masasType) && $masasType[0]->table_type === 'BASE TABLE') {
            DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_ano ON masas("AÑO")');
            DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_mes ON masas("MES")');
            DB::statement('CREATE INDEX IF NOT EXISTS idx_masas_ano_mes ON masas("AÑO", "MES")');
        }

        if (!empty($utilesType) && $utilesType[0]->table_type === 'BASE TABLE') {
            DB::statement('CREATE INDEX IF NOT EXISTS idx_utiles_ano ON utiles("AÑO")');
            DB::statement('CREATE INDEX IF NOT EXISTS idx_utiles_mes ON utiles("MES")');
            DB::statement('CREATE INDEX IF NOT EXISTS idx_utiles_ano_mes ON utiles("AÑO", "MES")');
        }
    }

    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS idx_masas_ano');
        DB::statement('DROP INDEX IF EXISTS idx_masas_mes');
        DB::statement('DROP INDEX IF EXISTS idx_masas_ano_mes');
        DB::statement('DROP INDEX IF EXISTS idx_utiles_ano');
        DB::statement('DROP INDEX IF EXISTS idx_utiles_mes');
        DB::statement('DROP INDEX IF EXISTS idx_utiles_ano_mes');
    }
};
