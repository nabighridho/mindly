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
        Schema::dropIfExists('user_preferences');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique()->constrained()->cascadeOnDelete();
            $table->boolean('receive_email_reminder')->default(false);
            $table->boolean('allow_data_for_research')->default(false);
            $table->time('default_reminder_time')->nullable();
            $table->timestamps();
        });
    }
};
