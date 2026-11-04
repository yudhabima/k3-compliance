<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#14532D">
    <title>@yield('title', 'Admin K3') — K3 Compliance</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Main K3 Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/k3.css') }}">
    @stack('styles')
</head>
<body class="admin-body">

    <!-- Mobile Sidebar Backdrop -->
    <div id="sidebarBackdrop" style="display:none; position:fixed; inset:0; background:rgba(15,23,42,0.6); z-index:90; backdrop-filter:blur(4px);"></div>

    <!-- Sidebar Navigation -->
    <aside class="admin-sidebar" id="adminSidebar">
        
        <!-- Brand Header -->
        <a class="sidebar-brand" href="{{ route('admin.dashboard') }}">
            <div class="brand-badge">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
                    <path d="M12 8v8"/>
                    <path d="M8 12h8"/>
                </svg>
            </div>
            <div>
                <div class="sidebar-brand-title">K3 COMPLIANCE</div>
                <div class="sidebar-brand-sub">Admin Portal</div>
            </div>
        </a>

        <!-- Menu Groups -->
        <div class="sidebar-content">
            <div class="sidebar-group">
                <div class="sidebar-label">Menu Utama</div>

                <a class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7"></rect>
                        <rect x="14" y="3" width="7" height="7"></rect>
                        <rect x="14" y="14" width="7" height="7"></rect>
                        <rect x="3" y="14" width="7" height="7"></rect>
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a class="sidebar-link {{ request()->routeIs('admin.companies.*') ? 'active' : '' }}" href="{{ route('admin.companies.index') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                        <path d="M9 22v-4h6v4"></path>
                        <path d="M8 6h.01"></path>
                        <path d="M16 6h.01"></path>
                        <path d="M8 10h.01"></path>
                        <path d="M16 10h.01"></path>
                        <path d="M8 14h.01"></path>
                        <path d="M16 14h.01"></path>
                    </svg>
                    <span>Perusahaan</span>
                </a>

                <a class="sidebar-link {{ request()->routeIs('admin.indicators.*') ? 'active' : '' }}" href="{{ route('admin.indicators.index') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14"></line>
                        <line x1="4" y1="10" x2="4" y2="3"></line>
                        <line x1="12" y1="21" x2="12" y2="12"></line>
                        <line x1="12" y1="8" x2="12" y2="3"></line>
                        <line x1="20" y1="21" x2="20" y2="16"></line>
                        <line x1="20" y1="12" x2="20" y2="3"></line>
                        <line x1="1" y1="14" x2="7" y2="14"></line>
                        <line x1="9" y1="8" x2="15" y2="8"></line>
                        <line x1="17" y1="16" x2="23" y2="16"></line>
                    </svg>
                    <span>Indikator K3</span>
                </a>

                <a class="sidebar-link {{ request()->routeIs('admin.standards.*') ? 'active' : '' }}" href="{{ route('admin.standards.index') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                        <polyline points="9 12 11 14 15 10"></polyline>
                    </svg>
                    <span>Standar K3</span>
                </a>

                <a class="sidebar-link {{ request()->routeIs('admin.assessments.*') ? 'active' : '' }}" href="{{ route('admin.assessments.index') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                    <span>Penilaian K3</span>
                </a>

                <a class="sidebar-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="18" y1="20" x2="18" y2="10"></line>
                        <line x1="12" y1="20" x2="12" y2="4"></line>
                        <line x1="6" y1="20" x2="6" y2="14"></line>
                    </svg>
                    <span>Laporan & Ekspor</span>
                </a>
            </div>

            <div class="sidebar-group">
                <div class="sidebar-label">Pintasan</div>

                <a class="sidebar-link" href="{{ route('home') }}" target="_blank">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                        <polyline points="15 3 21 3 21 9"></polyline>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                    <span>Lihat Website</span>
                </a>
            </div>
        </div>

        <!-- Sidebar Footer / Logout -->
        <div class="sidebar-footer">
            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button type="submit" class="sidebar-logout-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                        <polyline points="16 17 21 12 16 7"></polyline>
                        <line x1="21" y1="12" x2="9" y2="12"></line>
                    </svg>
                    <span>Keluar Sesi</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- Admin Main Body -->
    <main class="admin-main">
        
        <!-- Admin Topbar -->
        <header class="admin-topbar">
            <div style="display: flex; align-items: center; gap: 14px;">
                <button class="mobile-nav-toggle" id="adminSidebarToggle" style="display: none; padding: 6px;" aria-label="Toggle sidebar">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg>
                </button>

                <div class="admin-breadcrumbs">
                    <span>Admin</span>
                    <span>/</span>
                    <span class="current">@yield('title', 'Dashboard')</span>
                </div>
            </div>

            <div style="display: flex; align-items: center; gap: 16px;">
                <div class="admin-user-pill">
                    <div class="admin-avatar">
                        {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                    </div>
                    <div class="admin-user-info">
                        <span class="admin-user-name">{{ auth()->user()->name }}</span>
                        <span class="admin-user-role">Administrator K3</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="admin-content">
            
            @if(session('success'))
                <div class="alert success">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="alert error">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')

        </div>

    </main>

    <!-- Sidebar Responsive Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var toggleBtn = document.getElementById('adminSidebarToggle');
            var sidebar = document.getElementById('adminSidebar');
            var backdrop = document.getElementById('sidebarBackdrop');

            function checkWidth() {
                if (window.innerWidth <= 1024) {
                    if (toggleBtn) toggleBtn.style.display = 'block';
                } else {
                    if (toggleBtn) toggleBtn.style.display = 'none';
                    if (sidebar) sidebar.classList.remove('open');
                    if (backdrop) backdrop.style.display = 'none';
                }
            }

            if (toggleBtn && sidebar && backdrop) {
                toggleBtn.addEventListener('click', function() {
                    var isOpen = sidebar.classList.toggle('open');
                    backdrop.style.display = isOpen ? 'block' : 'none';
                });

                backdrop.addEventListener('click', function() {
                    sidebar.classList.remove('open');
                    backdrop.style.display = 'none';
                });
            }

            window.addEventListener('resize', checkWidth);
            checkWidth();
        });
    </script>
    @stack('scripts')
</body>
</html>
