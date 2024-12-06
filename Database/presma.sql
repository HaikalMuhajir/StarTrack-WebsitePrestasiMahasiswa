CREATE DATABASE presma;

-- Menggunakan database PrestasiMahasiswa
USE presma;

-- Tabel InfoAkun
CREATE TABLE Info_Akun (
    id_akun INT IDENTITY(1,1) PRIMARY KEY, 
    username NVARCHAR(100) UNIQUE,
    password VARCHAR(255),
    role NVARCHAR(15),
    token VARCHAR(255)
);

-- Tabel Mahasiswa
CREATE TABLE Mahasiswa (
    id_mahasiswa INT IDENTITY(1,1) PRIMARY KEY,
    nim CHAR(10) UNIQUE,
    id_akun INT,
    nama NVARCHAR(100),
    pas_foto VARCHAR(255),
    program_studi VARCHAR(100),
    semester VARCHAR(10),
    jurusan VARCHAR(100),
    FOREIGN KEY (id_akun) REFERENCES Info_Akun(id_akun)
);

-- Tabel Admin_Jurusan
CREATE TABLE Admin_Jurusan (
    id_admin_jurusan INT IDENTITY(1,1) PRIMARY KEY,
    id_akun INT UNIQUE,
    nama NVARCHAR(100),
    jurusan VARCHAR(100),
    FOREIGN KEY (id_akun) REFERENCES Info_Akun(id_akun)
);

-- Tabel Admin_Polinema
CREATE TABLE Admin_Polinema (
    id_admin_polinema INT IDENTITY(1,1) PRIMARY KEY,
    id_akun INT UNIQUE,
    nama NVARCHAR(100),
    FOREIGN KEY (id_akun) REFERENCES Info_Akun(id_akun)
);

-- Tabel Dosen
CREATE TABLE Dosen (
    id_dosen INT IDENTITY(1,1) PRIMARY KEY,
    nidn CHAR(10) UNIQUE,
    nama NVARCHAR(100),
    pas_foto VARCHAR(255)
);

-- Tabel Prestasi
CREATE TABLE Prestasi (
    id_prestasi INT IDENTITY(1,1) PRIMARY KEY,
    jenis NVARCHAR(100),
    tingkat VARCHAR(100),
    nama NVARCHAR(100),
    juara NVARCHAR(50),
    status NVARCHAR(50),
    lokasi NVARCHAR(255),
    tanggal_mulai DATE,
    tanggal_akhir DATE,
    sertifikat VARCHAR(255),
    foto_kegiatan VARCHAR(255)
);

-- Tabel Prestasi_Mahasiswa
CREATE TABLE Prestasi_Mahasiswa (
    id_prestasi INT,
    id_mahasiswa INT,
    PRIMARY KEY (id_prestasi, id_mahasiswa),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(id_mahasiswa)
);

-- Tabel Prestasi_Dosen
CREATE TABLE Prestasi_Dosen (
    id_prestasi INT,
    id_dosen INT,
    PRIMARY KEY (id_prestasi, id_dosen),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi),
    FOREIGN KEY (id_dosen) REFERENCES Dosen(id_dosen)
);

-- Tabel Prestasi_Histori
CREATE TABLE Prestasi_Histori (
    id_histori INT IDENTITY(1,1) PRIMARY KEY,
    id_prestasi INT,
    action VARCHAR(50),
    changed_by NVARCHAR(100),
    timestamp DATETIME,
    status CHAR(1),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi)
);

-- Tabel InfoAkun
INSERT INTO Info_Akun (username, password, role, token)
VALUES
('agus_santoso', 'password123', 'Mahasiswa', 'token_1'),
('dian_pratama', 'password456', 'Mahasiswa', 'token_2'),
('fitri_handayani', 'password789', 'Mahasiswa', 'token_3'),
('lestari_kusuma', 'password101', 'Mahasiswa', 'token_4'),
('riko_anggara', 'password112', 'Mahasiswa', 'token_5'),
('nanda_kurniawan', 'password131', 'Mahasiswa', 'token_6'),
('ika_susanti', 'password415', 'Mahasiswa', 'token_7'),
('gita_wulandari', 'password161', 'Mahasiswa', 'token_8'),
('eka_nur_hidayat', 'password718', 'Mahasiswa', 'token_9'),
('rahma_permata', 'password192', 'Mahasiswa', 'token_10'),
('fajar_putra', 'password202', 'Mahasiswa', 'token_11'),
('andi_pramono', 'password212', 'Mahasiswa', 'token_12'),
('nur_hidayati', 'password222', 'Mahasiswa', 'token_13'),
('anisah_kurnia', 'password232', 'Mahasiswa', 'token_14'),
('ridwan_ardiansyah', 'password242', 'Mahasiswa', 'token_15'),
('taufik_ramadhan', 'password252', 'Mahasiswa', 'token_16'),
('fani_citra_dewi', 'password262', 'Mahasiswa', 'token_17'),
('dedy_pratama', 'password272', 'Mahasiswa', 'token_18'),
('ayu_lestari', 'password282', 'Mahasiswa', 'token_19'),
('yogi_saputra', 'password292', 'Mahasiswa', 'token_20'),
('admin_agung', 'adminpass1', 'Admin Polinema', 'token_admin_1'),
('admin_anita', 'adminpass2', 'Admin Polinema', 'token_admin_2'),
('admin_rahmat', 'adminpass3', 'Admin Polinema', 'token_admin_3'),
('admin_suyatno', 'adminpass4', 'Admin Polinema', 'token_admin_4'),
('admin_agung_suwandi', 'adminpass5', 'Admin Jurusan', 'token_jurusan_1'),
('admin_iwan_sugiarto', 'adminpass6', 'Admin Jurusan', 'token_jurusan_2'),
('admin_eko_supriyanto', 'adminpass7', 'Admin Jurusan', 'token_jurusan_3'),
('admin_windi_zamrudy', 'adminpass8', 'Admin Jurusan', 'token_jurusan_4'),
('admin_aditya_kurniawan', 'adminpass9', 'Admin Jurusan', 'token_jurusan_5'),
('admin_sri_wahyuni', 'adminpass10', 'Admin Jurusan', 'token_jurusan_6'),
('admin_dewi_saraswati', 'adminpass11', 'Admin Jurusan', 'token_jurusan_7');

