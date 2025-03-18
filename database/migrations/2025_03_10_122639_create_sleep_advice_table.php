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
        Schema::create('sleep_advice', function (Blueprint $table) {
            $table->id();
            $table->string('advice_title');
            $table->text('description');
            $table->enum('advice_type', ['Sleep Hygiene', 'Exercise', 'Diet', 'Environment', 'Mental Health', 'Routine', 'Technology', 'Lifestyle']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sleep_advice');
    }
};
