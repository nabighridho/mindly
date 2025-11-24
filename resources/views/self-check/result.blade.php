@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-lg-7">
            <div class="glass-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span class="section-title">Hasil Self-Check</span>
                        <h4 class="fw-bold mt-1">Kategori: {{ $result->category }}</h4>
                        <p class="text-body-secondary mb-0">Tes {{ $result->test_date->format('d M Y H:i') }} - skor {{ $result->score }}</p>
                    </div>
                    <a href="{{ route('self-check.create') }}" class="btn btn-outline-dark">Ambil Tes Lagi</a>
                </div>
                <div class="p-3 border rounded-3 mb-3 recommendation-box">
                    <div class="fw-semibold mb-2">Rekomendasi</div>
                    <p class="mb-0">{{ $result->recommendation_content }}</p>
                </div>
                <div class="alert alert-warning glass-card border-0">
                    <div class="fw-semibold mb-1">Disclaimer</div>
                    <small>Self-Check ini hanya screening awal, bukan diagnosis klinis. Jika Anda merasa tidak aman atau gejala berat, segera hubungi profesional kesehatan mental.</small>
                </div>
                <details class="mt-3">
                    <summary class="fw-semibold">Lihat jawaban mentah</summary>
                    <div class="mt-2 border rounded-3 p-2 bg-light-subtle">
                        @php
                            $scale = [1 => 'Tidak pernah', 2 => 'Jarang', 3 => 'Kadang', 4 => 'Sering', 5 => 'Sangat sering'];
                            $answers = $result->answers;
                        @endphp
                        @forelse($answers as $answer)
                            <div class="py-2 border-bottom">
                                <div class="small text-body-secondary mb-1">Pertanyaan {{ $answer->position }}</div>
                                <div class="fw-semibold">{{ $answer->question_text_snapshot }}</div>
                                <div class="text-body-secondary mt-1">Jawaban: {{ $answer->answer }} - {{ $scale[$answer->answer] ?? 'N/A' }}</div>
                            </div>
                        @empty
                            @php $legacy = $result->raw_answers ?? []; @endphp
                            @forelse($legacy as $idx => $ans)
                                <div class="py-2 border-bottom">
                                    <div class="small text-body-secondary mb-1">Pertanyaan {{ $idx + 1 }}</div>
                                    <div class="text-body-secondary">Jawaban: {{ $ans }}</div>
                                </div>
                            @empty
                                <div class="text-body-secondary">Tidak ada data jawaban.</div>
                            @endforelse
                        @endforelse
                    </div>
                </details>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .recommendation-box {
        background: #ffffff;
        border-color: rgba(15, 23, 42, 0.08);
        box-shadow: 0 12px 28px rgba(15, 23, 42, 0.06);
    }

</style>
@endpush
