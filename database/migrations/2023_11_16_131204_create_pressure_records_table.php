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
        Schema::create('pressure_records', function (Blueprint $table) {
            $table->id();
            $table->string('pressure_type');
            $table->decimal('pressure_value', 8, 2);
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pressure_records');
    }
};
