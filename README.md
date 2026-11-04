# 🛡️ K3 Compliance — Sistem Analisis & Manajemen Kepatuhan K3

Platform evaluasi dan audit mandiri kepatuhan Keselamatan dan Kesehatan Kerja (K3) berbasis web untuk membantu perusahaan memetakan indikator keselamatan kerja terhadap parameter regulasi nasional Republik Indonesia (UU No. 1/1970, PP No. 50/2012 SMK3, Kepmenaker 186/1999, Permenaker 04/1980).

---

## ✨ Fitur Utama

- **🌐 Landing Page Modern**: Tampilan beranda SaaS modern dengan palet warna hijau khas K3 (*Forest Green #14532D*, *Emerald #059669*, dan *White #FFFFFF*).
- **📝 Simulasi K3 Publik**: Formulir penilaian mandiri yang dapat diakses oleh publik tanpa perlu login untuk mengevaluasi kondisi keselamatan tempat kerja.
- **📊 Infografis & Audit Report**: Visualisasi instan persentase kepatuhan (Memenuhi, Kurang, Tidak Memenuhi) dilengkapi fitur cetak laporan PDF (*Executive Compliance Certificate*).
- **🔒 Portal Administrator**:
  - **Dashboard Monitoring**: Ringkasan metrik total entitas industri, total audit tersimpan, dan indikator aktif.
  - **Manajemen Profil Perusahaan**: CRUD profil entitas usaha, sektor industri, total pekerja, dan klasifikasi risiko kebakaran.
  - **Konfigurasi Indikator K3**: Katalog parameter keselamatan dengan metode rasio, boolean, dan frekuensi.
  - **Standar Acuan Regulasi**: Pengaturan nilai ambang batas minimum, operator matematika, dan referensi pasal perundang-undangan.
  - **Riwayat Penilaian & Detail Audit**: Rekapitulasi seluruh simulasi publik beserta rincian pemenuhan per parameter.
  - **Pusat Laporan & Ekspor**: Unduh seluruh riwayat penilaian dalam format CSV kompatibel Excel.

---

## 🛠️ Tech Stack

- **Backend**: Laravel 12.x (PHP 8.2+)
- **Database**: SQLite (Default) / MySQL / PostgreSQL
- **Frontend**: Blade Templating, Vanilla JS, Pure Modern CSS dengan CSS Variables & Google Fonts (*Plus Jakarta Sans* & *Manrope*)
- **Theme**: Safety Green System (`#14532D`, `#15803D`, `#059669`, `#FFFFFF`, `#F8FAFC`)

---

## 🚀 Panduan Instalasi Lokal

1. **Clone Repository:**
   ```bash
   git clone https://github.com/<username>/<repo-name>.git
   cd <repo-name>
   ```

2. **Install Dependensi PHP:**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment:**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Migrasi Database & Seeder:**
   ```bash
   php artisan migrate --seed
   ```

5. **Jalankan Development Server:**
   ```bash
   php artisan serve
   ```
   Akses aplikasi di browser: [http://localhost:8000](http://localhost:8000)

---

## 👤 Kredensial Administrator Default (Seeder)

- **URL Login**: `/admin/login`
- **Email**: `admin@k3compliance.test`
- **Password**: `ChangeMe!2026`

---

## 📜 Lisensi
Dikembangkan untuk keperluan manajemen keselamatan & kesehatan kerja (K3).
Hak Cipta dilindungi.
