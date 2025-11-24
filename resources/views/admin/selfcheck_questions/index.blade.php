@extends('layouts.app')

@section('content')
    <div class="py-3">
        <div class="admin-hero mb-3">
            <div class="d-flex justify-content-between align-items-start position-relative z-1">
                <div>
                    <span class="section-title text-light">Admin</span>
                    <h4 class="fw-bold mt-1 text-white">Pertanyaan Self-Check</h4>
                    <p class="text-light text-opacity-75 mb-0">Tambah, edit, dan hapus daftar pertanyaan yang digunakan pada tes Self-Check pengguna.</p>
                </div>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-sm btn-outline-light">Kembali ke ringkasan</a>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-4">
                <div class="admin-card p-3">
                    <h6 class="fw-bold mb-3">Tambah Pertanyaan</h6>
                    <form method="POST" action="{{ route('admin.selfcheck-questions.store') }}">
                        @csrf
                        <div class="mb-2">
                            <label class="form-label">Teks pertanyaan</label>
                            <textarea name="question" class="form-control" rows="3" maxlength="255" required>{{ old('question') }}</textarea>
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Urutan</label>
                            <input type="number" name="sort_order" class="form-control" min="1" max="255" value="{{ old('sort_order', $nextOrder) }}">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" id="is_active_new" class="form-check-input" value="1" @checked(old('is_active', true))>
                            <label for="is_active_new" class="form-check-label">Aktifkan</label>
                        </div>
                        <button class="btn btn-gradient-light w-100">Simpan</button>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="admin-table-card p-3">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h6 class="fw-bold mb-0">Daftar Pertanyaan ({{ $questions->count() }})</h6>
                        <small class="text-body-secondary">Urutkan dengan kolom "Urutan".</small>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th style="width: 45%;">Pertanyaan</th>
                                    <th style="width: 15%;">Urutan</th>
                                    <th style="width: 15%;">Status</th>
                                    <th class="text-end" style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($questions as $question)
                                    <tr>
                                        <td>
                                            <input type="text" name="question" form="update-question-{{ $question->id }}" class="form-control" value="{{ $question->question }}" maxlength="255" required>
                                        </td>
                                        <td>
                                            <input type="number" name="sort_order" form="update-question-{{ $question->id }}" class="form-control" min="1" max="255" value="{{ $question->sort_order }}" required>
                                        </td>
                                        <td>
                                            <select name="is_active" form="update-question-{{ $question->id }}" class="form-select">
                                                <option value="1" @selected($question->is_active)>Aktif</option>
                                                <option value="0" @selected(!$question->is_active)>Nonaktif</option>
                                            </select>
                                        </td>
                                        <td class="text-end">
                                            <form id="update-question-{{ $question->id }}" method="POST" action="{{ route('admin.selfcheck-questions.update', $question) }}" class="d-inline">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                                <div class="d-flex justify-content-end gap-2">
                                                    <button form="update-question-{{ $question->id }}" class="btn btn-sm btn-outline-primary">Simpan</button>
                                                    <form method="POST" action="{{ route('admin.selfcheck-questions.destroy', $question) }}" onsubmit="return confirm('Hapus pertanyaan ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-outline-danger">Hapus</button>
                                                    </form>
                                                </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-body-secondary">Belum ada pertanyaan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
