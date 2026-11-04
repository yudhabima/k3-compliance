@extends('layouts.admin')

@section('title', 'Laporan & Ekspor K3')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
            DATA EXPORT & REPORTING
        </div>
        <h1>Pusat Laporan & Ekspor Data</h1>
        <p>Unduh kompilasi riwayat audit keselamatan kerja seluruh entitas bisnis dalam format standar CSV.</p>
    </div>
</div>

<!-- Main Hero Export Card -->
<div style="background: linear-gradient(135deg, var(--k3-dark) 0%, var(--k3-darker) 100%); border-radius: var(--radius-xl); padding: 40px; color: var(--k3-white); margin-bottom: 28px; box-shadow: var(--k3-shadow-glow-lg); display: flex; justify-content: space-between; align-items: center; gap: 32px; flex-wrap: wrap;">
    <div style="max-width: 640px;">
        <div class="eyebrow" style="color: #86EFAC;">EKSPOR KOMPREHENSIF</div>
        <h2 style="font-family: var(--font-heading); font-size: 24px; font-weight: 800; color: #FFF; margin: 4px 0 10px;">
            Laporan Riwayat Penilaian K3 (CSV)
        </h2>
        <p style="font-size: 14px; color: #CBD5E1; line-height: 1.65; margin: 0;">
            Ekspor dataset lengkap mencakup tanggal evaluasi, nama entitas industri, total tenaga kerja terlindungi, status akhir keselamatan, dan persentase kepatuhan berbobot untuk kebutuhan audit manajemen atau analisa lanjutan di Microsoft Excel.
        </p>
    </div>

    <div>
        <a class="btn emerald btn-lg" href="{{ route('admin.reports.export') }}">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                <polyline points="7 10 12 15 17 10"></polyline>
                <line x1="12" y1="15" x2="12" y2="3"></line>
            </svg>
            <span>Unduh Laporan (.CSV)</span>
        </a>
    </div>
</div>

<!-- 3 Stats Cards -->
<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-meta">
            <small>REKAP AUDIT TERSEDIA</small>
            <strong>{{ number_format($count) }}</strong>
            <span>Total baris data penilaian</span>
        </div>
        <div class="stat-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-meta">
            <small>FORMAT DOKUMEN</small>
            <strong style="font-size: 28px; color: var(--k3-primary);">CSV / UTF-8</strong>
            <span>Standar ekspor universal</span>
        </div>
        <div class="stat-icon" style="background: var(--k3-emerald-light); color: var(--k3-emerald);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 7 4 4 20 4 20 7"></polyline><line x1="9" y1="20" x2="15" y2="20"></line><line x1="12" y1="4" x2="12" y2="20"></line></svg>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-meta">
            <small>KOMPATIBILITAS</small>
            <strong style="font-size: 24px; color: var(--k3-dark);">Excel & Sheets</strong>
            <span>Langsung dapat diolah</span>
        </div>
        <div class="stat-icon" style="background: var(--k3-emerald-subtle); color: var(--k3-dark);">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
        </div>
    </div>
</div>

<!-- Specification Detail Card -->
<div class="table-card">
    <div class="table-header">
        <h2>Struktur Kolom Dataset Ekspor</h2>
        <span style="font-size: 12.5px; color: var(--k3-text-muted);">Format kolom laporan CSV</span>
    </div>

    <div style="padding: 24px;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
            <div style="padding: 16px; background: var(--k3-bg); border-radius: var(--radius-md); border: 1px solid var(--k3-border);">
                <code style="font-size: 12px; font-weight: 700; color: var(--k3-dark);">1. Tanggal</code>
                <p style="font-size: 12px; color: var(--k3-text-muted); margin: 4px 0 0;">Format ISO (YYYY-MM-DD) saat evaluasi disubmit.</p>
            </div>

            <div style="padding: 16px; background: var(--k3-bg); border-radius: var(--radius-md); border: 1px solid var(--k3-border);">
                <code style="font-size: 12px; font-weight: 700; color: var(--k3-dark);">2. Perusahaan</code>
                <p style="font-size: 12px; color: var(--k3-text-muted); margin: 4px 0 0;">Nama lengkap entitas usaha atau perusahaan terkait.</p>
            </div>

            <div style="padding: 16px; background: var(--k3-bg); border-radius: var(--radius-md); border: 1px solid var(--k3-border);">
                <code style="font-size: 12px; font-weight: 700; color: var(--k3-dark);">3. Pekerja</code>
                <p style="font-size: 12px; color: var(--k3-text-muted); margin: 4px 0 0;">Total tenaga kerja yang terdaftar di tempat kerja.</p>
            </div>

            <div style="padding: 16px; background: var(--k3-bg); border-radius: var(--radius-md); border: 1px solid var(--k3-border);">
                <code style="font-size: 12px; font-weight: 700; color: var(--k3-dark);">4. Status</code>
                <p style="font-size: 12px; color: var(--k3-text-muted); margin: 4px 0 0;">Status pemrosesan dokumen penilaian (submitted).</p>
            </div>

            <div style="padding: 16px; background: var(--k3-bg); border-radius: var(--radius-md); border: 1px solid var(--k3-border);">
                <code style="font-size: 12px; font-weight: 700; color: var(--k3-dark);">5. Kepatuhan (%)</code>
                <p style="font-size: 12px; color: var(--k3-text-muted); margin: 4px 0 0;">Persentase skor akhir pemenuhan standar regulasi.</p>
            </div>
        </div>
    </div>
</div>
@endsection
