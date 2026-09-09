<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | EMPRESA
            |--------------------------------------------------------------------------
            */

            $table->foreignId('company_id')
                ->constrained()
                ->restrictOnDelete();


            /*
            |--------------------------------------------------------------------------
            | INFORMACIÓN DE LA FACTURA
            |--------------------------------------------------------------------------
            */

            $table->string('invoice_number', 100);

            $table->date('period_start');

            $table->date('period_end');


            /*
            |--------------------------------------------------------------------------
            | TOTALES
            |--------------------------------------------------------------------------
            */

            $table->decimal('subtotal', 12, 2)
                ->default(0);

            $table->decimal('tax', 12, 2)
                ->default(0);

            $table->decimal('total', 12, 2)
                ->default(0);


            /*
            |--------------------------------------------------------------------------
            | ESTADO
            |--------------------------------------------------------------------------
            */

            $table->string('status', 30)
                ->default('draft');


            /*
            |--------------------------------------------------------------------------
            | USUARIO
            |--------------------------------------------------------------------------
            */

            $table->foreignId('generated_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();


            /*
            |--------------------------------------------------------------------------
            | FECHA DE GENERACIÓN
            |--------------------------------------------------------------------------
            */

            $table->timestamp('generated_at')
                ->nullable();


            $table->timestamps();


            /*
            |--------------------------------------------------------------------------
            | ÍNDICES
            |--------------------------------------------------------------------------
            */

            $table->index('company_id');

            $table->index('invoice_number');

            $table->index([
                'period_start',
                'period_end'
            ]);

            $table->index('status');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};