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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->integer('nit')->unique();
            $table->string('razon_social');
            $table->string('razon_comercial');
            $table->string('direccion');
            $table->integer('telefono');
            $table->string('contacto');
            $table->string('email_1');
            $table->string('email_2')->nullable();
            $table->string('email_3')->nullable();
            $table->string('comercial');
            $table->string('email_comercial');
            $table->string('proceso_comercial');
            $table->string('regional_comercial');
            $table->string('analista');
            $table->string('email_analista');
            $table->string('proceso_analista');
            $table->string('regional_analista');
            $table->string('tipo_servicio');
            $table->integer('factor')->default(0);
            $table->integer('estado')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
