@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-4">
        <div class="col-lg-8">
            <div class="glass-card p-4 mb-3">
                <h4 class="fw-bold mb-3">Profil & Preferensi</h4>
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <small class="text-body-secondary">Data sensitif disimpan dengan enkripsi.</small>
                        <button class="btn btn-primary" style="background: linear-gradient(120deg, #0f3c8c, #2f6bce); border: none;">Simpan</button>
                    </div>
                </form>
            </div>

            <div class="glass-card p-4">
                <h5 class="fw-bold mb-3">Ubah Kata Sandi</h5>
                <form method="POST" action="{{ route('profile.password') }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Kata sandi saat ini</label>
                        <input type="password" name="current_password" class="form-control" required>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Kata sandi baru</label>
                            <input type="password" name="new_password" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Konfirmasi</label>
                            <input type="password" name="new_password_confirmation" class="form-control" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-outline-dark">Perbarui Kata Sandi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
