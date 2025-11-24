<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('mood_journals')) {
            Schema::rename('mood_journals', 'mood_journeys');
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('mood_journeys')) {
            Schema::rename('mood_journeys', 'mood_journals');
        }
    }
};
