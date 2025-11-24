@extends('layouts.app')

@php
    $moodLabels = [1 => 'Buruk', 2 => 'Sedih', 3 => 'Netral', 4 => 'Baik', 5 => 'Sangat Baik'];
@endphp

@section('content')
    <div class="row g-3 py-3">
        <div class="col-lg-8">
            <div class="dash-hero h-100">
                <div class="d-flex justify-content-between align-items-start mb-3 position-relative z-1">
                    <div>
                        <span class="section-title text-light">Dashboard</span>
                        <h4 class="fw-bold mt-1 mb-1">Halo, {{ $user->name }}!</h4>
                        <p class="mb-0 text-light text-opacity-75">Pantau mood, jurnal, dan hasil self-check secara cepat.</p>
                    </div>
                    <div class="d-flex gap-2">
                        <a href="{{ route('daily-mood.create') }}" class="btn btn-gradient-light">Catat Mood</a>
                        <a href="{{ route('self-check.create') }}" class="btn btn-outline-light">Ambil Self-Check</a>
                    </div>
                </div>
                <div class="row g-3 position-relative z-1">
                    <div class="col-md-6">
                        <div class="stat-card h-100 position-relative overflow-hidden">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="fw-semibold">Mood Hari Ini</div>
                                @if($todayMood)
                                    <span class="badge badge-mood-{{ $todayMood->mood_level }}">{{ $moodLabels[$todayMood->mood_level] }}</span>
                                @else
                                    <span class="badge text-bg-light">Belum dicatat</span>
                                @endif
                            </div>
                            @if($todayMood)
                                <p class="mb-1 text-body-secondary">Pemicu: {{ $todayMood->trigger_tag ?? '-' }}</p>
                                <small class="text-body-secondary">Dicatat {{ $todayMood->log_date->format('d M Y') }}</small>
                            @else
                                <p class="mb-0 text-body-secondary">Catat mood untuk membuka insight mingguan.</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="stat-card h-100 position-relative overflow-hidden">
                            <div class="fw-semibold mb-2 d-flex align-items-center gap-2">
                                Wawasan Minggu Ini
                            </div>
                            @forelse($weeklyMoods as $mood)
                                <div class="d-flex align-items-center mb-2">
                                    <div class="me-2" style="width: 42px;">{{ $mood->log_date->format('D') }}</div>
                                    <div class="flex-grow-1 progress-modern">
                                        <div class="bar" style="width: {{ $mood->mood_level * 20 }}%;"></div>
                                    </div>
                                    <span class="ms-2 badge rounded-pill badge-mood-{{ $mood->mood_level }}">{{ $mood->mood_level }}</span>
                                </div>
                            @empty
                                <p class="text-body-secondary mb-0">Belum ada data 7 hari terakhir.</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="stat-card h-100">
                <div class="label-animated mb-2">Aksi Cepat</div>
                <div class="d-grid gap-2">
                    <a href="{{ route('journeys.create') }}" class="btn btn-gradient-light"><i class="bi bi-journal-text me-2"></i>Tulis Journey</a>
                    <a href="{{ route('journeys.index') }}" class="btn btn-gradient-light"><i class="bi bi-collection me-2"></i>Lihat Semua Journey</a>
                    <a href="{{ route('profile.edit') }}" class="btn btn-gradient-light"><i class="bi bi-person-gear me-2"></i>Pengaturan Profil</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3 pb-4">
        <div class="col-lg-6">
            <div class="card-list p-3 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span class="section-title">Mood Journey</span>
                        <h5 class="fw-bold mt-1">Catatan Terbaru</h5>
                    </div>
                    <a href="{{ route('journeys.index') }}" class="btn btn-sm btn-gradient-light">Lihat Semua</a>
                </div>
                @forelse($recentJournals as $journal)
                    <div class="item mb-2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-semibold">{{ $journal->title ?? 'Tanpa Judul' }}</div>
                            <small class="text-body-secondary">{{ $journal->journal_date->format('d M Y') }}</small>
                        </div>
                        <p class="mb-1 text-body-secondary">{{ \Illuminate\Support\Str::limit($journal->content, 120) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-body-secondary">{{ $journal->dailyMood?->trigger_tag ?? 'Tanpa pemicu' }}</small>
                            <a href="{{ route('journeys.edit', $journal) }}" class="small">Lihat / Edit</a>
                        </div>
                    </div>
                @empty
                    <p class="text-body-secondary mb-0">Belum ada jurnal. Mulai dengan menulis refleksi singkat.</p>
                @endforelse
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-list p-3 h-100">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <span class="section-title">Self-Check</span>
                        <h5 class="fw-bold mt-1">Hasil Terakhir</h5>
                    </div>
                    <a href="{{ route('self-check.create') }}" class="btn btn-sm btn-gradient-light">Ambil Tes</a>
                </div>
                @if($latestSelfCheck)
                    <div class="item">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="fw-semibold">Kategori: {{ $latestSelfCheck->category }}</div>
                            <small class="text-body-secondary">{{ $latestSelfCheck->test_date->format('d M Y') }}</small>
                        </div>
                        <p class="mb-1 text-body-secondary">Skor: {{ $latestSelfCheck->score }}</p>
                        <p class="mb-0">{{ $latestSelfCheck->recommendation_content }}</p>
                        <a href="{{ route('self-check.show', $latestSelfCheck) }}" class="small">Detail</a>
                    </div>
                @else
                    <p class="text-body-secondary mb-0">Belum ada hasil. Lakukan Self-Check untuk rekomendasi awal.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
