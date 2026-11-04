@extends('layouts.public')

@section('title', 'K3 Compliance — Analisis & Evaluasi Kepatuhan K3 Perusahaan')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-copy">
        <div class="hero-pill">
            <span class="dot"></span>
            <span>SISTEM EVALUASI & AUDIT K3 MANDIRI</span>
        </div>
        
        <h1>
            Ukur Kepatuhan K3.<br>
            <span class="highlight">Tingkatkan Keselamatan.</span>
        </h1>
        
        <p>
            Platform analisis komprehensif untuk membantu perusahaan mengukur dan memetakan pemenuhan standar keselamatan & kesehatan kerja (K3) melalui data aktual, perbandingan regulasi, dan infografis interaktif.
        </p>

        <div class="hero-actions">
            <a class="btn primary btn-lg" href="{{ route('simulation.create') }}">
                <span>Mulai Simulasi K3</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
            
            <a class="btn ghost btn-lg" href="{{ route('about') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"></circle>
                    <polygon points="10 8 16 12 10 16 10 8"></polygon>
                </svg>
                <span>Pelajari Metodologi</span>
            </a>
        </div>

        <div class="hero-trust">
            <div class="hero-trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>PP No. 50/2012 (SMK3)</span>
            </div>
            <div class="hero-trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Kepmenaker 186/1999</span>
            </div>
            <div class="hero-trust-item">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <span>Permenaker 04/1980</span>
            </div>
        </div>
    </div>

    <!-- Hero Visual / SaaS Mockup Graphic -->
    <div class="hero-art">
        <div class="art-glow"></div>
        <div class="orbit orbit-one"></div>
        <div class="orbit orbit-two"></div>

        <!-- Floating Card Top Right -->
        <div class="float-card card-a">
            <div class="float-icon">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                    <polyline points="9 12 11 14 15 10"></polyline>
                </svg>
            </div>
            <div class="float-meta">
                <small>Kepatuhan K3</small>
                <strong>Tingkat Tinggi (92%)</strong>
            </div>
        </div>

        <!-- Main Center SaaS Dashboard Card -->
        <div class="hero-card-main">
            <div class="card-header-row">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <div style="width: 10px; height: 10px; border-radius: 50%; background: var(--k3-emerald);"></div>
                    <span style="font-weight: 700; font-size: 13px; color: var(--k3-dark);">Audit Mandiri K3</span>
                </div>
                <span class="card-badge-pill">Hasil Terverifikasi</span>
            </div>

            <div class="card-score-center">
                <div class="score-radial">
                    <div class="score-radial-inner">92%</div>
                </div>
                <div class="score-meta">
                    <strong>Kepatuhan Standar</strong>
                    <span>8 dari 9 Indikator Terpenuhi</span>
                </div>
            </div>

            <div class="card-bars">
                <div class="bar-row">
                    <div class="bar-labels">
                        <span>Personel & Ahli K3</span>
                        <span style="color: var(--k3-primary); font-weight: 700;">100%</span>
                    </div>
                    <div class="bar-track">
                        <div class="bar-fill" style="width: 100%;"></div>
                    </div>
                </div>

                <div class="bar-row">
                    <div class="bar-labels">
                        <span>Peralatan & Proteksi Kebakaran</span>
                        <span style="color: var(--k3-emerald); font-weight: 700;">85%</span>
                    </div>
                    <div class="bar-track">
                        <div class="bar-fill" style="width: 85%;"></div>
                    </div>
                </div>

                <div class="bar-row">
                    <div class="bar-labels">
                        <span>Fasilitas Evakuasi Darurat</span>
                        <span style="color: var(--k3-emerald); font-weight: 700;">90%</span>
                    </div>
                    <div class="bar-track">
                        <div class="bar-fill" style="width: 90%;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Floating Card Bottom Left -->
        <div class="float-card card-b">
            <div class="float-icon" style="background: var(--k3-emerald-subtle); color: var(--k3-dark);">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                    <circle cx="9" cy="7" r="4"></circle>
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                </svg>
            </div>
            <div class="float-meta">
                <small>Rasio Tenaga Kerja</small>
                <strong>200 Pekerja Terlindungi</strong>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section">
    <div class="section-head left-aligned">
        <div>
            <div class="eyebrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                FITUR UTAMA PLATFORM
            </div>
            <h2>Satu sistem cerdas, gambaran K3 lebih terukur & transparan.</h2>
        </div>
        <p style="max-width: 440px;">
            Input kondisi aktual fasilitas kerja dan peroleh analisis pemenuhan regulasi K3 secara instan dalam satu ringkasan infografis yang siap pakai.
        </p>
    </div>

    <div class="feature-grid">
        <article class="feature-card">
            <div class="feature-top">
                <div class="feature-icon-box">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                        <path d="M9 22v-4h6v4"></path>
                        <path d="M8 6h.01"></path>
                        <path d="M16 6h.01"></path>
                        <path d="M8 10h.01"></path>
                        <path d="M16 10h.01"></path>
                        <path d="M8 14h.01"></path>
                        <path d="M16 14h.01"></path>
                    </svg>
                </div>
                <span class="feature-num">01</span>
            </div>
            <h3>Profil & Risiko Perusahaan</h3>
            <p>Identifikasi sektor industri, jumlah pekerja aktif, klasifikasi potensi bahaya kebakaran, dan ringkasan risiko tempat kerja.</p>
        </article>

        <article class="feature-card">
            <div class="feature-top">
                <div class="feature-icon-box">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 11 12 14 22 4"></polyline>
                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                    </svg>
                </div>
                <span class="feature-num">02</span>
            </div>
            <h3>Indikator K3 Komprehensif</h3>
            <p>Parameter terstruktur mencakup personel ahli K3, tim tanggap darurat, peralatan proteksi kebakaran, evakuasi, dan prosedur kerja.</p>
        </article>

        <article class="feature-card">
            <div class="feature-top">
                <div class="feature-icon-box">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2"></rect>
                        <line x1="8" y1="6" x2="16" y2="6"></line>
                        <line x1="16" y1="14" x2="16" y2="18"></line>
                        <path d="M8 10h.01"></path>
                        <path d="M12 10h.01"></path>
                        <path d="M16 10h.01"></path>
                        <path d="M8 14h.01"></path>
                        <path d="M12 14h.01"></path>
                        <path d="M8 18h.01"></path>
                        <path d="M12 18h.01"></path>
                    </svg>
                </div>
                <span class="feature-num">03</span>
            </div>
            <h3>Kalkulasi Otomatis Berstandar</h3>
            <p>Perhitungan rasio minimum berdasarkan regulasi ketenagakerjaan resmi untuk menentukan gap pemenuhan secara akurat.</p>
        </article>

        <article class="feature-card">
            <div class="feature-top">
                <div class="feature-icon-box">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                        <polyline points="14 2 14 8 20 8"></polyline>
                        <line x1="16" y1="13" x2="8" y2="13"></line>
                        <line x1="16" y1="17" x2="8" y2="17"></line>
                        <polyline points="10 9 9 9 8 9"></polyline>
                    </svg>
                </div>
                <span class="feature-num">04</span>
            </div>
            <h3>Infografis & Laporan PDF</h3>
            <p>Visualisasi status kepatuhan (Memenuhi, Kurang, Tidak Memenuhi) dengan opsi cetak laporan audit eksekutif untuk manajemen.</p>
        </article>
    </div>
