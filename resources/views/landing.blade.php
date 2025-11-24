@extends('layouts.app')

@section('content')
    <section class="row align-items-center g-4 py-4">
        <div class="col-lg-6" data-aos="fade-right">
            <span class="section-title">Penyembuhan dimulai di sini</span>
            <h1 class="display-5 fw-bold mt-3 mb-3">Mindly: Daily Self Growth Companion.</h1>
            <p class="lead text-dark-emphasis">Lacak, pahami, dan kuasai pola emosional harian anda dengan antarmuka yang intuitif dan aman.</p>
            <div class="d-flex gap-3 mt-4">
                <a href="{{ auth()->check() ? route('dashboard') : route('register') }}" class="btn btn-lg text-white btn-landing-gradient">Mulai Sekarang</a>
                <a href="#feature" class="btn btn-lg btn-landing-soft">Pelajari Lebih Lanjut</a>
            </div>
            <div class="mt-4 d-flex gap-3">
                <div class="glass-card p-3">
                    <div class="fw-semibold">Daily Mood</div>
                    <small class="text-body-secondary">Catat emosi harian dalam hitungan detik.</small>
                </div>
                <div class="glass-card p-3">
                    <div class="fw-semibold">Mood Journey</div>
                    <small class="text-body-secondary">Visualisasi tren dengan grafik elegan.</small>
                </div>
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <div class="p-4 hero-gradient rounded-4 position-relative overflow-hidden">
                <div class="mb-3">
                    <span class="badge rounded-pill bg-primary-subtle text-primary">Fitur yang tersedia</span>
                </div>
                <div class="glass-card p-4 mb-3 feature-card">
                    <div class="d-flex align-items-center gap-3">
                        <div class="emoji-button d-flex align-items-center justify-content-center">
                            <i class="bi bi-emoji-smile fs-4"></i>
                        </div>
                        <div>
                            <div class="fw-semibold">Catatan Mood Hari Ini</div>
                            <small class="text-body-secondary">Pilih skala 1-5 & pemicu utama.</small>
                        </div>
                    </div>
                </div>
                <div class="glass-card p-4 mb-3 feature-card">
                    <div class="fw-semibold mb-2">Mood Journey</div>
                    <div class="progress rounded-pill" style="height: 10px;">
                        <div class="progress-bar" style="width: 72%; background: linear-gradient(120deg, #0f3c8c, #2f6bce);"></div>
                    </div>
                    <small class="text-body-secondary">Tren 7 hari terakhir</small>
                </div>
                <div class="glass-card p-4 feature-card">
                    <div class="fw-semibold">Self-Check</div>
                    <small class="d-block text-body-secondary mb-2">Tes singkat berbasis skala Likert.</small>
                    <div class="d-flex gap-2">
                        <span class="badge text-bg-light border">Normal</span>
                        <span class="badge text-bg-light border">Ringan</span>
                        <span class="badge text-bg-light border">Sedang</span>
                        <span class="badge text-bg-light border">Parah</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="feature" class="py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="section-title">Fitur Inti</span>
                <h3 class="fw-bold mt-2">Alur Produk yang Terstruktur</h3>
                <p class="text-body-secondary mb-0">Mindly membantu mencatat, merefleksikan, dan memetakan perkembangan emosimu.</p>
            </div>
            <a href="{{ auth()->check() ? route('dashboard') : route('register') }}" class="btn btn-outline-dark">Jelajahi Dashboard</a>
        </div>
        <div class="row g-4">
            <div class="col-md-4" data-aos="fade-up">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="fw-semibold text-primary">Daily Mood</div>
                        <i class="bi bi-emoji-smile fs-4 text-primary"></i>
                    </div>
                    <p class="text-body-secondary">Catatan cepat 1-5 dengan pemicu utama. Dibatasi satu entri per hari untuk data yang konsisten.</p>
                    <span class="badge rounded-pill text-bg-primary">5 detik</span>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="fw-semibold text-primary">Mood Journey</div>
                        <i class="bi bi-graph-up fs-4 text-primary"></i>
                    </div>
                    <p class="text-body-secondary">Grafik tren mingguan/bulanan dengan keterkaitan jurnal. Soroti pola dan pemicu berulang.</p>
                    <span class="badge rounded-pill text-bg-info">Insight visual</span>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="glass-card p-4 h-100">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="fw-semibold text-primary">Self-Check</div>
                        <i class="bi bi-shield-check fs-4 text-primary"></i>
                    </div>
                    <p class="text-body-secondary">Form multi-step skala Likert. Skor dikategorikan (Normal, Ringan, Sedang, Parah) dengan rekomendasi edukatif.</p>
                    <span class="badge rounded-pill text-bg-warning">Screening awal</span>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="row g-4 align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="section-title">Mengapa Mindly</span>
                <h3 class="fw-bold mt-2">Desain menenangkan & ergonomis.</h3>
                <ul class="list-unstyled mt-3">
                    <li class="d-flex gap-3 align-items-start mb-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <span>Refleksi diri berbasis data, bukan sekadar jurnal teks.</span>
                    </li>
                    <li class="d-flex gap-3 align-items-start mb-2">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <span>Anonimitas & enkripsi mengikuti praktik aman.</span>
                    </li>
                    <li class="d-flex gap-3 align-items-start">
                        <i class="bi bi-check-circle-fill text-primary"></i>
                        <span>Konten edukasi terintegrasi pada hasil Self-Check.</span>
                    </li>
                </ul>
                <a href="{{ auth()->check() ? route('dashboard') : route('register') }}" class="btn btn-dark mt-3">Catat Mood Pertama</a>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <div class="glass-card p-4">
                    <h5 class="fw-bold mb-3">Alur Pengguna Baru</h5>
                    <ol class="ps-3">
                        <li class="mb-2">Daftar & login, lalu lakukan check-in Daily Mood pertama.</li>
                        <li class="mb-2">Tuliskan jurnal jika mood netral/negatif.</li>
                        <li class="mb-2">Lihat ringkasan tren mingguan pada Mood Journey.</li>
                        <li class="mb-2">Ambil Self-Check berkala dengan rekomendasi edukasi.</li>
                        <li class="mb-0">Pantau pola dan kelola kebiasaan self-care.</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="glass-card p-4 row g-4 align-items-center">
            <div class="col-md-8">
                <h4 class="fw-bold mb-2">Siap memulai perjalanan refleksi Anda?</h4>
                <p class="mb-0 text-body-secondary">Mindly bukan pengganti psikolog/psikiater. Gunakan Self-Check sebagai screening awal.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="{{ auth()->check() ? route('dashboard') : route('register') }}" class="btn btn-lg text-white btn-landing-gradient">Daftar Gratis</a>
            </div>
        </div>
    </section>
@endsection
