@extends('layouts.admin')

@section('title', 'Penilaian K3')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline></svg>
            AUDIT & RECORD SIMULASI
        </div>
        <h1>Riwayat Penilaian K3</h1>
        <p>Arsip evaluasi kepatuhan mandiri perusahaan yang diajukan melalui portal publik.</p>
    </div>

    <a class="btn primary" href="{{ route('admin.reports.export') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
            <polyline points="7 10 12 15 17 10"></polyline>
            <line x1="12" y1="15" x2="12" y2="3"></line>
        </svg>
        <span>Unduh CSV</span>
    </a>
</div>

<div class="table-card">
    <div class="table-header">
        <h2>Daftar Riwayat Penilaian</h2>
        <span style="font-size: 12.5px; color: var(--k3-text-muted);">
            Total {{ $items->total() }} penilaian tersimpan
        </span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Perusahaan & Sektor</th>
                    <th>Tanggal Evaluasi</th>
                    <th>Jumlah Pekerja</th>
                    <th>Ringkasan Indikator</th>
                    <th>Skor Kepatuhan</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $i)
                    <tr>
                        <td>
                            <strong style="display: block; color: var(--k3-dark); font-size: 13.5px;">
                                {{ $i->company->name ?? '-' }}
                            </strong>
                            <span style="font-size: 11.5px; color: var(--k3-text-muted);">
                                {{ $i->company->industry->name ?? 'Umum' }} &bull; Risiko {{ $i->company->fire_risk_class ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span style="font-weight: 500;">
                                {{ $i->assessment_date?->format('d/m/Y') ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span style="display: inline-flex; align-items: center; gap: 5px; font-weight: 600;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" color="#64748B"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                                {{ number_format($i->company->employee_count ?? 0) }} orang
                            </span>
                        </td>
                        <td>
                            <div style="display: flex; gap: 6px; font-size: 11px; font-weight: 700;">
                                <span title="Memenuhi" style="color: var(--k3-ok-text); background: var(--k3-ok-bg); padding: 2px 6px; border-radius: 4px;">{{ $i->compliant_count }} OK</span>
                                <span title="Kurang" style="color: var(--k3-warn-text); background: var(--k3-warn-bg); padding: 2px 6px; border-radius: 4px;">{{ $i->partial_count }} Kurang</span>
                                <span title="Tidak Memenuhi" style="color: var(--k3-bad-text); background: var(--k3-bad-bg); padding: 2px 6px; border-radius: 4px;">{{ $i->non_compliant_count }} Belum</span>
                            </div>
                        </td>
                        <td>
                            @php
                                $score = (float) $i->overall_percentage;
                                $pillClass = $score >= 80 ? 'ok' : ($score >= 60 ? 'warn' : 'bad');
                            @endphp
                            <span class="status-pill {{ $pillClass }}">
                                <span style="font-weight: 800;">{{ number_format($score, 1) }}%</span>
                                <span>&bull;</span>
                                <span>{{ $score >= 80 ? 'Tinggi' : ($score >= 60 ? 'Sedang' : 'Kurang') }}</span>
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <a class="action-link" href="{{ route('admin.assessments.show', $i) }}">
                                <span>Lihat Detail</span>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--k3-text-muted);">
                            Belum ada riwayat simulasi penilaian tersimpan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($items->hasPages())
        <div class="pagination-wrapper">
            {{ $items->links() }}
        </div>
    @endif
</div>
@endsection
