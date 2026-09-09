<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | IVA
            |--------------------------------------------------------------------------
            */

            $table->boolean('tax_enabled')
                ->default(true)
                ->after('subtotal');

            $table->decimal('tax_rate', 5, 2)
                ->default(16)
                ->after('tax_enabled');


            /*
            |--------------------------------------------------------------------------
            | SHIPPING & HANDLING
            |--------------------------------------------------------------------------
            */

            $table->boolean('shipping_handling_enabled')
                ->default(false)
                ->after('tax');

            $table->decimal('shipping_handling_rate', 5, 2)
                ->default(0)
                ->after('shipping_handling_enabled');

            $table->decimal('shipping_handling_amount', 12, 2)
                ->default(0)
                ->after('shipping_handling_rate');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {

            $table->dropColumn([
                'tax_enabled',
                'tax_rate',
                'shipping_handling_enabled',
                'shipping_handling_rate',
                'shipping_handling_amount',
            ]);

        });
    }
};