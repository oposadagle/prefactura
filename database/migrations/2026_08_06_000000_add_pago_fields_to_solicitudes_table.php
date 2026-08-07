<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->date('fecha_pago_completo')->nullable();
            $table->string('nota_pc')->nullable();
            $table->date('fecha_pago_anticipo')->nullable();
            $table->string('nota_pa')->nullable();
            $table->date('fecha_pago_saldo')->nullable();
            $table->string('nota_ps')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('solicitudes', function (Blueprint $table) {
            $table->dropColumn([
                'fecha_pago_completo',
                'nota_pc',
                'fecha_pago_anticipo',
                'nota_pa',
                'fecha_pago_saldo',
                'nota_ps',
            ]);
        });
    }
};
