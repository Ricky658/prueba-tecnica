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
        Schema::create('comentario_solicitudes', function (Blueprint $table) {
        $table->id();
        $table->foreignId('solicitud_id')->constrained('solicitud_servicios')->restrictOnDelete();
        $table->foreignId('usuario_id')->constrained('users')->restrictOnDelete();
        $table->text('comentario');
        $table->timestamp('creado_en')->useCurrent();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comentario_solicitudes');
    }
};
