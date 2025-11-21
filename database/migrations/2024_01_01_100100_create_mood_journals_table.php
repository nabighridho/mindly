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
        Schema::create('mood_journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('daily_mood_id')->nullable()->constrained('daily_moods')->nullOnDelete();
            $table->string('title')->nullable();
            $table->text('content');
            $table->date('journal_date');
            $table->timestamps();
            $table->softDeletes();

            $table->index('user_id');
            $table->index('journal_date');
            $table->index('daily_mood_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mood_journals');
    }
};
