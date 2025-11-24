@extends('layouts.app')

@section('content')
    <div class="row justify-content-center py-5">
        <div class="col-md-6 col-lg-5">
            <div class="glass-card p-4">
                <h3 class="fw-bold mb-3 text-center">Masuk ke Mindly</h3>
                <p class="text-center text-body-secondary">Temui dashboard personal dan mulai check-in mood harian.</p>
                <form method="POST" action="{{ route('login') }}" class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-lg" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Ingat saya
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 btn-lg" style="background: linear-gradient(120deg, #0f3c8c, #2f6bce); border: none;">Masuk</button>
                </form>
                <p class="text-center mt-3 mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar</a></p>
            </div>
        </div>
    </div>
@endsection