-- Mahasiswa --
INSERT INTO Mahasiswa (nim, id_akun, nama, pas_foto, program_studi, semester, jurusan)
VALUES
('21331001', 1, 'Agus Santoso', 'pas_foto1.jpg', 'D-III Teknik Listrik', '5', 'Teknik Elektro'),
('21331002', 2, 'Dian Pratama', 'pas_foto2.jpg', 'D-III Teknik Elektronika', '5', 'Teknik Elektro'),
('21331003', 3, 'Fitri Handayani', 'pas_foto3.jpg', 'D-IV Sistem Kelistrikan', '7', 'Teknik Elektro'),
('21331004', 4, 'Lestari Kusuma', 'pas_foto4.jpg', 'D-III Teknik Telekomunikasi', '4', 'Teknik Elektro'),
('21331005', 5, 'Riko Anggara', 'pas_foto5.jpg', 'Magister Terapan (S2) Teknik Elektro', '3', 'Teknik Elektro'),
('22341001', 6, 'Nanda Kurniawan', 'pas_foto6.jpg', 'D-III Teknik Mesin', '4', 'Teknik Mesin'),
('22341002', 7, 'Ika Susanti', 'pas_foto7.jpg', 'D-IV Teknik Mesin Produksi dan Perawatan', '6', 'Teknik Mesin'),
('22341003', 8, 'Gita Wulandari', 'pas_foto8.jpg', 'Magister Terapan (S2) Rekayasa Teknologi', '2', 'Teknik Mesin'),
('23351001', 9, 'Eka Nur Hidayat', 'pas_foto9.jpg', 'D-IV Sistem Informasi Bisnis', '5', 'Teknologi Informasi'),
('23351002', 10, 'Rahma Permata', 'pas_foto10.jpg', 'D-IV Teknik Informatika', '6', 'Teknologi Informasi'),
('23351003', 11, 'Fajar Putra', 'pas_foto11.jpg', 'Magister Terapan (S2) Rekayasa Teknologi', '2', 'Teknologi Informasi'),
('24361001', 12, 'Andi Pramono', 'pas_foto12.jpg', 'D-III Teknik Kimia', '5', 'Teknik Kimia'),
('24361002', 13, 'Nur Hidayati', 'pas_foto13.jpg', 'D-IV Teknologi Kimia Industri', '7', 'Teknik Kimia'),
('25371001', 14, 'Anisah Kurnia', 'pas_foto14.jpg', 'D-IV Manajemen Rekayasa Konstruksi', '8', 'Teknik Sipil'),
('25371002', 15, 'Ridwan Ardiansyah', 'pas_foto15.jpg', 'D-III Teknik Sipil', '5', 'Teknik Sipil'),
('25371003', 16, 'Taufik Ramadhan', 'pas_foto16.jpg', 'D-IV Teknologi Rekayasa Konstruksi Jalan', '6', 'Teknik Sipil'),
('26381001', 17, 'Fani Citra Dewi', 'pas_foto17.jpg', 'D-III Akuntansi', '5', 'Akuntansi'),
('26381002', 18, 'Dedy Pratama', 'pas_foto18.jpg', 'D-IV Keuangan', '6', 'Akuntansi'),
('27391001', 19, 'Ayu Lestari', 'pas_foto19.jpg', 'D-IV Manajemen Pemasaran', '7', 'Administrasi Niaga'),
('27391002', 20, 'Yogi Saputra', 'pas_foto20.jpg', 'D-III Administrasi Bisnis', '5', 'Administrasi Niaga');

