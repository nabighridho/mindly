@extends('layouts.app')

@section('content')
    <div class="py-3">
        <div class="admin-hero mb-3">
            <div class="d-flex justify-content-between align-items-start position-relative z-1">
                <div>
                    <div class="admin-badge mb-2">ADMIN</div>
                    <h4 class="fw-bold mt-1 text-white">Ringkasan Sistem</h4>
                    <p class="text-light text-opacity-75 mb-0">Data agregat. Konten journey tidak dapat diakses langsung.</p>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-sm btn-gradient-light">Kelola Pengguna</a>
                    <a href="{{ route('admin.selfcheck-questions.index') }}" class="btn btn-sm btn-outline-light">Kelola Self-Check</a>
                </div>
            </div>
        </div>
        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <div class="admin-stat">
                    <div class="text-body-secondary">Total Pengguna</div>
                    <div class="fs-3 fw-bold">{{ $totalUsers }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin-stat">
                    <div class="text-body-secondary">Daily Mood</div>
                    <div class="fs-3 fw-bold">{{ $totalDailyMoods }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin-stat">
                    <div class="text-body-secondary">Mood Journey</div>
                    <div class="fs-3 fw-bold">{{ $totalJournals }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="admin-stat">
                    <div class="text-body-secondary">Self-Check</div>
                    <div class="fs-3 fw-bold">{{ $selfCheckByCategory->sum('total') }}</div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-6">
                <div class="admin-card p-3 h-100">
                    <h6 class="fw-bold mb-3">Distribusi Mood</h6>
                        @foreach($moodDistribution as $item)
                            @php
                                $barWidth = $totalDailyMoods > 0 ? ($item->total / $totalDailyMoods) * 100 : 0;
                            @endphp
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-2">Level {{ $item->mood_level }}</div>
                                <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar admin-progress" style="--bar-width: {{ $barWidth }}%;"></div>
                            </div>
                            <span class="ms-2 small">{{ $item->total }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-6">
                <div class="admin-card p-3 h-100">
                    <h6 class="fw-bold mb-3">Self-Check per Kategori</h6>
                    @foreach($selfCheckByCategory as $item)
                        @php
                            $catTotal = $selfCheckByCategory->sum('total');
                            $catWidth = $catTotal > 0 ? ($item->total / $catTotal) * 100 : 0;
                        @endphp
                            <div class="d-flex align-items-center mb-2">
                                <div class="me-2">{{ $item->category }}</div>
                                <div class="progress flex-grow-1" style="height: 8px;">
                                <div class="progress-bar admin-progress-dark bg-dark" style="--bar-width: {{ $catWidth }}%;"></div>
                            </div>
                            <span class="ms-2 small">{{ $item->total }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row g-3 mt-3">
            <div class="col-lg-6">
                <div class="admin-card p-3 h-100">
                    <h6 class="fw-bold mb-3">Pengguna Terbaru</h6>
                    <ul class="list-unstyled mb-0">
                        @foreach($latestUsers as $user)
                            <li class="d-flex justify-content-between align-items-center border-bottom py-2">
                                <div>
                                    <div class="fw-semibold">{{ $user->name }}</div>
                                    <small class="text-body-secondary">{{ $user->email }}</small>
                                </div>
                                <span class="badge text-bg-light">{{ $user->created_at->format('d M') }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="admin-card p-3 h-100">
                    <h6 class="fw-bold mb-3">Aktivitas Terakhir</h6>
                    <ul class="list-unstyled mb-0">
                        @forelse($recentLogs as $log)
                            <li class="border-bottom py-2">
                                <div class="fw-semibold">{{ $log->activity_type }}</div>
                                <small class="text-body-secondary">{{ $log->description }}</small><br>
                                <small class="text-body-secondary">{{ $log->created_at->timezone('Asia/Jakarta')->format('d M H:i') }}</small>
                            </li>
                        @empty
                            <li class="text-body-secondary">Belum ada aktivitas.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
