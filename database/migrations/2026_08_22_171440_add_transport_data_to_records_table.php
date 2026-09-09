<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('records', function (Blueprint $table) {

            $table->string('origin')
                ->nullable()
                ->after('image');

            $table->string('destination')
                ->nullable()
                ->after('origin');

            $table->integer('quantity')
                ->nullable()
                ->after('destination');

            $table->string('quantity_type')
                ->nullable()
                ->after('quantity');

        });
    }

    public function down(): void
    {
        Schema::table('records', function (Blueprint $table) {

            $table->dropColumn([
                'origin',
                'destination',
                'quantity',
                'quantity_type',
            ]);

        });
    }
};