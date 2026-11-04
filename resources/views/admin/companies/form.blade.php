@extends('layouts.admin')

@section('title', ($company->exists ? 'Edit' : 'Tambah') . ' Perusahaan')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path></svg>
            FORM DATA PERUSAHAAN
        </div>
        <h1>{{ $company->exists ? 'Edit Profil Perusahaan' : 'Tambah Perusahaan Baru' }}</h1>
        <p>Lengkapi informasi identitas entitas bisnis dan parameter keselamatan kerja.</p>
    </div>

    <a class="btn ghost" href="{{ route('admin.companies.index') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span>Kembali ke Daftar</span>
    </a>
</div>

<form class="form-card" method="POST" action="{{ $company->exists ? route('admin.companies.update', $company) : route('admin.companies.store') }}">
    @csrf
    @if($company->exists)
        @method('PUT')
    @endif

    <div class="form-card-header">
        <h2>Informasi Umum & Identitas</h2>
        <p>Data profil dasar industri untuk dasar klasifikasi beban keselamatan.</p>
    </div>

    <div class="form-grid">
        <div class="form-group full">
            <label for="name">
                <span>Nama Perusahaan / Entitas Usaha</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <input 
                id="name" 
                type="text" 
                name="name" 
                class="form-control" 
                value="{{ old('name', $company->name) }}" 
                placeholder="Contoh: PT Industri Maju Bersama" 
                required
            >
            @error('name')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="industry_id">
                <span>Sektor Industri</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <select id="industry_id" name="industry_id" class="form-control" required>
                <option value="">-- Pilih Sektor Industri --</option>
                @foreach($industries as $i)
                    <option value="{{ $i->id }}" @selected(old('industry_id', $company->industry_id) == $i->id)>
                        {{ $i->name }}
                    </option>
                @endforeach
            </select>
            @error('industry_id')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="location">
                <span>Lokasi / Wilayah Operasional</span>
            </label>
            <input 
                id="location" 
                type="text" 
                name="location" 
                class="form-control" 
                value="{{ old('location', $company->location) }}" 
                placeholder="Kota / Kabupaten, Provinsi"
            >
            @error('location')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="employee_count">
                <span>Jumlah Tenaga Kerja (Orang)</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <input 
                id="employee_count" 
                type="number" 
                min="1" 
                name="employee_count" 
                class="form-control" 
                value="{{ old('employee_count', $company->employee_count ?? 100) }}" 
                required
            >
            @error('employee_count')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="fire_risk_class">
                <span>Klasifikasi Bahaya Kebakaran</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <select id="fire_risk_class" name="fire_risk_class" class="form-control" required>
                @foreach(['Ringan', 'Sedang I', 'Sedang II', 'Sedang III', 'Berat'] as $r)
                    <option value="{{ $r }}" @selected(old('fire_risk_class', $company->fire_risk_class ?? 'Ringan') === $r)>
                        {{ $r }}
                    </option>
                @endforeach
            </select>
            @error('fire_risk_class')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group full">
            <label for="hazard_summary">
                <span>Ringkasan Potensi Bahaya Tempat Kerja</span>
            </label>
            <textarea 
                id="hazard_summary" 
                name="hazard_summary" 
                class="form-control" 
                rows="4" 
                placeholder="Deskripsikan sumber bahaya spesifik, misal: bahan kimia mudah terbakar, instalasi listrik tegangan tinggi, debu kayu, kebisingan mesin..."
            >{{ old('hazard_summary', $company->hazard_summary) }}</textarea>
            @error('hazard_summary')<div class="error-text">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <span>Simpan Data Perusahaan</span>
        </button>

        <a class="btn ghost" href="{{ route('admin.companies.index') }}">
            <span>Batal</span>
        </a>
    </div>
</form>
@endsection
