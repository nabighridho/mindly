@extends('layouts.app')

@section('content')
    <div class="journal-hero d-flex justify-content-between align-items-center gap-3 mb-3">
        <div class="position-relative z-1">
            <span class="section-title text-light">Mood Journey</span>
            <h4 class="fw-bold mb-1">Catatan & Refleksi</h4>
            <p class="mb-0 text-light text-opacity-75">Simpan momen, pemicu, dan insight harianmu.</p>
        </div>
        <div class="d-flex gap-2 position-relative z-1">
            <a href="{{ route('journeys.create') }}" class="btn btn-gradient-light"><i class="bi bi-plus-lg me-1"></i>Tambah Journey</a>
        </div>
    </div>

    <div class="journal-filter p-4 mb-3">
        <form method="GET" class="row g-3 align-items-end">
            <div class="col-md-3">
                <label class="form-label">Dari Tanggal</label>
                <input type="date" name="from_date" value="{{ request('from_date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Sampai</label>
                <input type="date" name="to_date" value="{{ request('to_date') }}" class="form-control">
            </div>
            <div class="col-md-3">
                <label class="form-label">Mood Terkait</label>
                <select name="mood_level" class="form-select">
                    <option value="">Semua</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}" @selected(request('mood_level') == $i)>Level {{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button class="btn btn-dark flex-grow-1" type="submit">Filter</button>
                <a href="{{ route('journeys.index') }}" class="btn btn-outline-dark flex-grow-1">Reset</a>
            </div>
        </form>
    </div>

    <div class="glass-card p-3 journal-table">
        <div class="journal-grid">
            @forelse($journals as $journal)
                <div class="journal-card">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <span class="badge text-bg-light text-uppercase">{{ $journal->journal_date->format('d M Y') }}</span>
                        @if($journal->dailyMood)
                            <span class="badge rounded-pill badge-mood-{{ $journal->dailyMood->mood_level }}">Level {{ $journal->dailyMood->mood_level }}</span>
                        @else
                            <span class="badge text-bg-light">-</span>
                        @endif
                    </div>
                    <h5>{{ $journal->title ?? 'Tanpa Judul' }}</h5>
                    <p>{{ \Illuminate\Support\Str::limit($journal->content, 90) }}</p>
                    <div class="d-flex justify-content-between align-items-center journal-actions">
                        <small class="text-body-secondary">{{ $journal->dailyMood?->trigger_tag ?? 'Tanpa pemicu' }}</small>
                        <div class="d-flex gap-2">
                            <a href="{{ route('journeys.edit', $journal) }}" class="btn btn-sm btn-outline-dark">Edit</a>
                            <form action="{{ route('journeys.destroy', $journal) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus catatan ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="journal-card text-center text-body-secondary">Belum ada jurnal.</div>
            @endforelse
        </div>
        <div class="mt-3">
            {{ $journals->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
