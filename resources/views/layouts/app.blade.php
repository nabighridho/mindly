<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mindly</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary-start: #8ec5ff;
            --primary-end: #c2e9fb;
            --glass: rgba(255, 255, 255, 0.16);
            --glass-border: rgba(255, 255, 255, 0.28);
            --soft-shadow: 0 18px 55px rgba(46, 123, 255, 0.18);
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Instrument Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: radial-gradient(circle at 5% 10%, rgba(255,255,255,0.18), transparent 20%),
                        radial-gradient(circle at 90% 80%, rgba(255,255,255,0.15), transparent 25%),
                        linear-gradient(135deg, #7aa9ff, #a2d8ff 35%, #d0f0ff 80%);
            min-height: 100vh;
            color: #0f172a;
        }

        .glass-card {
            background: var(--glass);
            border: 1px solid var(--glass-border);
            box-shadow: var(--soft-shadow);
            backdrop-filter: blur(14px);
            border-radius: 22px;
        }

        .nav-blur {
            background: rgba(255, 255, 255, 0.2);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
        }

        .section-title {
            letter-spacing: 0.08em;
            text-transform: uppercase;
            font-weight: 700;
            font-size: 0.85rem;
            background: linear-gradient(90deg, #000000, #1034a6, #000080, #191970, #4169e1, #000000);
            background-size: 350% 350%;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: brandShift 9s ease-in-out infinite;
        }

        .hero-gradient {
            background: linear-gradient(120deg, rgba(255,255,255,0.3), rgba(255,255,255,0.05));
            border: 1px solid rgba(255,255,255,0.25);
            backdrop-filter: blur(18px);
            box-shadow: 0 28px 70px rgba(13, 38, 103, 0.25);
        }

        .feature-card {
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.5s ease, box-shadow 0.5s ease;
            box-shadow: 0 18px 45px rgba(15, 60, 140, 0.12);
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(255,255,255,0.35), transparent 40%);
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .feature-card:hover {
            transform: rotateX(4deg) rotateY(-4deg) translateY(-6px);
            box-shadow: 0 28px 65px rgba(15, 60, 140, 0.2);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .badge-mood-1 { background: #fca5a5; }
        .badge-mood-2 { background: #fdba74; }
        .badge-mood-3 { background: #fcd34d; }
        .badge-mood-4 { background: #86efac; }
        .badge-mood-5 { background: #60a5fa; }

        .btn-landing-gradient {
            background: linear-gradient(120deg, #0f3c8c, #2f6bce);
            border: none;
            box-shadow: 0 12px 32px rgba(15, 60, 140, 0.35);
        }

        .btn-landing-soft {
            background: #ffffff;
            border: none;
            color: #0f3c8c;
            box-shadow: 0 10px 26px rgba(11, 35, 71, 0.1);
        }

        .btn-landing-gradient:hover {
            background: linear-gradient(120deg, #0d357c, #2a63ba);
        }

        .btn-landing-soft:hover {
            background: #f7fbff;
        }

        .emoji-button {
            width: 82px;
            height: 82px;
            border-radius: 20px;
            border: 1px solid rgba(10, 79, 191, 0.2);
            background: linear-gradient(145deg, rgba(255,255,255,0.92), rgba(240,245,255,0.98));
            font-size: 30px;
            transition: transform 0.18s ease, box-shadow 0.18s ease, border-color 0.18s ease;
            cursor: pointer;
            position: relative;
        }

        .emoji-button .small {
            font-size: 0.7rem;
            line-height: 1.1;
            max-width: 68px;
        }

        .emoji-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.12);
        }

        .btn-check:checked + .emoji-button {
            border-color: #2ec5ff;
            box-shadow: 0 14px 28px rgba(46, 197, 255, 0.28);
            background: linear-gradient(150deg, rgba(10,79,191,0.1), rgba(46,197,255,0.18));
            transform: translateY(-2px);
        }

        /* Self-check answer buttons */
        .selfcheck-option input.form-check-input {
            border: 2px solid #6b7280;
            background-color: #f1f5f9;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.08);
        }

        .selfcheck-option input.form-check-input:checked {
            border-color: #0f3c8c;
            background-color: #2f6bce;
            box-shadow: 0 4px 14px rgba(15, 60, 140, 0.35);
        }

        /* Enhanced self-check cards */
        .selfcheck-card {
            position: relative;
            border-radius: 18px;
            padding: 16px 14px 14px;
            background: linear-gradient(140deg, rgba(255, 255, 255, 0.9), rgba(240, 245, 255, 0.92));
            border: 1px solid rgba(10, 79, 191, 0.12);
            box-shadow: 0 12px 30px rgba(10, 79, 191, 0.1);
            overflow: hidden;
        }

        .selfcheck-card::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 25% 20%, rgba(46, 197, 255, 0.08), transparent 45%),
                        radial-gradient(circle at 80% 30%, rgba(10, 79, 191, 0.07), transparent 50%);
            pointer-events: none;
        }

        .selfcheck-title {
            position: relative;
            font-weight: 700;
            font-size: 1.2rem;
            color: #0f1f3a;
            margin-bottom: 12px;
        }

        .selfcheck-answers {
            position: relative;
            display: grid;
            grid-template-columns: repeat(5, minmax(0, 1fr));
            gap: 10px 12px;
            z-index: 1;
        }

        @media (max-width: 992px) {
            .selfcheck-answers {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 640px) {
            .selfcheck-answers {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .choice-pill {
                padding: 9px 10px;
                font-size: 0.92rem;
            }

            .selfcheck-title {
                font-size: 1.05rem;
            }
        }

        .selfcheck-choice input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }

        .choice-pill {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            border-radius: 12px;
            border: 1px solid rgba(15, 31, 58, 0.18);
            background: rgba(255, 255, 255, 0.9);
            color: #0f1f3a;
            font-weight: 600;
            letter-spacing: 0.01em;
            transition: transform 0.16s ease, box-shadow 0.16s ease, border-color 0.16s ease, background 0.16s ease;
            position: relative;
        }

        .choice-pill::before {
            content: '';
            width: 16px;
            height: 16px;
            border-radius: 50%;
            border: 2px solid rgba(15, 31, 58, 0.35);
            background: transparent;
            transition: all 0.16s ease;
        }

        .choice-pill:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 28px rgba(10, 79, 191, 0.16);
            border-color: rgba(10, 79, 191, 0.38);
        }

        .selfcheck-choice input:focus-visible + .choice-pill {
            outline: 2px solid rgba(46, 197, 255, 0.7);
            outline-offset: 3px;
        }

        .selfcheck-choice input:checked + .choice-pill {
            border-color: rgba(46, 197, 255, 0.9);
            background: linear-gradient(120deg, rgba(10, 79, 191, 0.14), rgba(46, 197, 255, 0.18));
            box-shadow: 0 14px 30px rgba(46, 197, 255, 0.18);
            color: #0a2a68;
        }

        .selfcheck-choice input:checked + .choice-pill::before {
            background: #2ec5ff;
            border-color: rgba(10, 79, 191, 0.8);
            box-shadow: inset 0 0 0 4px rgba(255, 255, 255, 0.9);
        }


        .footer-link a {
            color: inherit;
            text-decoration: none;
        }

        .footer-link a:hover {
            color: #0ea5e9;
        }

        .table-glass th, .table-glass td {
            border-color: rgba(255, 255, 255, 0.21);
        }

        /* Mood Journey enhanced */
        .journal-hero {
            background: linear-gradient(135deg, rgba(2, 20, 47, 0.92), rgba(10, 79, 191, 0.78));
            border-radius: 20px;
            padding: 20px;
            color: #eaf2ff;
            box-shadow: 0 18px 48px rgba(2, 20, 47, 0.28);
            position: relative;
            overflow: hidden;
        }

        .journal-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 30%, rgba(46, 197, 255, 0.25), transparent 50%),
                        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.12), transparent 45%);
            pointer-events: none;
        }

        .journal-filter {
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.94);
            box-shadow: 0 14px 32px rgba(10, 79, 191, 0.12);
            border: 1px solid rgba(10, 79, 191, 0.1);
        }

        .journal-table tbody tr {
            transition: transform 0.16s ease, box-shadow 0.16s ease, background 0.16s ease;
        }

        .journal-table tbody tr:hover {
            transform: translateY(-2px);
            background: rgba(10, 79, 191, 0.04);
            box-shadow: 0 10px 24px rgba(10, 79, 191, 0.14);
        }

        .journal-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 14px;
        }

        .journal-card {
            position: relative;
            padding: 16px;
            border-radius: 14px;
            background: linear-gradient(160deg, rgba(255,255,255,0.96), rgba(238,245,255,0.98));
            border: 1px solid rgba(10, 79, 191, 0.08);
            box-shadow: 0 12px 28px rgba(2, 20, 47, 0.12);
            overflow: hidden;
            transition: transform 0.16s ease, box-shadow 0.16s ease;
        }

        .journal-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 20%, rgba(46,197,255,0.12), transparent 35%),
                        radial-gradient(circle at 80% 10%, rgba(10,79,191,0.12), transparent 40%);
            pointer-events: none;
        }

        .journal-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 36px rgba(2, 20, 47, 0.16);
        }

        .journal-card h5 {
            font-weight: 700;
            margin-bottom: 6px;
            color: #0f1f3a;
        }

        .journal-card p {
            color: #4b5563;
            margin-bottom: 10px;
        }

        .journal-actions .btn {
            border-radius: 10px;
        }

        .journal-form-card {
            border-radius: 18px;
            background: linear-gradient(140deg, rgba(255, 255, 255, 0.96), rgba(240, 245, 255, 0.98));
            border: 1px solid rgba(10, 79, 191, 0.12);
            box-shadow: 0 16px 40px rgba(10, 79, 191, 0.14);
        }

        .btn-gradient-primary {
            background: linear-gradient(120deg, #0f3c8c, #2f6bce);
            border: none;
            box-shadow: 0 10px 24px rgba(15, 60, 140, 0.32);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn-gradient-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 28px rgba(15, 60, 140, 0.38);
        }

        .btn-gradient-save {
            background: linear-gradient(120deg, #33c7ff, #6ee7ff);
            border: none;
            color: #0b1f3f;
            box-shadow: 0 12px 26px rgba(51, 199, 255, 0.35);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn-gradient-save:hover {
            transform: translateY(-1px);
            box-shadow: 0 14px 30px rgba(51, 199, 255, 0.42);
        }

        .btn-gradient-light {
            background: linear-gradient(120deg, #46c4ff, #8fd3ff);
            border: none;
            color: #0b1f3f;
            box-shadow: 0 10px 22px rgba(70, 196, 255, 0.32);
            transition: transform 0.15s ease, box-shadow 0.15s ease;
        }

        .btn-gradient-light:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 26px rgba(70, 196, 255, 0.38);
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            .dash-hero,
            .journal-hero,
            .glass-card,
            .journal-form-card {
                padding: 16px;
            }

            .stat-card,
            .card-list {
                padding: 14px;
            }

            .emoji-button {
                width: 72px;
                height: 72px;
                border-radius: 16px;
            }

            .selfcheck-title {
                font-size: 1.05rem;
            }

            .selfcheck-answers {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .journal-grid {
                grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            }

            .d-flex.gap-2 > .btn,
            .d-grid.gap-2 > .btn {
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            h4, .display-5, .fw-bold {
                font-size: 1.15rem;
            }

            .choice-pill {
                padding: 8px 10px;
                font-size: 0.9rem;
            }

            .selfcheck-answers {
                grid-template-columns: repeat(1, minmax(0, 1fr));
            }

            .journal-grid {
                grid-template-columns: 1fr;
            }
        }


        /* Dashboard */
        .dash-hero {
            background: linear-gradient(135deg, rgba(2, 20, 47, 0.96), rgba(10, 79, 191, 0.8));
            border-radius: 20px;
            padding: 20px;
            color: #eaf2ff;
            box-shadow: 0 20px 48px rgba(2, 20, 47, 0.28);
            position: relative;
            overflow: hidden;
        }

        .dash-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 15% 25%, rgba(46,197,255,0.3), transparent 45%),
                        radial-gradient(circle at 85% 20%, rgba(255,255,255,0.15), transparent 50%);
            pointer-events: none;
        }

        .dash-hero .btn {
            border-radius: 12px;
        }

        .stat-card {
            border-radius: 16px;
            padding: 16px;
            background: linear-gradient(150deg, rgba(255, 255, 255, 0.97), rgba(243, 248, 255, 0.98));
            border: 1px solid rgba(10, 79, 191, 0.08);
            box-shadow: 0 14px 32px rgba(2, 20, 47, 0.12);
            transition: transform 0.16s ease, box-shadow 0.16s ease;
            color: #0f1f3a;
        }

        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 38px rgba(2, 20, 47, 0.16);
        }

        .progress-modern {
            height: 10px;
            border-radius: 999px;
            background: rgba(15, 31, 58, 0.08);
            overflow: hidden;
        }

        .progress-modern .bar {
            height: 100%;
            border-radius: 999px;
            background: linear-gradient(120deg, #0f3c8c, #2f6bce);
        }

        .card-list {
            border-radius: 16px;
            background: linear-gradient(145deg, rgba(255, 255, 255, 0.96), rgba(241, 246, 255, 0.98));
            border: 1px solid rgba(10, 79, 191, 0.08);
            box-shadow: 0 16px 36px rgba(2, 20, 47, 0.14);
        }

        .card-list .item {
            border: 1px solid rgba(15, 23, 42, 0.06);
            border-radius: 12px;
            padding: 12px;
            background: rgba(255, 255, 255, 0.9);
            transition: transform 0.14s ease, box-shadow 0.14s ease, border-color 0.14s ease;
        }

        .card-list .item:hover {
            transform: translateY(-2px);
            border-color: rgba(10, 79, 191, 0.25);
            box-shadow: 0 12px 26px rgba(10, 79, 191, 0.16);
        }

        /* Admin */
        .admin-hero {
            background: linear-gradient(135deg, rgba(2, 20, 47, 0.94), rgba(10, 79, 191, 0.82));
            border-radius: 20px;
            padding: 20px;
            color: #eaf2ff;
            box-shadow: 0 20px 50px rgba(2, 20, 47, 0.3);
            position: relative;
            overflow: hidden;
        }

        .admin-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 15% 25%, rgba(46,197,255,0.28), transparent 45%),
                        radial-gradient(circle at 80% 15%, rgba(255,255,255,0.15), transparent 50%);
            pointer-events: none;
        }

        .admin-stat {
            border-radius: 14px;
            padding: 14px;
            background: linear-gradient(150deg, rgba(255, 255, 255, 0.97), rgba(241, 246, 255, 0.98));
            border: 1px solid rgba(10, 79, 191, 0.08);
            box-shadow: 0 14px 32px rgba(2, 20, 47, 0.12);
            transition: transform 0.16s ease, box-shadow 0.16s ease;
        }

        .admin-stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 18px 38px rgba(2, 20, 47, 0.16);
        }

        .admin-card {
            border-radius: 14px;
            background: linear-gradient(150deg, rgba(255,255,255,0.96), rgba(243,248,255,0.98));
            border: 1px solid rgba(10, 79, 191, 0.08);
            box-shadow: 0 14px 32px rgba(2, 20, 47, 0.12);
        }

        .admin-card .item {
            border-bottom: 1px solid rgba(15, 23, 42, 0.08);
            padding: 10px 0;
        }

        .admin-card .item:last-child {
            border-bottom: none;
        }

        .admin-table-card {
            border-radius: 14px;
            background: linear-gradient(150deg, rgba(255,255,255,0.96), rgba(243,248,255,0.98));
            border: 1px solid rgba(10, 79, 191, 0.08);
            box-shadow: 0 14px 32px rgba(2, 20, 47, 0.12);
        }

        .admin-table-card table tr {
            transition: transform 0.12s ease, box-shadow 0.12s ease, background 0.12s ease;
        }

        .admin-table-card table tr:hover {
            transform: translateY(-1px);
            background: rgba(10, 79, 191, 0.05);
            box-shadow: 0 10px 20px rgba(2, 20, 47, 0.12);
        }

        .admin-progress {
            width: var(--bar-width, 0%);
            background: linear-gradient(120deg, #0f3c8c, #2f6bce);
        }

        .admin-progress-dark {
            width: var(--bar-width, 0%);
        }

        .label-animated {
            background: linear-gradient(90deg, #000000, #1034a6, #000080, #191970, #4169e1, #000000);
            background-size: 350% 350%;
            -webkit-background-clip: text;
            color: transparent;
            animation: brandShift 9s ease-in-out infinite;
            font-weight: 700;
        }

        .btn-soft {
            border-radius: 12px;
            border: 1px solid rgba(10, 79, 191, 0.18);
            background: linear-gradient(120deg, #e7f2ff, #cfe5ff);
            color: #0b1f3f;
            box-shadow: 0 10px 22px rgba(2, 20, 47, 0.12);
            transition: transform 0.15s ease, box-shadow 0.15s ease, border-color 0.15s ease;
        }

        .btn-soft:hover {
            transform: translateY(-1px);
            border-color: rgba(46, 197, 255, 0.8);
            box-shadow: 0 12px 26px rgba(2, 20, 47, 0.18);
        }

        .mindly-brand {
            background: linear-gradient(90deg, #000000, #1034a6, #000080, #191970, #4169e1, #000000);
            background-size: 350% 350%;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            animation: brandShift 9s ease-in-out infinite;
        }

        .brand-logo {
            width: 36px;
            height: auto;
            filter: drop-shadow(0 6px 10px rgba(0, 0, 0, 0.12));
            animation: logoHue 10s ease-in-out infinite;
        }

        @keyframes logoHue {
            0% { filter: drop-shadow(0 6px 10px rgba(0,0,0,0.12)) hue-rotate(0deg) saturate(1); }
            50% { filter: drop-shadow(0 8px 14px rgba(0,0,0,0.18)) hue-rotate(25deg) saturate(1.1); }
            100% { filter: drop-shadow(0 6px 10px rgba(0,0,0,0.12)) hue-rotate(0deg) saturate(1); }
        }

        @keyframes brandShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .nav-link.active-link {
            background: linear-gradient(90deg, #000000, #1034a6, #000080, #191970, #4169e1, #000000);
            background-size: 300% 300%;
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent !important;
            font-weight: 700;
            position: relative;
        }

        .nav-link.active-link::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, #1034a6, #4169e1);
        }
    </style>
    @stack('styles')
</head>
<body data-flash-status="{{ session('status') }}">
    <nav class="navbar navbar-expand-lg nav-blur sticky-top py-3">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="{{ route('landing') }}">
                    <span class="mindly-brand">Mindly</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('landing') ? 'active-link' : '' }}" href="{{ route('landing') }}">Beranda</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active-link' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('journeys.*') ? 'active-link' : '' }}" href="{{ route('journeys.index') }}">Mood Journey</a></li>
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('self-check.*') ? 'active-link' : '' }}" href="{{ route('self-check.create') }}">Self-Check</a></li>
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.*') ? 'active-link' : '' }}" href="{{ route('admin.dashboard') }}">Admin</a></li>
                        @endif
                    @endauth
                </ul>
                <div class="d-flex align-items-center gap-2">
                    @auth
                        <span class="fw-semibold d-none d-md-inline text-dark-emphasis">Hi, {{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-sm btn-outline-dark px-3">Keluar</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm btn-outline-dark px-3">Masuk</a>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-primary px-3" style="background: linear-gradient(120deg, #0f3c8c, #2f6bce); border: none;">Daftar</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container-lg">
            @if ($errors->any())
                <div class="alert alert-danger glass-card mt-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 700 });
        const flashStatus = document.body.dataset.flashStatus;
        if (flashStatus) {
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: flashStatus,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
