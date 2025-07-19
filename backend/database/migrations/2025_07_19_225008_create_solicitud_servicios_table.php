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
        Schema::create('solicitud_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_nombre');
            $table->string('cliente_email');
            $table->text('descripcion');
            $table->enum('estado', ['abierto', 'en_progreso', 'cerrado'])->default('abierto');
            $table->timestamp('fecha_creacion')->useCurrent();
            $table->timestamp('fecha_resolucion')->nullable();

            $table->foreignId('tecnico_asignado_id')->nullable()->constrained('users')->restrictOnDelete();
            $table->foreignId('solicitante_id')->constrained('users')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_servicios');
    }
};
