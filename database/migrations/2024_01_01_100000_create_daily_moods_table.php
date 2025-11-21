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
        Schema::create('daily_moods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->tinyInteger('mood_level')->comment('1-5');
            $table->string('trigger_tag', 100)->nullable();
            $table->date('log_date');
            $table->timestamps();

            $table->unique(['user_id', 'log_date'], 'daily_moods_user_date_unique');
            $table->index(['user_id', 'log_date'], 'daily_moods_user_date_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_moods');
    }
};
