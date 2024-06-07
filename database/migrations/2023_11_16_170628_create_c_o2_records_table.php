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
        Schema::create('c_o2_records', function (Blueprint $table) {
            $table->id();
            $table->string('co2_type');
            $table->decimal('co2_value', 8, 2);
            $table->timestamps(); // This will add 'created_at' and 'updated_at' columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_o2_records');
    }
};
