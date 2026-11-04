@extends('layouts.admin')

@section('title', 'Indikator K3')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line><line x1="20" y1="21" x2="20" y2="16"></line><line x1="20" y1="12" x2="20" y2="3"></line></svg>
            PARAMETER EVALUASI KESELAMATAN
        </div>
        <h1>Indikator Penilaian K3</h1>
        <p>Kelola daftar parameter acuan, kelompok keselamatan, dan metode kalkulasi sistem.</p>
    </div>

    <a class="btn primary" href="{{ route('admin.indicators.create') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Tambah Indikator</span>
    </a>
</div>

<div class="table-card">
    <div class="table-header">
        <h2>Daftar Parameter Indikator</h2>
        <span style="font-size: 12.5px; color: var(--k3-text-muted);">
            Total {{ $items->total() }} indikator terdaftar
        </span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Kode Indikator</th>
                    <th>Kelompok Aspek</th>
                    <th>Nama & Deskripsi Indikator</th>
                    <th>Satuan Ukur</th>
                    <th>Metode Evaluasi</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $i)
                    <tr>
                        <td>
                            <code style="font-size: 11.5px; font-weight: 700; background: var(--k3-bg); border: 1px solid var(--k3-border); padding: 3px 8px; border-radius: var(--radius-sm); color: var(--k3-dark);">
                                {{ $i->code }}
                            </code>
                        </td>
                        <td>
                            <span class="reg-pill" style="padding: 4px 10px; font-size: 11px;">
                                {{ $i->group_name }}
                            </span>
                        </td>
                        <td>
                            <strong style="display: block; color: var(--k3-dark); font-size: 13.5px;">{{ $i->name }}</strong>
                            @if($i->description)
                                <span style="font-size: 11.5px; color: var(--k3-text-muted);">
                                    {{ Str::limit($i->description, 70) }}
                                </span>
                            @endif
                        </td>
                        <td>
                            <span style="font-weight: 600; color: var(--k3-text-muted);">
                                {{ $i->unit ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @php
                                $methodLabel = match($i->assessment_method) {
                                    'ratio' => 'Rasio Terhitung',
                                    'boolean' => 'Ketersediaan (Ya/Tidak)',
                                    'frequency' => 'Frekuensi Berkala',
                                    default => ucfirst($i->assessment_method)
                                };
                            @endphp
                            <span class="status-pill ok" style="font-size: 11px;">
                                {{ $methodLabel }}
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <div class="table-actions">
                                <a class="action-link" href="{{ route('admin.indicators.edit', $i) }}" title="Edit indikator">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <form class="inline-form" method="POST" action="{{ route('admin.indicators.destroy', $i) }}" onsubmit="return confirm('Hapus indikator {{ $i->name }}?')">
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
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--k3-text-muted);">
                            Belum ada indikator K3 tersimpan.
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
