@extends('layouts.admin')

@section('title', 'Dashboard Ringkasan')

@section('content')
<!-- Heading Section -->
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
            OVERVIEW MONITORING K3
        </div>
        <h1>Dashboard Utama</h1>
        <p>Ringkasan metrik kepatuhan, data profil industri, dan riwayat simulasi K3 perusahaan.</p>
    </div>

    <div style="display: flex; gap: 10px;">
        <a class="btn primary" href="{{ route('admin.reports.export') }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>
            <span>Ekspor Laporan CSV</span>
        </a>
    </div>
</div>

<!-- 3 Main Stat Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-meta">
            <small>PROFIL PERUSAHAAN</small>
            <strong>{{ number_format($companies) }}</strong>
            <span>Data entitas industri tersimpan</span>
        </div>
        <div class="stat-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
                <path d="M9 22v-4h6v4"></path>
                <path d="M8 6h.01"></path>
                <path d="M16 6h.01"></path>
                <path d="M8 10h.01"></path>
                <path d="M16 10h.01"></path>
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-meta">
            <small>SIMULASI & PENILAIAN</small>
            <strong style="color: var(--k3-primary);">{{ number_format($assessments) }}</strong>
            <span>Total audit mandiri terlaksana</span>
        </div>
        <div class="stat-icon" style="background: var(--k3-emerald-light); color: var(--k3-emerald);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
            </svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-meta">
            <small>INDIKATOR AKTIF</small>
            <strong style="color: var(--k3-dark);">{{ number_format($indicators) }}</strong>
            <span>Parameter kepatuhan terkonfigurasi</span>
        </div>
        <div class="stat-icon" style="background: var(--k3-emerald-subtle); color: var(--k3-dark);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                <polyline points="9 12 11 14 15 10"></polyline>
            </svg>
        </div>
    </div>
</div>

<!-- Table: Penilaian Terbaru -->
<div class="table-card">
    <div class="table-header">
        <div>
            <h2>Penilaian & Simulasi Terbaru</h2>
            <p style="font-size: 12.5px; color: var(--k3-text-muted); margin-top: 2px;">
                Daftar entri penilaian mandiri terbaru yang diajukan oleh pengguna sistem.
            </p>
        </div>
        <a class="action-link" href="{{ route('admin.assessments.index') }}">
            <span>Semua Penilaian</span>
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="9 18 15 12 9 6"></polyline></svg>
        </a>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Perusahaan</th>
                    <th>Tanggal Evaluasi</th>
                    <th>Jumlah Pekerja</th>
                    <th>Skor Kepatuhan</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($latest as $item)
                    <tr>
                        <td>
                            <div style="font-weight: 700; color: var(--k3-dark); font-size: 13.5px;">
                                {{ $item->company->name }}
                            </div>
                            <div style="font-size: 11.5px; color: var(--k3-text-muted);">
                                {{ $item->company->industry->name ?? 'Umum' }} &bull; Risiko {{ $item->company->fire_risk_class }}
                            </div>
                        </td>
                        <td>
                            <span style="font-weight: 500;">
                                {{ $item->assessment_date?->format('d/m/Y') ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span style="display: inline-flex; align-items: center; gap: 5px;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" color="#64748B"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                                {{ number_format($item->company->employee_count) }} orang
                            </span>
                        </td>
                        <td>
                            @php
                                $score = (float) $item->overall_percentage;
                                $pillClass = $score >= 80 ? 'ok' : ($score >= 60 ? 'warn' : 'bad');
                            @endphp
                            <span class="status-pill {{ $pillClass }}">
                                <span style="font-weight: 800;">{{ number_format($score, 1) }}%</span>
                                <span>&bull;</span>
                                <span>{{ $score >= 80 ? 'Tinggi' : ($score >= 60 ? 'Sedang' : 'Kurang') }}</span>
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <a class="action-link" href="{{ route('admin.assessments.show', $item) }}">
                                <span>Detail</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 48px 20px; color: var(--k3-text-muted);">
                            <div style="width: 48px; height: 48px; border-radius: 50%; background: var(--k3-bg); display: flex; align-items: center; justify-content: center; margin: 0 auto 12px; color: var(--k3-text-light);">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                            </div>
                            <strong style="display: block; font-size: 14px; color: var(--k3-dark);">Belum ada riwayat penilaian</strong>
                            <span>Penilaian yang disubmit melalui formulir simulasi publik akan otomatis tercatat di sini.</span>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
