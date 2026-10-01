<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('novedades', function (Blueprint $table) {
            $table->string('manifiesto_origen')->nullable()->after('manifiesto');
        });
    }

    public function down(): void
    {
        Schema::table('novedades', function (Blueprint $table) {
            $table->dropColumn('manifiesto_origen');
        });
    }
};
