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
        Schema::create('selfcheck_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('selfcheck_result_id')->constrained()->cascadeOnDelete();
            $table->foreignId('selfcheck_question_id')->nullable()->constrained()->nullOnDelete();
            $table->unsignedTinyInteger('position');
            $table->unsignedTinyInteger('answer');
            $table->string('question_text_snapshot', 255);
            $table->timestamps();

            $table->index(['selfcheck_result_id', 'position']);
        });

        Schema::table('selfcheck_results', function (Blueprint $table) {
            $table->unsignedInteger('question_version')->default(1)->after('raw_answers');
        });

        Schema::table('selfcheck_questions', function (Blueprint $table) {
            $table->unsignedInteger('version')->default(1)->after('sort_order');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('selfcheck_questions', function (Blueprint $table) {
            $table->dropColumn('version');
        });

        Schema::table('selfcheck_results', function (Blueprint $table) {
            $table->dropColumn('question_version');
        });

        Schema::dropIfExists('selfcheck_answers');
    }
};
