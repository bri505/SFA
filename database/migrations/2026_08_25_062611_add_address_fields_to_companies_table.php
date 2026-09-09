<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->string('address')->nullable()->after('tax_id');

            $table->string('city')->nullable()->after('address');

            $table->string('state')->nullable()->after('city');

            $table->string('postal_code', 10)->nullable()->after('state');

            $table->string('phone')->nullable()->after('postal_code');

            $table->string('contact')->nullable()->after('phone');

            $table->string('email')->nullable()->after('contact');
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {

            $table->dropColumn([
                'address',
                'city',
                'state',
                'postal_code',
                'phone',
                'contact',
                'email',
            ]);
        });
    }
};
