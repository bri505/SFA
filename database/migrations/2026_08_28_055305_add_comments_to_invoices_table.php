<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // La columna comments ya existe en la base de datos.
        // No hacemos ninguna modificación.
    }

    public function down(): void
    {
        // No eliminamos comments porque ya existía antes de esta migración.
    }
};