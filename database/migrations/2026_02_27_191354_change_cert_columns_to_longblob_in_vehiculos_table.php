<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE vehiculos ADD COLUMN certia_base64 TEXT NULL');
        DB::statement('ALTER TABLE vehiculos ADD COLUMN certib_base64 TEXT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE vehiculos DROP COLUMN IF EXISTS certia_base64');
        DB::statement('ALTER TABLE vehiculos DROP COLUMN IF EXISTS certib_base64');
    }
};