-- Admin Jurusan
INSERT INTO Admin_Jurusan (id_akun, nama, jurusan) 
VALUES 
(21, 'Dr. Agung Suwandi', 'Teknik Elektro'),
(22, 'Dr. Iwan Sugiarto', 'Teknik Mesin'),
(23, 'Eko Supriyanto', 'Teknologi Informasi'),
(24, 'Dr. Windi Zamrudy', 'Teknik Kimia'),
(25, 'Dr. Aditya Kurniawan', 'Teknik Sipil'),
(26, 'Sri Wahyuni', 'Akuntansi'),
(27, 'Dewi Saraswati', 'Administrasi Niaga');

-- Admin Polinema
INSERT INTO Admin_Polinema (id_akun, nama) 
VALUES 
(28, 'Dr. Tundung Subali'),
(29, 'Dr. Anita Kartikasari'),
(30, 'Dr. Rahmat Hidayat'),
(31, 'Dr. Suyatno');

-- Dosen
INSERT INTO Dosen (nidn, nama, pas_foto) 
VALUES 
('1234567890', 'Dr. I Nyoman Suarsana', 'dosen_elektro.jpg'),
('0987654321', 'Dr. Bambang Suryadi', 'dosen_mesin.jpg'),
('1122334455', 'Dr. Dian Purnama', 'dosen_ti.jpg'),
('2233445566', 'Dr. Yanty Maryanty', 'dosen_kimia.jpg'),
('3344556677', 'Dr. Agung Prasetyo', 'dosen_sipil.jpg'),
('4455667788', 'Dr. Rina Indrawati', 'dosen_akuntansi.jpg'),
('5566778899', 'Dr. Yusuf Maulana', 'dosen_adninaga.jpg');

-- prestasi --
INSERT INTO Prestasi (jenis, tingkat, nama, juara, status, lokasi, tanggal_mulai, tanggal_akhir, sertifikat, foto_kegiatan)
VALUES
('Kompetisi Robot', 'Nasional', 'Kontes Robot Indonesia', 'Juara 1', 'Verified', 'Malang', '2024-05-10', '2024-05-12', 'sertifikat1.pdf', 'foto1.jpg'),
('Lomba Program Kreativitas', 'Regional', 'LKTI Mahasiswa', 'Juara 2', 'On Hold', 'Surabaya', '2024-06-15', '2024-06-16', 'sertifikat2.pdf', 'foto2.jpg'),
('Kompetisi Esports', 'Nasional', 'MLBB Polinema Cup', 'Juara 3', 'Rejected', 'Jakarta', '2024-07-20', '2024-07-21', 'sertifikat3.pdf', 'foto3.jpg'),
('Hackathon', 'Internasional', 'Asia Hackathon Challenge', 'Juara Harapan', 'Verified', 'Tokyo', '2024-08-01', '2024-08-03', 'sertifikat4.pdf', 'foto4.jpg'),
('Lomba Debat', 'Nasional', 'Debat Bahasa Inggris', 'Juara 1', 'Verified', 'Bandung', '2024-04-22', '2024-04-23', 'sertifikat5.pdf', 'foto5.jpg'),
('Kompetisi Desain Grafis', 'Nasional', 'Desain Logo Polinema', 'Juara 1', 'Verified', 'Yogyakarta', '2024-09-10', '2024-09-11', 'sertifikat6.pdf', 'foto6.jpg'),
('Lomba Cerdas Cermat', 'Regional', 'LCC Mahasiswa Polinema', 'Juara 2', 'On Hold', 'Bali', '2024-10-01', '2024-10-02', 'sertifikat7.pdf', 'foto7.jpg'),
('Lomba Video Kreatif', 'Nasional', 'Polinema Short Film Competition', 'Juara 3', 'Verified', 'Surabaya', '2024-11-05', '2024-11-06', 'sertifikat8.pdf', 'foto8.jpg'),
('Kompetisi Penulisan Artikel', 'Internasional', 'Global Writing Challenge', 'Juara Harapan', 'Rejected', 'Paris', '2024-12-01', '2024-12-03', 'sertifikat9.pdf', 'foto9.jpg'),
('Lomba Fotografi', 'Regional', 'Polinema Photography Contest', 'Juara 1', 'Verified', 'Malang', '2024-07-10', '2024-07-12', 'sertifikat10.pdf', 'foto10.jpg');

-- Menambahkan data ke tabel Prestasi_Mahasiswa
INSERT INTO Prestasi_Mahasiswa (id_prestasi, id_mahasiswa)
VALUES
(1, 1),  
(2, 2), 
(3, 3), 
(4, 4),  
(5, 5), 
(1, 6),  
(2, 7),  
(3, 8);

-- Menambahkan data ke tabel Prestasi_Dosen
INSERT INTO Prestasi_Dosen (id_prestasi, id_dosen)
VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 4),
(4, 5),
(5, 6),
(2, 7),
(3, 1);
