<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoice_records', function (Blueprint $table) {

            if (!Schema::hasColumn('invoice_records', 'billing_paps')) {
                $table->string('billing_paps', 255)
                    ->nullable()
                    ->after('billing_invoice');
            }

            if (!Schema::hasColumn('invoice_records', 'pallets')) {
                $table->decimal('pallets', 12, 2)
                    ->nullable()
                    ->after('billing_paps');
            }

            if (!Schema::hasColumn('invoice_records', 'additional_charge_type')) {
                $table->string('additional_charge_type', 255)
                    ->nullable()
                    ->after('pallets');
            }

            if (!Schema::hasColumn('invoice_records', 'additional_charge_quantity')) {
                $table->decimal('additional_charge_quantity', 12, 2)
                    ->default(0)
                    ->after('additional_charge_type');
            }

            if (!Schema::hasColumn('invoice_records', 'additional_charge_unit_price')) {
                $table->decimal('additional_charge_unit_price', 12, 2)
                    ->default(0)
                    ->after('additional_charge_quantity');
            }

            if (!Schema::hasColumn('invoice_records', 'additional_charge_amount')) {
                $table->decimal('additional_charge_amount', 12, 2)
                    ->default(0)
                    ->after('additional_charge_unit_price');
            }
        });
    }

    public function down(): void
    {
        Schema::table('invoice_records', function (Blueprint $table) {

            $columns = [
                'billing_paps',
                'pallets',
                'additional_charge_type',
                'additional_charge_quantity',
                'additional_charge_unit_price',
                'additional_charge_amount',
            ];

            foreach ($columns as $column) {

                if (Schema::hasColumn(
                    'invoice_records',
                    $column
                )) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};