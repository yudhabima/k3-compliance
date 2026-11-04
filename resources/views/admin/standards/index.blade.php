@extends('layouts.admin')

@section('title', 'Standar Acuan K3')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
            BENCHMARK & ATURAN HUKUM
        </div>
        <h1>Standar Acuan K3</h1>
        <p>Konfigurasi ambang batas minimum, aturan operator matematika, dan dasar regulasi hukum.</p>
    </div>

    <a class="btn primary" href="{{ route('admin.standards.create') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Tambah Standar Acuan</span>
    </a>
</div>

<!-- Notice Box -->
<div class="notice-box" style="margin-bottom: 24px;">
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="12" cy="12" r="10"></circle>
        <line x1="12" y1="16" x2="12" y2="12"></line>
        <line x1="12" y1="8" x2="12.01" y2="8"></line>
    </svg>
    <div>
        <strong style="color: var(--k3-dark);">Verifikasi Acuan Hukum K3:</strong>
        Pastikan setiap standar yang dikonfigurasi mencantumkan nomor regulasi resmi, klasifikasi bahaya kebakaran yang tepat, serta nilai minimum yang valid sebelum diaktifkan untuk penilaian publik.
    </div>
</div>

<div class="table-card">
    <div class="table-header">
        <h2>Daftar Standar Acuan Terkonfigurasi</h2>
        <span style="font-size: 12.5px; color: var(--k3-text-muted);">
            Total {{ $items->total() }} standar tercatat
        </span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Indikator Terkait</th>
                    <th>Klasifikasi Risiko</th>
                    <th>Ambang Minimum & Operator</th>
                    <th>Nama & Referensi Regulasi</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $i)
                    <tr>
                        <td>
                            <strong style="display: block; color: var(--k3-dark); font-size: 13.5px;">
                                {{ $i->indicator->name ?? '-' }}
                            </strong>
                            <span style="font-size: 11.5px; color: var(--k3-text-muted);">
                                Kode: <code>{{ $i->indicator->code ?? '-' }}</code> &bull; Satuan: {{ $i->indicator->unit ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @if($i->fire_risk_class)
                                <span class="badge-risk {{ str_replace(' ', '-', $i->fire_risk_class) }}">
                                    {{ $i->fire_risk_class }}
                                </span>
                            @else
                                <span class="reg-pill" style="padding: 3px 8px; font-size: 11px;">
                                    Semua Klasifikasi
                                </span>
                            @endif
                        </td>
                        <td>
                            <div style="display: inline-flex; align-items: center; gap: 6px; font-weight: 700; color: var(--k3-dark);">
                                <span style="background: var(--k3-emerald-light); color: var(--k3-emerald); padding: 2px 7px; border-radius: var(--radius-sm); font-size: 12px;">
                                    {{ $i->operator ?? '>=' }}
                                </span>
                                <span>{{ $i->minimum_value }}</span>
                                <small style="font-weight: 500; color: var(--k3-text-muted);">{{ $i->indicator->unit ?? '' }}</small>
                            </div>
                        </td>
                        <td>
                            <strong style="display: block; font-size: 12.5px; color: var(--k3-dark);">
                                {{ $i->regulation_name ?: 'Regulasi Standar K3' }}
                            </strong>
                            <span style="font-size: 11.5px; color: var(--k3-text-muted);">
                                {{ $i->regulation_reference ?: 'Belum ada nomor pasal' }}
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <div class="table-actions">
                                <a class="action-link" href="{{ route('admin.standards.edit', $i) }}" title="Edit standar">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <form class="inline-form" method="POST" action="{{ route('admin.standards.destroy', $i) }}" onsubmit="return confirm('Hapus konfigurasi standar acuan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="action-delete-btn" title="Hapus">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--k3-text-muted);">
                            Belum ada standar acuan tersimpan.
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
