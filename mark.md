# Blueprint Website Profil & Promosi LSP-P1 [SMK NEGERI 2 KARANGANYAR]

**Konsep Desain:** Profesional, Terpercaya, dan Informatif.
**Fungsi Utama:** Landing page publik untuk branding dan validasi sebelum user masuk ke sistem login LMS/Sistem Uji.

---


# Blueprint Sistem Informasi & Website Profil LSP P1 [Nama Sekolah]

**Versi Dokumen:** 1.0
**Tanggal:** 05 Februari 2026
**Topik:** Pengembangan LMS Sertifikasi & Portal Promosi LSP P1 Berbasis Laravel

---

## 1. Ringkasan Eksekutif
Dokumen ini merancang pembangunan platform digital terintegrasi untuk Lembaga Sertifikasi Profesi (LSP) Pihak 1 berbasis sekolah. Sistem ini memiliki dua fungsi strategis:
1.  **LMS & Manajemen Sertifikasi:** Digitalisasi proses sertifikasi (APL-01, APL-02, Asesmen) sesuai standar BNSP.
2.  **Portal Promosi & Branding:** Media komunikasi publik untuk menonjolkan **kontribusi sekolah** dalam menjamin mutu lulusan dan validasi kompetensi siswa kepada industri/masyarakat.

---

## 2. Spesifikasi Teknis (Software Requirements)

### A. Arsitektur Teknologi
* **Framework Backend:** Laravel 12 (PHP)
* **Database:** MySQL 8.0
* **Frontend:** Blade Templates + Tailwind CSS / Bootstrap 5
* **Server Environment:** Linux (Ubuntu/CentOS) dengan Nginx/Apache
* **Fitur Keamanan:** CSRF Protection, Role-Based Access Control (RBAC), Encrypted User Data.

### B. Rancangan Database (MySQL Schema)
Berikut adalah struktur tabel inti untuk mendukung fungsi LMS, Pendaftaran, dan Verifikasi Sertifikat.

