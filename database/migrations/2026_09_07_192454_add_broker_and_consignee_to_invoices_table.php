<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('invoices', function (Blueprint $table) {

            $table->foreignId('broker_id')
                ->nullable()
                ->after('company_id')
                ->constrained('brokers')
                ->nullOnDelete();

            $table->foreignId('consignee_id')
                ->nullable()
                ->after('broker_id')
                ->constrained('consignees')
                ->nullOnDelete();

            $table->index('broker_id');
            $table->index('consignee_id');
        });
    }

    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {

            $table->dropForeign(['broker_id']);
            $table->dropForeign(['consignee_id']);

            $table->dropIndex(['broker_id']);
            $table->dropIndex(['consignee_id']);

            $table->dropColumn([
                'broker_id',
                'consignee_id',
            ]);
        });
    }
};