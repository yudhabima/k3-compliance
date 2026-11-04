@extends('layouts.public')

@section('title', 'Simulasi Kepatuhan K3 — K3 Compliance')

@section('content')
<section class="page-head compact">
    <div style="max-width: 1000px; margin: 0 auto;">
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            FORMULIR SIMULASI MANDIRI
        </div>
        <h1>Simulasi Kepatuhan K3 Perusahaan</h1>
        <p>
            Lengkapi data profil tempat kerja dan jumlah aktual fasilitas keselamatan. Kolom indikator yang belum tersedia dapat diisi 0.
        </p>
    </div>
</section>

<div style="max-width: 1048px; margin: 30px auto 80px; padding: 0 24px;">
    <form class="form-card" method="POST" action="{{ route('simulation.store') }}" style="margin: 0; box-shadow: var(--k3-shadow-md);">
        @csrf

        <!-- Section 1: Profil Perusahaan -->
        <div class="sim-section-header" style="margin-top: 0;">
            <div class="sim-section-badge">1</div>
            <div>
                <h2>Identitas & Klasifikasi Bahaya Perusahaan</h2>
                <p style="font-size: 12.5px; color: var(--k3-text-muted); margin: 0;">Parameter ini digunakan untuk menghitung rasio kewajiban personel dan alat keselamatan.</p>
            </div>
        </div>

        <div class="form-grid">
            <div class="form-group full">
                <label for="company_name">
                    <span>Nama Perusahaan / Unit Kerja</span>
                    <span style="color: var(--k3-bad-text);">*</span>
                </label>
                <input 
                    id="company_name" 
                    type="text" 
                    name="company_name" 
                    class="form-control" 
                    value="{{ old('company_name') }}" 
                    placeholder="Contoh: PT Prima Solusi Manufaktur" 
                    required
                >
                @error('company_name')<div class="error-text">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="industry_id">
                    <span>Sektor Industri</span>
                    <span style="color: var(--k3-bad-text);">*</span>
                </label>
                <select id="industry_id" name="industry_id" class="form-control" required>
                    <option value="">-- Pilih Sektor Industri --</option>
                    @foreach($industries as $industry)
                        <option value="{{ $industry->id }}" @selected(old('industry_id') == $industry->id)>
                            {{ $industry->name }}
                        </option>
                    @endforeach
                </select>
                @error('industry_id')<div class="error-text">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="location">
                    <span>Lokasi Operasional Perusahaan</span>
                </label>
                <input 
                    id="location" 
                    type="text" 
                    name="location" 
                    class="form-control" 
                    value="{{ old('location') }}" 
                    placeholder="Kota / Kabupaten"
                >
                @error('location')<div class="error-text">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="employee_count">
                    <span>Jumlah Total Pekerja Aktif</span>
                    <span style="color: var(--k3-bad-text);">*</span>
                </label>
                <input 
                    id="employee_count" 
                    type="number" 
                    min="1" 
                    name="employee_count" 
                    class="form-control" 
                    value="{{ old('employee_count', 200) }}" 
                    required
                >
                <small style="font-size: 11.5px; color: var(--k3-text-muted);">Mempengaruhi rasio wajib personel Ahli K3 dan Tim Kebakaran.</small>
                @error('employee_count')<div class="error-text">{{ $message }}</div>@enderror
            </div>

            <div class="form-group">
                <label for="fire_risk_class">
                    <span>Tingkat Bahaya Kebakaran</span>
                    <span style="color: var(--k3-bad-text);">*</span>
                </label>
                <select id="fire_risk_class" name="fire_risk_class" class="form-control" required>
                    @foreach(['Ringan', 'Sedang I', 'Sedang II', 'Sedang III', 'Berat'] as $risk)
                        <option value="{{ $risk }}" @selected(old('fire_risk_class', 'Ringan') === $risk)>
                            Klasifikasi {{ $risk }}
                        </option>
                    @endforeach
                </select>
                <small style="font-size: 11.5px; color: var(--k3-text-muted);">Sesuai Kepmenaker No. 186/MEN/1999.</small>
                @error('fire_risk_class')<div class="error-text">{{ $message }}</div>@enderror
            </div>

            <div class="form-group full">
                <label for="hazard_summary">
                    <span>Ringkasan Potensi Bahaya Tempat Kerja (Opsional)</span>
                </label>
                <textarea 
                    id="hazard_summary" 
                    name="hazard_summary" 
                    class="form-control" 
                    rows="2" 
                    placeholder="Contoh: Bahan kimia pelarut mudah terbakar, instalasi listrik bertegangan tinggi, mesin berputar..."
                >{{ old('hazard_summary') }}</textarea>
                @error('hazard_summary')<div class="error-text">{{ $message }}</div>@enderror
            </div>
        </div>

        <!-- Section 2: Data Aktual Indikator K3 -->
        <div class="sim-section-header">
            <div class="sim-section-badge">2</div>
            <div>
                <h2>Data Aktual Indikator K3 di Lapangan</h2>
                <p style="font-size: 12.5px; color: var(--k3-text-muted); margin: 0;">
                    Masukkan jumlah fisik unit atau personel saat ini. Untuk indikator Ya/Tidak, ketik <strong>1</strong> jika tersedia/memenuhi, atau <strong>0</strong> jika belum.
                </p>
            </div>
        </div>

        <div class="indicator-grid">
            @foreach($indicators as $indicator)
                <div class="indicator-card">
                    <div class="indicator-info">
                        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 4px;">
                            <span class="reg-pill" style="padding: 2px 7px; font-size: 10px; font-weight: 700;">
                                {{ $indicator->group_name }}
                            </span>
                            @if($indicator->unit)
                                <span style="font-size: 11px; font-weight: 600; color: var(--k3-emerald);">
                                    Satuan: {{ $indicator->unit }}
                                </span>
                            @endif
                        </div>
                        <b>{{ $indicator->name }}</b>
                        @if($indicator->description)
                            <small>{{ Str::limit($indicator->description, 80) }}</small>
                        @endif
                    </div>
                    <div class="indicator-input-box">
                        <input 
                            type="number" 
                            min="0" 
                            step="0.01" 
                            name="actual[{{ $indicator->id }}]" 
                            value="{{ old('actual.'.$indicator->id, 0) }}"
                            aria-label="{{ $indicator->name }}"
                            required
                        >
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Callout Verification Note -->
        <div class="notice-box" style="margin-top: 32px;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="16" x2="12" y2="12"></line>
                <line x1="12" y1="8" x2="12.01" y2="8"></line>
            </svg>
            <div>
                <strong style="color: var(--k3-dark); display: block; font-size: 13.5px; margin-bottom: 2px;">Metode Pengolahan Data:</strong>
                Sistem akan membandingkan angka yang Anda masukkan terhadap ambang batas standar regulasi K3 nasional untuk menghitung skor pemenuhan dan memetakan gap pemenuhan setiap indikator.
            </div>
        </div>

        <!-- Submit Button -->
        <div style="margin-top: 32px; display: flex; justify-content: flex-end;">
            <button type="submit" class="btn primary btn-lg" style="min-width: 260px;">
                <span>Hitung Analisis K3 Sekarang</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </button>
        </div>
    </form>
</div>
@endsection
