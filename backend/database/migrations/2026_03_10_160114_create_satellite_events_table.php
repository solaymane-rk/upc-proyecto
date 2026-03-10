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
        Schema::create('satellite_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satellite_id')->constrained()->onDelete('cascade');
            $table->string('event_type'); // 'mode_change', 'alert', 'maintenance'
            $table->string('old_value')->nullable(); // Valor anterior (ej: modo anterior)
            $table->string('new_value')->nullable(); // Valor nuevo (ej: modo nuevo)
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('satellite_events');
    }
};
