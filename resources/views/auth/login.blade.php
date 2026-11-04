@extends('layouts.public')

@section('title', 'Login Administrator — K3 Compliance')

@section('content')
<section class="login-wrap">
    <form class="login-card" method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <div class="login-card-top">
            <div class="login-badge">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>
            
            <div class="eyebrow" style="margin-bottom: 6px; justify-content: center;">
                AREA TERBATAS ADMINISTRATOR
            </div>
            <h1>Masuk ke Dashboard</h1>
            <p>Kelola konfigurasi indikator, standar acuan K3, dan data riwayat penilaian perusahaan.</p>
        </div>

        @if($errors->any())
            <div class="alert error">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="8" x2="12" y2="12"></line>
                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                </svg>
                <span>{{ $errors->first() }}</span>
            </div>
        @endif

        <div class="form-group">
            <label for="email">Alamat Email Administrator</label>
            <div class="input-with-icon">
                <div class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                        <polyline points="22,6 12,13 2,6"></polyline>
                    </svg>
                </div>
                <input 
                    id="email" 
                    type="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="nama@k3compliance.test"
                    value="{{ old('email') }}" 
                    required 
                    autofocus
                >
            </div>
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <div class="input-with-icon">
                <div class="input-icon">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <input 
                    id="password" 
                    type="password" 
                    name="password" 
                    class="form-control" 
                    placeholder="••••••••••••"
                    required
                >
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin: 18px 0 10px;">
            <label class="checkbox-row">
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span>Ingat sesi saya</span>
            </label>
        </div>

        <button type="submit" class="btn primary full-btn">
            <span>Masuk ke Panel Kontrol</span>
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </button>

        <a class="back-link" href="{{ route('home') }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Kembali ke Beranda Publik</span>
        </a>
    </form>
</section>
@endsection
