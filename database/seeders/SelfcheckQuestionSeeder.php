<?php

namespace Database\Seeders;

use App\Models\SelfcheckQuestion;
use Illuminate\Database\Seeder;

class SelfcheckQuestionSeeder extends Seeder
{
    /**
     * Seed default self-check questions.
     */
    public function run(): void
    {
        $questions = [
            'Saya merasa sulit untuk rileks hari ini.',
            'Saya mengalami perasaan cemas tanpa alasan jelas.',
            'Saya merasa mudah tersinggung atau gelisah.',
            'Saya sulit tidur atau mempertahankan kualitas tidur.',
            'Saya merasa sedih atau hampa untuk sebagian besar hari.',
            'Saya kehilangan minat pada aktivitas yang biasanya saya nikmati.',
            'Saya merasa sangat lelah meski tidak banyak beraktivitas.',
            'Saya merasa pikiran saya sulit berhenti dan terus berputar.',
            'Saya kesulitan berkonsentrasi pada tugas sehari-hari.',
            'Saya merasa lebih baik jika menarik diri dari orang lain.',
        ];

        foreach ($questions as $index => $question) {
            SelfcheckQuestion::updateOrCreate(
                ['question' => $question],
                ['sort_order' => $index + 1, 'is_active' => true]
            );
        }
    }
}
