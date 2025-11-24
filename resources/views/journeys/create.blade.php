@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-lg-8">
            <div class="journal-form-card p-4">
                <h4 class="fw-bold mb-1">Mood Journey Baru</h4>
                <p class="text-body-secondary mb-3">Catat refleksi dan pemicu utama hari ini.</p>
                <form method="POST" action="{{ route('journeys.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul (opsional)</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-control">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Jurnal</label>
                            <input type="date" name="journal_date" value="{{ old('journal_date', now()->toDateString()) }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tautkan ke Daily Mood (opsional)</label>
                            <select name="daily_mood_id" class="form-select">
                                <option value="">- Tidak ditautkan -</option>
                                @foreach($moods as $mood)
                                    <option value="{{ $mood->id }}" @selected(old('daily_mood_id') == $mood->id)>
                                        {{ $mood->log_date->format('d M') }} - Level {{ $mood->mood_level }} ({{ $mood->trigger_tag ?? 'tanpa pemicu' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Isi</label>
                        <textarea name="content" class="form-control" rows="6" required>{{ old('content') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('journeys.index') }}" class="btn btn-outline-dark">Kembali</a>
                        <button class="btn btn-gradient-save">Simpan Journey</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
