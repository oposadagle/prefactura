<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('consecutivos_planos', function (Blueprint $table) {
            $table->id();
            $table->string('menu'); // ANTICIPOS, SALDOS, CUENTAS
            $table->date('fecha');
            $table->integer('ultimo_valor')->default(0);
            $table->unique(['menu', 'fecha']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consecutivos_planos');
    }
};
