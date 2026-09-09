<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('records', function (Blueprint $table) {

            $table->id();

            // Información principal
            $table->date('date');

            $table->foreignId('company_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('driver_id')
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('trailer_id')
                ->constrained()
                ->restrictOnDelete();

            // Información de la operación
            $table->string('invoice', 100);
            $table->string('paps_number', 100)->nullable();

            $table->foreignId('shipper_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('consignee_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();

            $table->foreignId('broker_id')
                ->nullable()
                ->constrained()
                ->restrictOnDelete();

            $table->string('fact_number', 100)->nullable();

            // Estado del registro
            $table->string('status', 20)->default('red');

            // Usuario que realizó el registro
            $table->string('registered_by', 255);

            // Información de liberación
            $table->timestamp('released_at')->nullable();
            $table->string('released_by', 255)->nullable();

            $table->timestamps();

            // Índices para búsquedas frecuentes
            $table->index('date');
            $table->index('invoice');
            $table->index('paps_number');
            $table->index('fact_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};