@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-lg-8">
            <div class="journal-form-card p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <h4 class="fw-bold mb-1">Edit Mood Journey</h4>
                        <small class="text-body-secondary">Perbarui catatan harian dan simpan perubahanmu.</small>
                    </div>
                    <span class="badge text-bg-light">{{ $journal->journal_date->format('d M Y') }}</span>
                </div>
                <form method="POST" action="{{ route('journeys.update', $journal) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Judul (opsional)</label>
                        <input type="text" name="title" value="{{ old('title', $journal->title) }}" class="form-control form-control-lg">
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Tanggal Jurnal</label>
                            <input type="date" name="journal_date" value="{{ old('journal_date', $journal->journal_date->toDateString()) }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Tautkan ke Daily Mood (opsional)</label>
                            <select name="daily_mood_id" class="form-select">
                                <option value="">- Tidak ditautkan -</option>
                                @foreach($moods as $mood)
                                    <option value="{{ $mood->id }}" @selected(old('daily_mood_id', $journal->daily_mood_id) == $mood->id)>
                                        {{ $mood->log_date->format('d M') }} - Level {{ $mood->mood_level }} ({{ $mood->trigger_tag ?? 'tanpa pemicu' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 mt-3">
                        <label class="form-label">Isi</label>
                        <textarea name="content" class="form-control" rows="7" required>{{ old('content', $journal->content) }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <small class="text-body-secondary">Pastikan isi tersimpan sebelum meninggalkan halaman.</small>
                        <div class="d-flex gap-2">
                        <a href="{{ route('journeys.index') }}" class="btn btn-outline-dark">Kembali</a>
                        <button class="btn btn-gradient-save">Simpan Perubahan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
