@extends('layouts.admin')

@section('title', 'Data Perusahaan')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path></svg>
            MANAJEMEN ENTITAS INDUSTRI
        </div>
        <h1>Data Perusahaan</h1>
        <p>Kelola profil entitas bisnis, klasifikasi bahaya, dan data tenaga kerja terdaftar.</p>
    </div>

    <a class="btn primary" href="{{ route('admin.companies.create') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="12" y1="5" x2="12" y2="19"></line>
            <line x1="5" y1="12" x2="19" y2="12"></line>
        </svg>
        <span>Tambah Perusahaan</span>
    </a>
</div>

<div class="table-card">
    <div class="table-header">
        <h2>Daftar Perusahaan</h2>
        <span style="font-size: 12.5px; color: var(--k3-text-muted);">
            Total {{ $companies->total() }} perusahaan tercatat
        </span>
    </div>

    <div class="table-scroll">
        <table>
            <thead>
                <tr>
                    <th>Nama & Lokasi Perusahaan</th>
                    <th>Sektor Industri</th>
                    <th>Jumlah Pekerja</th>
                    <th>Klasifikasi Bahaya Kebakaran</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($companies as $c)
                    <tr>
                        <td>
                            <strong style="display: block; color: var(--k3-dark); font-size: 13.5px;">{{ $c->name }}</strong>
                            <span style="font-size: 11.5px; color: var(--k3-text-muted); display: inline-flex; align-items: center; gap: 4px;">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                                {{ $c->location ?? 'Lokasi belum dispesifikasi' }}
                            </span>
                        </td>
                        <td>
                            <span class="reg-pill" style="padding: 4px 10px; font-size: 11.5px;">
                                {{ $c->industry->name ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <span style="display: inline-flex; align-items: center; gap: 5px; font-weight: 600;">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" color="#64748B"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle></svg>
                                {{ number_format($c->employee_count) }} orang
                            </span>
                        </td>
                        <td>
                            @php
                                $riskClass = str_replace(' ', '-', $c->fire_risk_class);
                            @endphp
                            <span class="badge-risk {{ $riskClass }}">
                                Risiko {{ $c->fire_risk_class }}
                            </span>
                        </td>
                        <td style="text-align: right;">
                            <div class="table-actions">
                                <a class="action-link" href="{{ route('admin.companies.edit', $c) }}" title="Edit data">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <span>Edit</span>
                                </a>
                                <form class="inline-form" method="POST" action="{{ route('admin.companies.destroy', $c) }}" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data perusahaan {{ $c->name }}?')">
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
                            Belum ada data perusahaan. Klik tombol "Tambah Perusahaan" untuk memasukkan data baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($companies->hasPages())
        <div class="pagination-wrapper">
            {{ $companies->links() }}
        </div>
    @endif
</div>
@endsection
