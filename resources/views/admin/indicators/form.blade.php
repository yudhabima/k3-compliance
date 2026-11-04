@extends('layouts.admin')

@section('title', ($item->exists ? 'Edit' : 'Tambah') . ' Indikator K3')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="4" y1="21" x2="4" y2="14"></line><line x1="4" y1="10" x2="4" y2="3"></line><line x1="12" y1="21" x2="12" y2="12"></line><line x1="12" y1="8" x2="12" y2="3"></line></svg>
            KONFIGURASI PARAMETER
        </div>
        <h1>{{ $item->exists ? 'Edit Indikator K3' : 'Tambah Indikator Baru' }}</h1>
        <p>Tentukan kode referensi, kategori kelompok, metode penilaian, dan satuan acuan.</p>
    </div>

    <a class="btn ghost" href="{{ route('admin.indicators.index') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span>Kembali ke Daftar</span>
    </a>
</div>

<form class="form-card" method="POST" action="{{ $item->exists ? route('admin.indicators.update', $item) : route('admin.indicators.store') }}">
    @csrf
    @if($item->exists)
        @method('PUT')
    @endif

    <div class="form-card-header">
        <h2>Spesifikasi Parameter Indikator</h2>
        <p>Pastikan kode indikator unik dan sesuai dengan formula perhitungan sistem.</p>
    </div>

    <div class="form-grid">
        <div class="form-group">
            <label for="code">
                <span>Kode Indikator (Unique Identifier)</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <input 
                id="code" 
                type="text" 
                name="code" 
                class="form-control" 
                value="{{ old('code', $item->code) }}" 
                placeholder="Contoh: FIRE_TEAM_D, APAR_COUNT" 
                required
            >
            @error('code')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="group_name">
                <span>Kelompok / Kategori Aspek</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <input 
                id="group_name" 
                type="text" 
                name="group_name" 
                class="form-control" 
                value="{{ old('group_name', $item->group_name) }}" 
                placeholder="Contoh: Personel K3, Proteksi Kebakaran, Fasilitas Evakuasi" 
                required
            >
            @error('group_name')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group full">
            <label for="name">
                <span>Nama Lengkap Indikator</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <input 
                id="name" 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name', $item->name) }}" 
                placeholder="Contoh: Regu Penanggulangan Kebakaran Kelas D (Orang)" 
                required
            >
            @error('name')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="unit">
                <span>Satuan Ukur</span>
            </label>
            <input 
                id="unit" 
                type="text" 
                name="unit" 
                class="form-control" 
                value="{{ old('unit', $item->unit) }}" 
                placeholder="orang, unit, titik, kali/tahun, ya/tidak"
            >
            @error('unit')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="assessment_method">
                <span>Metode Penilaian & Komparasi</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <select id="assessment_method" name="assessment_method" class="form-control" required>
                <option value="ratio" @selected(old('assessment_method', $item->assessment_method ?? 'ratio') === 'ratio')>Rasio (Perbandingan Nilai Minimum)</option>
                <option value="boolean" @selected(old('assessment_method', $item->assessment_method) === 'boolean')>Boolean (Ya=1, Tidak=0)</option>
                <option value="frequency" @selected(old('assessment_method', $item->assessment_method) === 'frequency')>Frekuensi (Inspeksi / Simulasi)</option>
            </select>
            @error('assessment_method')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group full">
            <label for="description">
                <span>Penjelasan & Panduan Pengisian</span>
            </label>
            <textarea 
                id="description" 
                name="description" 
                class="form-control" 
                rows="3" 
                placeholder="Jelaskan kriteria pemenuhan indikator, batasan teknis, atau panduan verifikasi lapangan..."
            >{{ old('description', $item->description) }}</textarea>
            @error('description')<div class="error-text">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <span>Simpan Indikator</span>
        </button>

        <a class="btn ghost" href="{{ route('admin.indicators.index') }}">
            <span>Batal</span>
        </a>
    </div>
</form>
@endsection
