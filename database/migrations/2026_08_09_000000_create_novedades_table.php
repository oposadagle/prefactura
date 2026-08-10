<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ide')->comment('ID de la solicitud');
            $table->string('manifiesto')->comment('Razon/manifiesto de la solicitud');
            $table->string('tipo_novedad');
            $table->string('clase_novedad')->nullable()->default(null);
            $table->integer('valor');
            $table->string('nota', 1000)->nullable();
            $table->text('soporte')->nullable()->comment('Archivo codificado en base64');
            $table->string('update_user');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('novedades');
    }
};
