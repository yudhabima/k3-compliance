@extends('layouts.admin')

@section('title', 'Detail Penilaian — ' . ($assessment->company->name ?? 'Perusahaan'))

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
            AUDIT REPORT DETAIL
        </div>
        <h1>{{ $assessment->company->name ?? 'Detail Penilaian' }}</h1>
        <p>Laporan komparasi kondisi aktual terhadap ketentuan batas standar keselamatan kerja.</p>
    </div>

    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
        <button class="btn ghost" onclick="window.print()">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="6 9 6 2 18 2 18 9"></polyline>
                <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"></path>
                <rect x="6" y="14" width="12" height="8"></rect>
            </svg>
            <span>Cetak PDF</span>
        </button>

        @if($assessment->public_token)
            <a class="btn ghost" href="{{ route('infographic.show', $assessment->public_token) }}" target="_blank">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                </svg>
                <span>Buka Versi Infografis</span>
            </a>
        @endif

        <a class="btn ghost" href="{{ route('admin.assessments.index') }}">
            <span>Kembali ke Riwayat</span>
        </a>
    </div>
</div>

<!-- Executive Summary Hero Card -->
<div class="result-hero-card" style="margin-bottom: 24px;">
    <div class="result-hero-info">
        <div class="result-date">
            Tanggal Audit: {{ $assessment->assessment_date?->format('d F Y') ?? '-' }}
        </div>
        <h1 style="margin: 4px 0 14px;">{{ $assessment->company->name }}</h1>
        <div class="result-meta-pills">
            <span class="result-meta-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path></svg>
                {{ $assessment->company->industry->name ?? 'Sektor Umum' }}
            </span>
            <span class="result-meta-pill">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                {{ number_format($assessment->company->employee_count ?? 0) }} Pekerja
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
</div>

<!-- 4 Metrics Grid -->
<div class="result-grid">
    <div class="metric-card score-primary">
        <small>SKOR KEPATUHAN K3</small>
        <strong>{{ number_format($assessment->overall_percentage, 1) }}%</strong>
        <span>Indeks kepatuhan berbobot</span>
    </div>

    <div class="metric-card score-ok">
        <small>MEMENUHI STANDAR</small>
        <strong>{{ $assessment->compliant_count }}</strong>
        <span>Indikator berstatus sesuai</span>
    </div>

    <div class="metric-card score-warn">
        <small>KURANG DARI STANDAR</small>
        <strong>{{ $assessment->partial_count }}</strong>
        <span>Indikator perlu pemenuhan</span>
    </div>

    <div class="metric-card score-bad">
        <small>TIDAK MEMENUHI</small>
        <strong>{{ $assessment->non_compliant_count }}</strong>
        <span>Indikator belum tersedia</span>
    </div>
</div>

<!-- Detailed Table Card -->
<div class="table-card">
    <div class="table-header">
        <h2>Rincian Evaluasi Setiap Indikator</h2>
        <span style="font-size: 12.5px; color: var(--k3-text-muted);">
            Menampilkan {{ $assessment->details->count() }} parameter teruji
        </span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Kelompok Aspek</th>
                    <th>Nama Indikator</th>
                    <th>Kondisi Aktual</th>
                    <th>Standar Minimum</th>
                    <th>Persentase Pemenuhan</th>
                    <th style="text-align: right;">Status Evaluasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($assessment->details as $d)
                    <tr>
                        <td>
                            <span class="reg-pill" style="padding: 3px 8px; font-size: 11px;">
                                {{ $d->indicator->group_name ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <strong style="display: block; color: var(--k3-dark); font-size: 13.5px;">
                                {{ $d->indicator->name ?? '-' }}
                            </strong>
                            <span style="font-size: 11.5px; color: var(--k3-text-muted);">
                                Kode: <code>{{ $d->indicator->code ?? '-' }}</code>
                            </span>
                        </td>
                        <td>
                            <span style="font-weight: 700; color: var(--k3-dark);">
                                {{ $d->actual_value }}
                            </span>
                            <small style="color: var(--k3-text-muted);">{{ $d->indicator->unit ?? '' }}</small>
                        </td>
                        <td>
                            <span style="font-weight: 600; color: var(--k3-text-muted);">
                                {{ $d->standard_value }}
                            </span>
                            <small style="color: var(--k3-text-muted);">{{ $d->indicator->unit ?? '' }}</small>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <div style="flex: 1; min-width: 60px; height: 6px; background: var(--k3-border); border-radius: 99px; overflow: hidden;">
                                    <div style="height: 100%; border-radius: 99px; width: {{ min(100, (float)$d->percentage) }}%; background: {{ $d->status === 'Memenuhi Standar' ? 'var(--k3-primary)' : ($d->status === 'Kurang dari Standar' ? 'var(--k3-warn-text)' : 'var(--k3-bad-text)') }};"></div>
                                </div>
                                <span style="font-weight: 700; font-size: 12px; color: var(--k3-dark);">
                                    {{ $d->percentage }}%
                                </span>
                            </div>
                        </td>
                        <td style="text-align: right;">
                            @php
                                $statusClass = $d->status === 'Memenuhi Standar' ? 'ok' : ($d->status === 'Kurang dari Standar' ? 'warn' : 'bad');
                            @endphp
                            <span class="status-pill {{ $statusClass }}">
                                {{ $d->status }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 30px; color: var(--k3-text-muted);">
                            Tidak ada rincian data indikator.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
