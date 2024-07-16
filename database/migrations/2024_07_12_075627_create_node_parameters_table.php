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
        Schema::create('node_parameters', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('node_id')->constrained('nodes')->onDelete('cascade');
            $table->dateTime('date_time')->nullable();
            $table->decimal('current_value', 10, 4);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('node_parameters');
    }
};
