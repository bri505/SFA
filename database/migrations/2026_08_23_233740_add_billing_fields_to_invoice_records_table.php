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
        Schema::table('invoice_records', function (Blueprint $table) {

            $table->string('billing_invoice')
                ->nullable()
                ->after('record_id');

            $table->string('billing_paps')
                ->nullable()
                ->after('billing_invoice');

            $table->string('billing_fact')
                ->nullable()
                ->after('billing_paps');

            $table->decimal('pallets', 10, 2)
                ->nullable()
                ->after('billing_fact');

            $table->string('additional_charge_type')
                ->nullable()
                ->after('pallets');

            $table->decimal('additional_charge_quantity', 10, 2)
                ->nullable()
                ->after('additional_charge_type');

            $table->decimal('additional_charge_unit_price', 12, 2)
                ->nullable()
                ->after('additional_charge_quantity');

            $table->decimal('additional_charge_amount', 12, 2)
                ->default(0)
                ->after('additional_charge_unit_price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice_records', function (Blueprint $table) {

            $table->dropColumn([
                'billing_invoice',
                'billing_paps',
                'billing_fact',
                'pallets',
                'additional_charge_type',
                'additional_charge_quantity',
                'additional_charge_unit_price',
                'additional_charge_amount',
            ]);
        });
    }
};