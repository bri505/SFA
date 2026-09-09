<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('invoices', 'payment_status')) {
            Schema::table('invoices', function (Blueprint $table) {

                $table->string('payment_status')
                    ->default('pending')
                    ->after('status');

            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('invoices', 'payment_status')) {
            Schema::table('invoices', function (Blueprint $table) {

                $table->dropColumn('payment_status');

            });
        }
    }
};