```sql
-- 1. Tabel Users (Multi-role: Admin, Asesor, Asesi)
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    identity_number VARCHAR(50) UNIQUE, -- NIS (Siswa) atau NIP/NIK (Asesor)
    email VARCHAR(100),
    password VARCHAR(255),
    role ENUM('admin', 'asesor', 'asesi'),
    name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 2. Tabel Skema Sertifikasi (Data BNSP)
CREATE TABLE schemes (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    code VARCHAR(50) UNIQUE, -- Contoh: KKNI-II-RPL
    name VARCHAR(255), -- Contoh: Rekayasa Perangkat Lunak
    description TEXT,
    is_active BOOLEAN DEFAULT 1
);

-- 3. Tabel Unit Kompetensi
CREATE TABLE competency_units (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    scheme_id BIGINT,
    code VARCHAR(50),
    title VARCHAR(255),
    FOREIGN KEY (scheme_id) REFERENCES schemes(id)
);

-- 4. Tabel Permohonan Sertifikasi (APL-01)
CREATE TABLE assessments (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT, -- Relasi ke Asesi
    scheme_id BIGINT,
    schedule_date DATE,
    status ENUM('draft', 'submitted', 'verified', 'approved', 'rejected', 'completed'),
    final_result ENUM('K', 'BK') NULL, -- Kompeten / Belum Kompeten
    certificate_number VARCHAR(100) NULL, -- Diisi jika lulus
    issue_date DATE NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- 5. Tabel Asesmen Mandiri (APL-02)
CREATE TABLE self_assessments (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    assessment_id BIGINT,
    unit_id BIGINT,
    element_id INT,
    is_competent BOOLEAN, -- 1=Kompeten, 0=Belum Kompeten
    evidence_file VARCHAR(255), -- Path file bukti portofolio
    assessor_verified BOOLEAN DEFAULT 0
);


## 1. Struktur Menu & Navigasi (Sitemap)

Susunan menu navigasi utama (Navbar) untuk memudahkan akses informasi:

* **Beranda (Home):** Highlight utama, slider banner, dan statistik kinerja live.
* **Tentang LSP:** Profil legalitas, status lisensi BNSP, visi misi, dan struktur organisasi.
* **Skema Sertifikasi:** Daftar lengkap paket keahlian/kompetensi yang tersedia.
* **Kontribusi & Fasilitas:** *(Penting)* Halaman khusus yang menjelaskan peran sekolah dalam penjaminan mutu (TUK & Asesor).
* **Galeri & Berita:** Dokumentasi kegiatan asesmen dan artikel terkini.
* **Cek Sertifikat:** Fitur validasi publik untuk mengecek keaslian sertifikat siswa.
* **Hubungi Kami:** Informasi kontak sekretariat, peta lokasi, dan formulir pesan.

Jurusan Sekolah Kami:
1. Teknik pemesinan
2. Teknik ototronik
3. Tekstil
4. RPL (Rekayasa Perangkat Lunak)
---

## 2. Detail Konten Per Seksi (Copywriting Strategy)

Berikut adalah penjabaran konten untuk menonjolkan profesionalisme dan peran sekolah.

### A. Hero Section (Halaman Depan)
*Wajah pertama website. Gunakan visual high-quality dan kalimat yang kuat.*

* **Headline:**
    > "Mencetak SDM Unggul dan Kompeten dengan Standar Nasional."
* **Sub-headline:**
    > "Lembaga Sertifikasi Profesi (LSP) P1 [Nama Sekolah] terlisensi oleh BNSP untuk menjamin kualitas lulusan yang siap kerja dan bersaing di era global."
* **Call to Action (CTA):**
    `[Lihat Skema Sertifikasi]` `[Panduan Asesmen]`

### B. Seksi "Mengapa Sertifikasi Itu Penting?" (Edukasi Pasar)
*Menjelaskan perbedaan Ijazah vs Sertifikat Kompetensi kepada Orang Tua/Wali.*

1.  **Pengakuan Negara:** Sertifikat berlogo Garuda emas yang diakui secara hukum positif di Indonesia.
2.  **Nilai Tawar Tinggi:** Menjadi prioritas rekrutmen di dunia industri (DUDIKA).
3.  **Standar ASEAN:** Membuka peluang kerja hingga ke luar negeri melalui *Mutual Recognition Arrangement* (MRA).

### C. Seksi "Kontribusi Sekolah Kami" (Value Proposition)
*Inti dari promosi: Menjual dedikasi sekolah dalam memfasilitasi sertifikasi.*

**Komitmen [Nama Sekolah] dalam Penjaminan Mutu Lulusan**
Sekolah kami tidak hanya menyelenggarakan pendidikan, tetapi menjamin kompetensi setiap siswa melalui ekosistem sertifikasi yang serius:

* **🏗️ Investasi TUK (Tempat Uji Kompetensi) Berstandar Industri**
    Kami menyediakan laboratorium dan bengkel praktik yang telah diverifikasi kelayakannya oleh BNSP, memastikan siswa terbiasa dengan peralatan standar industri terkini.
* **👨‍🏫 Guru sebagai Master Asesor**
    Sekolah memfasilitasi para pengajar untuk mengikuti pelatihan Asesor Kompetensi (Askurn), memastikan bahwa penilai adalah praktisi yang tersertifikasi dan kompeten.
* **📚 Integrasi Kurikulum & Skema**
    Materi pembelajaran di kelas diselaraskan dengan SKKNI (Standar Kompetensi Kerja Nasional Indonesia), sehingga sertifikasi bukan beban tambahan, melainkan pembuktian hasil belajar.
* **💰 Subsidi & Fasilitasi Uji**
    Bentuk dukungan nyata sekolah dalam meringankan biaya sertifikasi bagi siswa (melalui program PSKK atau subsidi mandiri sekolah).

### D. Statistik & Kinerja (Social Proof)
*Data ditampilkan secara real-time (Live query dari database Laravel).*

* **Jumlah Skema Terlisensi:** `5+`
* **Jumlah Asesor Kompetensi:** `10+`
* **Jumlah Sertifikat Diterbitkan:** `1000+`
* **Jumlah Jejaring Industri:** `5+`

### E. Daftar Skema Sertifikasi
*Tampilan Card/Grid. Setiap kartu memiliki tombol "Download Unit Kompetensi".*

* **Teknik Komputer & Jaringan:** Skema "Network Administrator Muda"
* **Akuntansi:** Skema "Teknisi Akuntansi Junior"
* **Otomotif:** Skema "Pemeliharaan Kendaraan Ringan"

---

## 3. Fitur Teknis Website (Backend Laravel)

Fitur-fitur publik yang harus diimplementasikan oleh tim pengembang:

### 1. Public Certificate Checker (Verifikasi Sertifikat)
* **Fungsi:** Memungkinkan HRD/Perusahaan memvalidasi keaslian sertifikat siswa.
* **Pesan Branding:** "Kami transparan dan anti-pemalsuan."
* **Logika Teknis:**
    `Input No. Sertifikat` $\rightarrow$ `Query Database` $\rightarrow$ `Result: Nama, Skema, Tgl Berlaku, Status (Kompeten)`.

### 2. Blog/Artikel Kegiatan (SEO Friendly)
* **Fungsi:** Menunjukkan bahwa LSP aktif.
* **Konten:** Posting berita seperti *"Selamat kepada 50 Siswa yang Kompeten pada Uji Kompetensi TKJ Periode 2024"*.

### 3. Integrasi Logo Mitra Industri
* **Fungsi:** Menampilkan logo perusahaan pasangan (DUDIKA) di footer atau section khusus.
* **Caption:** "Sertifikat kami diakui oleh mitra industri terkemuka."

---

## 4. Konsep Tampilan (Wireframe Layout)

Sketsa visual untuk tata letak halaman beranda (Homepage).

| Bagian | Visual / Konten | Pesan Utama |
| :--- | :--- | :--- |
| **Header** | Logo Sekolah & Logo BNSP (Berdampingan) | Legitimasi & Resmi |
| **Hero Banner** | Foto siswa sedang praktik/ujian (menggunakan wearpack/seragam) | *"Real Skills for Real World"* |
| **Pilar Kontribusi** | Ikon Alat (Fasilitas), Ikon Orang (Asesor), Ikon Dokumen (Kurikulum) | Sekolah totalitas memfasilitasi kompetensi |
| **Statistik** | Angka Counter (Animasi hitungan naik) | Bukti kinerja nyata |
| **Testimoni** | Foto Alumni yang sudah bekerja + Kutipan | *"Berkat sertifikat LSP, saya langsung diterima kerja..."* |
| **Footer** | Alamat, Kontak, Link Medsos, Copyright | Mudah dihubungi & Informatif |

---

## 5. Rekomendasi Langkah Selanjutnya

Untuk merealisasikan blueprint ini, lakukan langkah berikut:

1.  **📸 Kumpulkan Aset Foto:**
    * Foto kegiatan asesmen *high-quality* (tidak buram/pecah).
    * Foto asesor sedang menilai dan siswa sedang fokus mengerjakan tugas praktik. Visual adalah kunci kepercayaan.
2.  **📋 Siapkan Data Asesor:**
    * Buat profil singkat asesor (Guru). Contoh: *"Bapak Budi, Asesor Bidang Otomotif, Pengalaman 10 Tahun"*. Ini menaikkan kredibilitas SDM sekolah.
3.  **🔀 Buat Infografis Alur:**
    * Desain diagram alur sederhana: *Pendaftaran -> Pra Asesmen -> Asesmen Mandiri -> Uji Kompetensi -> Penerbitan Sertifikat*.