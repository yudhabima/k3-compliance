@extends('layouts.public')

@section('title', 'Hasil Analisis K3 — ' . ($assessment->company->name ?? 'Perusahaan'))

@section('content')
<section class="page-head compact">
    <div style="max-width: 1100px; margin: 0 auto; display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 16px;">
        <div>
            <div class="eyebrow">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>
                HASIL EVALUASI SIMULASI K3 &bull; {{ $assessment->assessment_date?->format('d M Y') ?? date('d M Y') }}
            </div>
            <h1>Laporan Ringkasan Kepatuhan K3</h1>
            <p>Infografis visualisasi pemenuhan regulasi keselamatan dan kesehatan kerja.</p>
        </div>

        <div class="print-actions">
            <button class="btn ghost" onclick="window.print()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                    <rect x="6" y="14" width="12" height="8"></rect>
                </svg>
                <span>Cetak / Simpan PDF</span>
            </button>
            <a class="btn primary" href="{{ route('simulation.create') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span>Simulasi Baru</span>
            </a>
        </div>
    </div>
</section>

<div class="result-wrap">
    
    <!-- Hero Information Card -->
    <div class="result-hero-card">
        <div class="result-hero-info">
            <div class="result-date">
                Profil Perusahaan Yang Diuji
            </div>
            <h1>{{ $assessment->company->name }}</h1>
            <div class="result-meta-pills">
                <span class="result-meta-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path></svg>
                    {{ $assessment->company->industry->name ?? 'Sektor Umum' }}
                </span>
                <span class="result-meta-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                    {{ number_format($assessment->company->employee_count ?? 0) }} Tenaga Kerja
                </span>
                <span class="result-meta-pill">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M8.5 14.5A2.5 2.5 0 0 0 11 12c0-1.38-.5-2-1-3-1.072-2.143-.224-4.054 2-6 .5 2.5 2 4.9 4 6.5 2 1.6 3 3.5 3 5.5a7 7 0 1 1-14 0c0-1.153.433-2.294 1-3a2.5 2.5 0 0 0 2.5 2.5z"/></svg>
                    Risiko Kebakaran {{ $assessment->company->fire_risk_class ?? '-' }}
                </span>
                @if($assessment->company->location)
                    <span class="result-meta-pill">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                        {{ $assessment->company->location }}
                    </span>
                @endif
            </div>
        </div>

        <div style="text-align: right; background: rgba(255, 255, 255, 0.12); border: 1px solid rgba(255, 255, 255, 0.25); border-radius: var(--radius-xl); padding: 20px 28px;">
            <div style="font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #86EFAC;">
                Skor Kepatuhan
            </div>
            <div style="font-family: var(--font-heading); font-size: 42px; font-weight: 800; color: #FFF; line-height: 1.1;">
                {{ number_format($assessment->overall_percentage, 1) }}%
            </div>
            <div style="font-size: 12px; font-weight: 600; color: #D1FAE5;">
                {{ $assessment->overall_percentage >= 80 ? 'Kategori Pemenuhan Baik' : ($assessment->overall_percentage >= 60 ? 'Kategori Pemenuhan Sedang' : 'Perlu Tindakan Perbaikan') }}
            </div>
        </div>
    </div>

    <!-- 4 Metrics Row -->
    <div class="result-grid">
        <div class="metric-card score-primary">
            <small>SKOR KEPATUHAN</small>
            <strong>{{ number_format($assessment->overall_percentage, 1) }}%</strong>
            <span>Indikator berbobot standar</span>
        </div>

        <div class="metric-card score-ok">
            <small>MEMENUHI STANDAR</small>
            <strong>{{ $assessment->compliant_count }}</strong>
            <span>Indikator terverifikasi aman</span>
        </div>

        <div class="metric-card score-warn">
            <small>KURANG DARI STANDAR</small>
            <strong>{{ $assessment->partial_count }}</strong>
            <span>Indikator mendekati ambang</span>
        </div>

        <div class="metric-card score-bad">
            <small>TIDAK MEMENUHI</small>
            <strong>{{ $assessment->non_compliant_count }}</strong>
            <span>Indikator berisiko tinggi</span>
        </div>
    </div>

    <!-- Detailed Indicator Table Card -->
    <div class="table-card">
        <div class="table-header">
            <div>
                <h2>Rincian Pemenuhan Indikator Keselamatan</h2>
                <p style="font-size: 12.5px; color: var(--k3-text-muted); margin-top: 2px;">
                    Perbandingan langsung angka aktual di tempat kerja terhadap batas ketentuan standar.
                </p>
            </div>
            <span class="reg-pill" style="padding: 4px 12px; font-size: 11.5px;">
                {{ $assessment->details->count() }} Parameter
            </span>
        </div>

        <div class="table-scroll">
            <table>
                <thead>
                    <tr>
                        <th>Kelompok Aspek</th>
                        <th>Nama Indikator</th>
                        <th>Kondisi Aktual</th>
                        <th>Batas Standar</th>
                        <th>Persentase</th>
                        <th style="text-align: right;">Status Pemenuhan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($assessment->details as $detail)
                        <tr>
                            <td>
                                <span class="reg-pill" style="padding: 3px 8px; font-size: 11px;">
                                    {{ $detail->indicator->group_name }}
                                </span>
                            </td>
                            <td>
                                <strong style="display: block; color: var(--k3-dark); font-size: 13.5px;">
                                    {{ $detail->indicator->name }}
                                </strong>
                            </td>
                            <td>
                                <span style="font-weight: 700; color: var(--k3-dark);">
                                    {{ $detail->actual_value }}
                                </span>
                                <small style="color: var(--k3-text-muted);">{{ $detail->indicator->unit }}</small>
                            </td>
                            <td>
                                <span style="font-weight: 600; color: var(--k3-text-muted);">
                                    {{ $detail->standard_value }}
                                </span>
                                <small style="color: var(--k3-text-muted);">{{ $detail->indicator->unit }}</small>
                            </td>
                            <td>
                                <div style="display: flex; align-items: center; gap: 8px;">
                                    <div style="flex: 1; min-width: 60px; height: 6px; background: var(--k3-border); border-radius: 99px; overflow: hidden;">
                                        <div style="height: 100%; border-radius: 99px; width: {{ min(100, (float)$detail->percentage) }}%; background: {{ $detail->status === 'Memenuhi Standar' ? 'var(--k3-primary)' : ($detail->status === 'Kurang dari Standar' ? 'var(--k3-warn-text)' : 'var(--k3-bad-text)') }};"></div>
                                    </div>
                                    <span style="font-weight: 700; font-size: 12px; color: var(--k3-dark);">
                                        {{ $detail->percentage }}%
                                    </span>
                                </div>
                            </td>
                            <td style="text-align: right;">
                                @php
                                    $statusClass = $detail->status === 'Memenuhi Standar' ? 'ok' : ($detail->status === 'Kurang dari Standar' ? 'warn' : 'bad');
                                @endphp
                                <span class="status-pill {{ $statusClass }}">
                                    {{ $detail->status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Legal Notice Box -->
    <div class="notice-box warning" style="margin-top: 24px;">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
            <line x1="12" y1="9" x2="12" y2="13"></line>
            <line x1="12" y1="17" x2="12.01" y2="17"></line>
        </svg>
        <div>
            <strong style="display: block; font-size: 13.5px; margin-bottom: 2px;">Catatan Hukum & Validitas Audit:</strong>
            Hasil analisis ini merupakan kalkulasi otomatis berdasarkan data mandiri yang diinput. Dokumen ini berfungsi sebagai panduan audit internal awal dan bukan sertifikasi resmi pemenuhan seluruh kewajiban K3 atau Sistem Manajemen Keselamatan dan Kesehatan Kerja (SMK3).
        </div>
    </div>

    <!-- Print & Return Actions -->
    <div style="margin-top: 30px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 14px;">
        <a class="btn ghost" href="{{ route('home') }}">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            <span>Kembali ke Beranda Utama</span>
        </a>

        <div style="display: flex; gap: 10px;">
            <button class="btn ghost" onclick="window.print()">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="6 9 6 2 18 2 18 9"></polyline>
                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                    <rect x="6" y="14" width="12" height="8"></rect>
                </svg>
                <span>Cetak Dokumen</span>
            </button>
            <a class="btn primary" href="{{ route('simulation.create') }}">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                <span>Mulai Simulasi Baru</span>
            </a>
        </div>
    </div>

</div>
@endsection
