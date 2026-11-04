<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#14532D">
    <title>@yield('title', 'K3 Compliance — Sistem Analisis & Manajemen Keselamatan Kerja')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Main K3 Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/k3.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Header / Topbar Navigation -->
    <header class="topbar">
        <a class="brand" href="{{ route('home') }}">
            <div class="brand-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="M12 8v8"/>
                    <path d="M8 12h8"/>
                </svg>
            </div>
            <div class="brand-text">
                <div class="brand-title">K3<span>COMPLIANCE</span></div>
                <div class="brand-sub">Occupational Safety & Health</div>
            </div>
        </a>

        <!-- Mobile Menu Hamburger Button -->
        <button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        <nav id="topbarNav">
            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
                Beranda
            </a>
            <a class="nav-link {{ request()->routeIs('simulation.*') ? 'active' : '' }}" href="{{ route('simulation.create') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                    <polyline points="14 2 14 8 20 8"></polyline>
                    <line x1="16" y1="13" x2="8" y2="13"></line>
                    <line x1="16" y1="17" x2="8" y2="17"></line>
                    <polyline points="10 9 9 9 8 9"></polyline>
                </svg>
                Simulasi K3
            </a>
            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="12" y1="16" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12.01" y2="8"></line>
                </svg>
                Tentang
            </a>

            @if(auth()->check() && auth()->user()->role === 'admin')
                <a class="nav-admin" href="{{ route('admin.dashboard') }}" title="Buka Dashboard Admin">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    Dashboard Admin
                </a>
            @else
                <a class="nav-admin" href="{{ route('admin.login') }}">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                        <polyline points="10 17 15 12 10 7"></polyline>
                        <line x1="15" y1="12" x2="3" y2="12"></line>
                    </svg>
                    Portal Admin
                </a>
            @endif
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @if(session('success'))
            <div style="max-width: 1200px; margin: 20px auto 0; padding: 0 24px;">
                <div class="alert success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        @endif

        @if(session('error'))
            <div style="max-width: 1200px; margin: 20px auto 0; padding: 0 24px;">
                <div class="alert error">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Public Footer -->
    <footer class="public-footer">
        <div class="footer-top">
            <div class="footer-brand">
                <a class="brand" href="{{ route('home') }}">
                    <div class="brand-badge">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                            <path d="M12 8v8"/>
                            <path d="M8 12h8"/>
                        </svg>
                    </div>
                    <div class="brand-text">
                        <div class="brand-title">K3<span>COMPLIANCE</span></div>
                        <div class="brand-sub">Occupational Safety & Health</div>
                    </div>
                </a>
                <p>
                    Platform cerdas evaluasi dan pemetaan pemenuhan regulasi K3 di tempat kerja berbasis parameter standar nasional Republik Indonesia.
                </p>
            </div>
            <div class="footer-col">
                <h5>Navigasi Cepat</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}">Beranda Utama</a></li>
                    <li><a href="{{ route('simulation.create') }}">Mulai Simulasi K3</a></li>
                    <li><a href="{{ route('about') }}">Tentang & Metodologi</a></li>
                    <li><a href="{{ route('admin.login') }}">Akses Administrator</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h5>Landasan Acuan</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('about') }}">UU No. 1 Tahun 1970</a></li>
                    <li><a href="{{ route('about') }}">PP No. 50 Tahun 2012 (SMK3)</a></li>
                    <li><a href="{{ route('about') }}">Kepmenaker No. 186/1999</a></li>
                    <li><a href="{{ route('about') }}">Permenaker No. 04/1980</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <div>&copy; {{ date('Y') }} K3 Compliance — Sistem Informasi Analisis & Audit Keselamatan Kerja. Hak cipta dilindungi.</div>
            <div style="display: flex; gap: 16px; align-items: center;">
                <span class="reg-pill" style="padding: 4px 10px; font-size: 11px;">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    SMK3 Terverifikasi
                </span>
            </div>
        </div>
    </footer>

    <!-- Mobile Nav Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggle = document.getElementById('mobileNavToggle');
            var nav = document.getElementById('topbarNav');
            if (toggle && nav) {
                toggle.addEventListener('click', function() {
                    nav.classList.toggle('open');
                });
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
