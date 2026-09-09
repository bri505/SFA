<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoice_records', function (Blueprint $table) {

            $table->id();

            $table->foreignId('invoice_id')
                ->constrained('invoices')
                ->cascadeOnDelete();

            $table->foreignId('record_id')
                ->constrained('records')
                ->restrictOnDelete();

            $table->timestamps();


            /*
            |--------------------------------------------------------------------------
            | EVITAR DUPLICAR UN RECORD EN UNA FACTURA
            |--------------------------------------------------------------------------
            */

            $table->unique([
                'invoice_id',
                'record_id'
            ]);

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoice_records');
    }
};