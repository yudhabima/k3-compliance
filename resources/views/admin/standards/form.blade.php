@extends('layouts.admin')

@section('title', ($item->exists ? 'Edit' : 'Tambah') . ' Standar Acuan K3')

@section('content')
<div class="admin-heading">
    <div>
        <div class="eyebrow">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><polyline points="9 12 11 14 15 10"></polyline></svg>
            KONFIGURASI REGULASI
        </div>
        <h1>{{ $item->exists ? 'Edit Standar Acuan' : 'Tambah Standar Acuan Baru' }}</h1>
        <p>Tentukan batasan nilai minimum, operator logika, dan dasar hukum perundang-undangan.</p>
    </div>

    <a class="btn ghost" href="{{ route('admin.standards.index') }}">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <line x1="19" y1="12" x2="5" y2="12"></line>
            <polyline points="12 19 5 12 12 5"></polyline>
        </svg>
        <span>Kembali ke Daftar</span>
    </a>
</div>

<form class="form-card" method="POST" action="{{ $item->exists ? route('admin.standards.update', $item) : route('admin.standards.store') }}">
    @csrf
    @if($item->exists)
        @method('PUT')
    @endif

    <div class="form-card-header">
        <h2>Parameter Standar & Nilai Ambang</h2>
        <p>Nilai ini akan dijadikan tolok ukur otomatis pada simulasi kepatuhan pengguna.</p>
    </div>

    <div class="form-grid">
        <div class="form-group full">
            <label for="indicator_id">
                <span>Indikator Keselamatan Terkait</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <select id="indicator_id" name="indicator_id" class="form-control" required>
                <option value="">-- Pilih Indikator K3 --</option>
                @foreach($indicators as $i)
                    <option value="{{ $i->id }}" @selected(old('indicator_id', $item->indicator_id) == $i->id)>
                        [{{ $i->group_name }}] {{ $i->name }} (Satuan: {{ $i->unit ?? '-' }})
                    </option>
                @endforeach
            </select>
            @error('indicator_id')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="fire_risk_class">
                <span>Klasifikasi Risiko Fasilitas</span>
            </label>
            <select id="fire_risk_class" name="fire_risk_class" class="form-control">
                <option value="" @selected(old('fire_risk_class', $item->fire_risk_class) == '')>Semua Tingkat Klasifikasi</option>
                @foreach(['Ringan', 'Sedang I', 'Sedang II', 'Sedang III', 'Berat'] as $risk)
                    <option value="{{ $risk }}" @selected(old('fire_risk_class', $item->fire_risk_class) === $risk)>
                        Klasifikasi {{ $risk }}
                    </option>
                @endforeach
            </select>
            <small style="font-size: 11.5px; color: var(--k3-text-muted);">Pilih spesifik jika standar berbeda antar tingkat risiko.</small>
            @error('fire_risk_class')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="operator">
                <span>Operator Logika Komparasi</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <select id="operator" name="operator" class="form-control" required>
                <option value=">=" @selected(old('operator', $item->operator ?? '>=') === '>=')>&ge; Minimal / Lebih dari atau sama dengan</option>
                <option value="=" @selected(old('operator', $item->operator) === '=')>= Mutlak / Sama dengan</option>
            </select>
            @error('operator')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="minimum_value">
                <span>Nilai Ambang Batas Minimum</span>
                <span style="color: var(--k3-bad-text);">*</span>
            </label>
            <input 
                id="minimum_value" 
                type="number" 
                step="0.01" 
                min="0" 
                name="minimum_value" 
                class="form-control" 
                value="{{ old('minimum_value', $item->minimum_value ?? 1) }}" 
                required
            >
            @error('minimum_value')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="regulation_name">
                <span>Nama Regulasi Resmi</span>
            </label>
            <input 
                id="regulation_name" 
                type="text" 
                name="regulation_name" 
                class="form-control" 
                value="{{ old('regulation_name', $item->regulation_name) }}" 
                placeholder="Contoh: Permenaker No. 04/MEN/1980"
            >
            @error('regulation_name')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group full">
            <label for="regulation_reference">
                <span>Referensi Pasal / Ayat / Klausul</span>
            </label>
            <input 
                id="regulation_reference" 
                type="text" 
                name="regulation_reference" 
                class="form-control" 
                value="{{ old('regulation_reference', $item->regulation_reference) }}" 
                placeholder="Contoh: Pasal 11 ayat (1) — Setiap 15 meter jarak penempatan"
            >
            @error('regulation_reference')<div class="error-text">{{ $message }}</div>@enderror
        </div>

        <div class="form-group full">
            <label for="notes">
                <span>Catatan Teknis Tambahan</span>
            </label>
            <textarea 
                id="notes" 
                name="notes" 
                class="form-control" 
                rows="3" 
                placeholder="Catatan interpretasi, pengecualian teknis, atau keterangan masa berlaku..."
            >{{ old('notes', $item->notes) }}</textarea>
            @error('notes')<div class="error-text">{{ $message }}</div>@enderror
        </div>
    </div>

    <div class="form-actions">
        <button type="submit" class="btn primary">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path>
                <polyline points="17 21 17 13 7 13 7 21"></polyline>
                <polyline points="7 3 7 8 15 8"></polyline>
            </svg>
            <span>Simpan Standar Acuan</span>
        </button>

        <a class="btn ghost" href="{{ route('admin.standards.index') }}">
            <span>Batal</span>
        </a>
    </div>
</form>
@endsection