</section>

<!-- Workflow Steps Section -->
<section class="section bg-alt">
    <div class="section-head">
        <div class="eyebrow">METODOLOGI SEDERHANA</div>
        <h2>3 Langkah Praktis Evaluasi Mandiri K3</h2>
        <p>Proses simulasi dirancang cepat, efisien, dan dapat dilakukan secara mandiri tanpa memerlukan registrasi akun yang rumit.</p>
    </div>

    <div class="steps-grid">
        <div class="step-card">
            <div class="step-badge">1</div>
            <h3>Isi Profil & Risiko</h3>
            <p>Masukkan nama perusahaan, pilih sektor industri, total karyawan, dan tingkat klasifikasi risiko kebakaran fasilitas.</p>
        </div>

        <div class="step-card">
            <div class="step-badge">2</div>
            <h3>Lengkapi Data Aktual</h3>
            <p>Input ketersediaan aktual indikator K3 seperti jumlah APAR, personel tim kebakaran, jalur evakuasi, dan SOP keselamatan.</p>
        </div>

        <div class="step-card">
            <div class="step-badge">3</div>
            <h3>Lihat Hasil Analisis</h3>
            <p>Sistem memproses skor persentase kepatuhan, menyoroti indikator kritis yang kurang, dan menyajikan infografis kesimpulan.</p>
        </div>
    </div>

    <!-- Standards Strip -->
    <div class="standards-strip">
        <div>
            <h4>Landasan Acuan Regulasi</h4>
            <p>Perhitungan dikonfigurasi berdasarkan acuan hukum keselamatan kerja di Indonesia.</p>
        </div>
        <div class="reg-tags">
            <span class="reg-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                PP No. 50/2012 (SMK3)
            </span>
            <span class="reg-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Kepmenaker No. 186/MEN/1999
            </span>
            <span class="reg-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                Permenaker No. 04/MEN/1980
            </span>
            <span class="reg-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                UU No. 1 Tahun 1970
            </span>
        </div>
    </div>
</section>

<!-- Call to Action Section -->
<div class="cta-wrapper">
    <div class="cta-card">
        <div class="cta-content">
            <div class="eyebrow">MULAI EVALUASI SEKARANG</div>
            <h2>Kenali Tingkat Kepatuhan K3 Perusahaan Anda Hari Ini</h2>
            <p>Simulasi dapat dilakukan secara gratis dan langsung menampilkan skor kepatuhan tanpa perlu login terlebih dahulu.</p>
        </div>
        <div class="cta-action">
            <a class="btn primary btn-lg" href="{{ route('simulation.create') }}">
                <span>Mulai Simulasi K3</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>
    </div>
</div>
@endsection
