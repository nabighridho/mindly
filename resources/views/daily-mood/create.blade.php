@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-lg-8">
            <div class="journal-form-card p-4 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <span class="section-title">Daily Mood</span>
                        <h4 class="fw-bold mb-1">Catat Mood Harian</h4>
                        <p class="text-body-secondary mb-0">Pilih skala emosi hari ini dan simpan pemicu utama.</p>
                    </div>
                    <span class="badge text-bg-light">{{ now()->format('d M Y') }}</span>
                </div>
                <form method="POST" action="{{ route('daily-mood.store') }}">
                    @csrf
                    <div class="row g-3 align-items-center">
                        <div class="col-md-8">
                            <label class="form-label">Bagaimana perasaanmu hari ini?</label>
                            <div class="d-flex gap-2 flex-wrap">
                                @php
                                    $options = [
                                        1 => ['icon' => 'bi-emoji-frown', 'label' => 'Buruk'],
                                        2 => ['icon' => 'bi-emoji-expressionless', 'label' => 'Sedih'],
                                        3 => ['icon' => 'bi-emoji-neutral', 'label' => 'Netral'],
                                        4 => ['icon' => 'bi-emoji-smile', 'label' => 'Baik'],
                                        5 => ['icon' => 'bi-emoji-laughing', 'label' => 'Sangat Baik'],
                                    ];
                                @endphp
                                @foreach($options as $value => $option)
                                    <input
                                        type="radio"
                                        class="btn-check"
                                        name="mood_level"
                                        id="mood_{{ $value }}"
                                        value="{{ $value }}"
                                        @checked(old('mood_level') == $value)
                                        required
                                    >
                                    <label for="mood_{{ $value }}" class="emoji-button d-flex align-items-center justify-content-center">
                                        <div class="text-center">
                                            <i class="bi {{ $option['icon'] }} fs-4"></i>
                                            <div class="small fw-semibold mt-1">{{ $option['label'] }}</div>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Pemicu utama (opsional)</label>
                            <select class="form-select" name="trigger_tag">
                                <option value="">- Tidak ada -</option>
                                <option>Pekerjaan</option>
                                <option>Keluarga</option>
                                <option>Kesehatan</option>
                                <option>Sosial</option>
                                <option>Keuangan</option>
                                <option>Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3 d-flex justify-content-between align-items-center">
                        <div>
                            <label class="form-label">Tanggal</label>
                            <input type="date" name="log_date" class="form-control" value="{{ now()->toDateString() }}">
                        </div>
                        <button class="btn btn-gradient-save btn-lg">Simpan</button>
                    </div>
                </form>
            </div>
            <div class="glass-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Riwayat Singkat</h5>
                    <span class="text-body-secondary">7 entri terakhir</span>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle table-glass">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Mood</th>
                                <th>Pemicu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($recent as $item)
                                <tr>
                                    <td>{{ $item->log_date->format('d M Y') }}</td>
                                    <td>
                                        <span class="badge rounded-pill badge-mood-{{ $item->mood_level }}">{{ $item->mood_level }}</span>
                                    </td>
                                    <td>{{ $item->trigger_tag ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="3" class="text-center text-body-secondary">Belum ada catatan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
