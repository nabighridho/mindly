@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
                        <div class="col-lg-9">
            <div class="glass-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span class="section-title">Self-Check</span>
                        <h4 class="fw-bold mt-1">Screening singkat (skala 1-5)</h4>
                        <p class="text-body-secondary mb-0">Ini bukan diagnosis. Cari bantuan profesional jika diperlukan.</p>
                    </div>
                    <div class="badge text-bg-light text-wrap">Rahasia & hanya untuk Anda</div>
                </div>
                <div id="self-check-alert" class="alert alert-warning d-none" role="alert" tabindex="-1">
                    Masih ada pertanyaan yang belum diisi. Silakan lengkapi semuanya.
                </div>
                <form id="self-check-form" method="POST" action="{{ route('self-check.store') }}">
                    @csrf
                    @foreach($questions as $index => $question)
                        <div class="mb-3 selfcheck-card">
                            <div class="selfcheck-title">{{ $index + 1 }}. {{ $question->question }}</div>
                            <div class="selfcheck-answers">
                                @foreach($scale as $value => $label)
                                    <label class="selfcheck-choice">
                                        <input
                                            type="radio"
                                            name="answers[{{ $index }}]"
                                            id="q{{ $index }}_{{ $value }}"
                                            value="{{ $value }}"
                                            data-question="{{ $index }}"
                                            @checked(old('answers.'.$index) == $value)
                                            required
                                        >
                                        <span class="choice-pill">{{ $label }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-body-secondary">Skor lebih tinggi menunjukkan tingkat gejala yang lebih berat.</small>
                        <button class="btn btn-primary" style="background: linear-gradient(120deg, #0f3c8c, #2f6bce); border: none;">Kirim & Lihat Hasil</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .selfcheck-question {
        background: #f5f7fa;
        border: 1px solid #e1e7f2;
        box-shadow: 0 10px 24px rgba(15, 23, 42, 0.05);
    }

</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('self-check-form');
    const alertBox = document.getElementById('self-check-alert');
    const questionCount = {{ count($questions) }};

    if (!form) return;

    form.addEventListener('submit', (event) => {
        const answered = new Set(
            Array.from(form.querySelectorAll('input[type="radio"][name^="answers["]:checked'))
                .map((input) => input.dataset.question)
        );

        const missing = questionCount - answered.size;
        if (missing > 0) {
            event.preventDefault();
            alertBox.textContent = `Masih ada ${missing} pertanyaan yang belum diisi. Silakan lengkapi semuanya.`;
            alertBox.classList.remove('d-none');
            alertBox.focus();
        } else {
            alertBox.classList.add('d-none');
        }
    });
});
</script>
@endpush
