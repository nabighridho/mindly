@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-md-7 col-lg-6">
            <div class="glass-card p-4">
                <h3 class="fw-bold mb-3 text-center">Daftar Mindly</h3>
                <p class="text-center text-body-secondary">Buat akun baru untuk memulai catatan Daily Mood, Mood Journey, dan Self-Check.</p>
                <form method="POST" action="{{ route('register') }}" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Kata Sandi</label>
                            <input type="password" name="password" class="form-control form-control-lg" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" name="password_confirmation" class="form-control form-control-lg" required>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 btn-lg" style="background: linear-gradient(120deg, #0f3c8c, #2f6bce); border: none;">Buat Akun</button>
                </form>
                <p class="text-center mt-3 mb-0">Sudah punya akun? <a href="{{ route('login') }}">Masuk</a></p>
            </div>
        </div>
    </div>
@endsection
