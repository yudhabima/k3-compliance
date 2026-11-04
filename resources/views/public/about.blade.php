@extends('layouts.public')

@section('title', 'Tentang Aplikasi — K3 Compliance')

@section('content')
<section class="page-head">
    <div class="eyebrow">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg>
        TENTANG PLATFORM
    </div>
    <h1>Analisis K3 Terstruktur, Transparan, dan Berbasis Data</h1>
    <p>
        K3 Compliance dikembangkan sebagai platform evaluasi mandiri untuk mempermudah praktisi K3, manajemen perusahaan, dan auditor internal dalam memetakan pemenuhan standar keselamatan dan kesehatan kerja nasional.
    </p>
</section>

<section class="section" style="padding-top: 50px;">
    <div style="max-width: 900px; margin: 0 auto; display: flex; flex-direction: column; gap: 36px;">
        
        <!-- Pillar Cards -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px;">
            <div style="background: var(--k3-white); border: 1px solid var(--k3-border); border-radius: var(--radius-xl); padding: 28px; box-shadow: var(--k3-shadow-xs);">
                <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--k3-emerald-light); color: var(--k3-emerald); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 style="font-family: var(--font-heading); font-size: 17px; font-weight: 700; color: var(--k3-dark); margin-bottom: 8px;">Pencegahan Risiko</h3>
                <p style="font-size: 13.5px; color: var(--k3-text-muted); line-height: 1.65; margin: 0;">
                    Mengurangi risiko insiden di tempat kerja dengan mendeteksi kesenjangan (gap) antara kondisi riil dan standar keselamatan wajib.
                </p>
            </div>

            <div style="background: var(--k3-white); border: 1px solid var(--k3-border); border-radius: var(--radius-xl); padding: 28px; box-shadow: var(--k3-shadow-xs);">
                <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--k3-emerald-light); color: var(--k3-emerald); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="4" y="2" width="16" height="20" rx="2"></rect><line x1="8" y1="6" x2="16" y2="6"></line><line x1="16" y1="14" x2="16" y2="18"></line><path d="M8 10h.01"></path><path d="M12 10h.01"></path><path d="M16 10h.01"></path></svg>
                </div>
                <h3 style="font-family: var(--font-heading); font-size: 17px; font-weight: 700; color: var(--k3-dark); margin-bottom: 8px;">Audit Objektif</h3>
                <p style="font-size: 13.5px; color: var(--k3-text-muted); line-height: 1.65; margin: 0;">
                    Metodologi penilaian kuantitatif dan kualitatif yang konsisten, tanpa bias subjektif, dengan perhitungan matematis otomatis.
                </p>
            </div>

            <div style="background: var(--k3-white); border: 1px solid var(--k3-border); border-radius: var(--radius-xl); padding: 28px; box-shadow: var(--k3-shadow-xs);">
                <div style="width: 44px; height: 44px; border-radius: var(--radius-md); background: var(--k3-emerald-light); color: var(--k3-emerald); display: flex; align-items: center; justify-content: center; margin-bottom: 18px;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                </div>
                <h3 style="font-family: var(--font-heading); font-size: 17px; font-weight: 700; color: var(--k3-dark); margin-bottom: 8px;">Kesiapan SMK3</h3>
                <p style="font-size: 13.5px; color: var(--k3-text-muted); line-height: 1.65; margin: 0;">
                    Mendukung perusahaan mempersiapkan audit eksternal Sistem Manajemen K3 sesuai PP No. 50 Tahun 2012.
                </p>
            </div>
        </div>

        <!-- Indicator Groups Detail -->
        <div style="background: var(--k3-white); border: 1px solid var(--k3-border); border-radius: var(--radius-xl); padding: 36px; box-shadow: var(--k3-shadow-xs);">
            <h2 style="font-family: var(--font-heading); font-size: 20px; font-weight: 800; color: var(--k3-dark); margin-bottom: 16px;">
                Cakupan Indikator Penilaian
            </h2>
            <p style="font-size: 14px; color: var(--k3-text-muted); line-height: 1.7; margin-bottom: 24px;">
                Sistem mengelompokkan variabel keselamatan ke dalam beberapa kategori utama untuk memberikan evaluasi holistik:
            </p>

            <div style="display: flex; flex-direction: column; gap: 14px;">
                <div style="display: flex; gap: 14px; align-items: flex-start; padding: 12px; background: var(--k3-bg); border-radius: var(--radius-md);">
                    <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--k3-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; flex-shrink: 0; margin-top: 2px;">1</div>
                    <div>
                        <strong style="color: var(--k3-dark); font-size: 14px;">Personel & Tim Tanggap Darurat</strong>
                        <p style="font-size: 13px; color: var(--k3-text-muted); margin: 2px 0 0;">Ketersediaan Ahli K3 Umum, Regu Penanggulangan Kebakaran (Kelas D/C/B/A), dan Petugas P3K sesuai rasio tenaga kerja.</p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; align-items: flex-start; padding: 12px; background: var(--k3-bg); border-radius: var(--radius-md);">
                    <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--k3-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; flex-shrink: 0; margin-top: 2px;">2</div>
                    <div>
                        <strong style="color: var(--k3-dark); font-size: 14px;">Proteksi Bahaya & Peralatan Pemadam</strong>
                        <p style="font-size: 13px; color: var(--k3-text-muted); margin: 2px 0 0;">Ketersediaan APAR terawat, sistem hidran, detektor asap/panas, dan alarm kebakaran otomatis.</p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; align-items: flex-start; padding: 12px; background: var(--k3-bg); border-radius: var(--radius-md);">
                    <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--k3-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; flex-shrink: 0; margin-top: 2px;">3</div>
                    <div>
                        <strong style="color: var(--k3-dark); font-size: 14px;">Fasilitas & Prosedur Evakuasi</strong>
                        <p style="font-size: 13px; color: var(--k3-text-muted); margin: 2px 0 0;">Jalur evakuasi bebas halangan, pintu darurat tahan api, titik kumpul (assembly point), dan denah evakuasi.</p>
                    </div>
                </div>

                <div style="display: flex; gap: 14px; align-items: flex-start; padding: 12px; background: var(--k3-bg); border-radius: var(--radius-md);">
                    <div style="width: 24px; height: 24px; border-radius: 50%; background: var(--k3-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 800; flex-shrink: 0; margin-top: 2px;">4</div>
                    <div>
                        <strong style="color: var(--k3-dark); font-size: 14px;">Standar Operasional & Pelatihan</strong>
                        <p style="font-size: 13px; color: var(--k3-text-muted); margin: 2px 0 0;">SOP tanggap darurat tertulis, simulasi kebakaran berkala (fire drill), dan induksi keselamatan bagi karyawan baru.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Official Disclaimer Notice Box -->
        <div class="notice-box warning">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                <line x1="12" y1="9" x2="12" y2="13"></line>
                <line x1="12" y1="17" x2="12.01" y2="17"></line>
            </svg>
            <div>
                <strong style="display: block; font-size: 14px; margin-bottom: 4px;">Pemberitahuan Resmi Hukum & Kepatuhan:</strong>
                Hasil yang diterbitkan aplikasi ini merupakan alat bantu analisis teknis mandiri (self-assessment tool). Penetapan status kepatuhan hukum resmi dan sertifikasi SMK3 harus tetap diverifikasi oleh Pengawas Ketenagakerjaan dan Lembaga Audit K3 independen yang ditunjuk Kementerian Ketenagakerjaan RI.
            </div>
        </div>

        <div style="text-align: center; margin-top: 10px;">
            <a class="btn primary btn-lg" href="{{ route('simulation.create') }}">
                <span>Mulai Simulasi K3 Sekarang</span>
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </a>
        </div>

    </div>
</section>
@endsection
