-- Membuat database
CREATE DATABASE presma;

-- Menggunakan database yang baru dibuat
USE presma;

-- Create table InfoAkun
CREATE TABLE InfoAkun
(
    id_akun         INT           IDENTITY(1,1),
    username        NVARCHAR(100) NOT NULL,
    password        NVARCHAR(255) NOT NULL,
    role            NVARCHAR(15)  NOT NULL,
	CONSTRAINT PK_InfoAkun PRIMARY KEY(id_akun)
);

-- Create table Mahasiswa
CREATE TABLE Mahasiswa
(
    nim             CHAR(10)      NOT NULL,
    id_akun         INT           NOT NULL,
    nama            NVARCHAR(100) NOT NULL,
    pas_foto        NVARCHAR(255) NULL,
    program_studi   NVARCHAR(50)  NOT NULL,
    semester        NVARCHAR(10)  NOT NULL,
    jurusan         NVARCHAR(50)  NOT NULL,
    CONSTRAINT PK_Mahasiswa PRIMARY KEY(nim),
    CONSTRAINT FK_Mahasiswa_InfoAkun FOREIGN KEY(id_akun)
        REFERENCES InfoAkun(id_akun)
);

-- Create table Dosen
CREATE TABLE Dosen
(
    id_dosen        INT           IDENTITY(1,1),
    nidn            CHAR(10)      NOT NULL,
    nama            NVARCHAR(100) NOT NULL,
    pas_foto        NVARCHAR(255) NULL,
    CONSTRAINT PK_Dosen PRIMARY KEY(nidn)
);

-- Create table Prestasi
CREATE TABLE Prestasi
(
    id_prestasi     INT           IDENTITY(1,1),
    jenis           NVARCHAR(50)  NOT NULL,
    tingkat         NVARCHAR(50)  NOT NULL,
    nama            NVARCHAR(100) NOT NULL,
    juara           NVARCHAR(50)  NOT NULL,
    status          NVARCHAR(20)  NOT NULL,
    CONSTRAINT PK_Prestasi PRIMARY KEY(id_prestasi)
);

-- Create table DetailPrestasi
CREATE TABLE DetailPrestasi
(
    id_prestasi     INT           NOT NULL,
    lokasi          NVARCHAR(100) NOT NULL,
    tanggal_mulai   DATE          NOT NULL,
    tanggal_akhir   DATE          NOT NULL,
    sertifikat      NVARCHAR(255) NULL,
    foto_kegiatan   NVARCHAR(255) NULL,
    CONSTRAINT PK_DetailPrestasi PRIMARY KEY(id_prestasi),
    CONSTRAINT FK_DetailPrestasi_Prestasi FOREIGN KEY(id_prestasi)
        REFERENCES Prestasi(id_prestasi)
);

-- Create table PrestasiMahasiswa
CREATE TABLE PrestasiMahasiswa
(
    id_prestasi     INT      NOT NULL,
    nim             CHAR(10) NOT NULL,
    CONSTRAINT PK_PrestasiMahasiswa PRIMARY KEY(id_prestasi, nim),
    CONSTRAINT FK_PrestasiMahasiswa_Prestasi FOREIGN KEY(id_prestasi)
        REFERENCES Prestasi(id_prestasi),
    CONSTRAINT FK_PrestasiMahasiswa_Mahasiswa FOREIGN KEY(nim)
        REFERENCES Mahasiswa(nim)
);

-- Create table PrestasiDosen
CREATE TABLE PrestasiDosen
(
    id_prestasi     INT      NOT NULL,
    nidn            CHAR(10) NOT NULL,
    CONSTRAINT PK_PrestasiDosen PRIMARY KEY(id_prestasi, nidn),
    CONSTRAINT FK_PrestasiDosen_Prestasi FOREIGN KEY(id_prestasi)
        REFERENCES Prestasi(id_prestasi),
    CONSTRAINT FK_PrestasiDosen_Dosen FOREIGN KEY(nidn)
        REFERENCES Dosen(nidn)
);

-- Create table Prestasi.Histori
CREATE TABLE Prestasi_Histori
(
    id_histori      INT           IDENTITY(1,1) NOT NULL,
    id_prestasi     INT           NOT NULL,
    jenis           NVARCHAR(50)  NOT NULL,
    tingkat         NVARCHAR(50)  NOT NULL,
    nama            NVARCHAR(100) NOT NULL,
    juara           NVARCHAR(50)  NOT NULL,
    status          NVARCHAR(20)  NOT NULL,
    lokasi          NVARCHAR(100) NOT NULL,
    tanggal_mulai   DATE          NOT NULL,
    tanggal_akhir   DATE          NOT NULL,
    sertifikat      NVARCHAR(255) NULL,
    foto_kegiatan   NVARCHAR(255) NULL,
    action          NVARCHAR(100) NULL,
    changed_by      NVARCHAR(100) NULL,
    timestamp       DATETIME      NULL,
    CONSTRAINT PK_PrestasiHistori PRIMARY KEY(id_histori),
    CONSTRAINT FK_PrestasiHistori_Prestasi FOREIGN KEY(id_prestasi)
        REFERENCES Prestasi(id_prestasi)
);

-- Create table Admin.Jurusan
CREATE TABLE Admin_Jurusan
(
    id_adminjurusan INT IDENTITY(1,1) NOT NULL,
    id_akun         INT NOT NULL,
    nama            NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_AdminJurusan PRIMARY KEY(id_adminjurusan),
    CONSTRAINT FK_AdminJurusan_InfoAkun FOREIGN KEY(id_akun)
        REFERENCES InfoAkun(id_akun)
);

-- Create table Admin.Polinema
CREATE TABLE Admin_Polinema
(
    id_adminpolinema INT IDENTITY(1,1) NOT NULL,
    id_akun          INT NOT NULL,
    nama             NVARCHAR(100) NOT NULL,
    CONSTRAINT PK_AdminPolinema PRIMARY KEY(id_adminpolinema),
    CONSTRAINT FK_AdminPolinema_InfoAkun FOREIGN KEY(id_akun)
        REFERENCES InfoAkun(id_akun)
);

-- Indexes
CREATE NONCLUSTERED INDEX idx_nc_Mahasiswa_nama ON Mahasiswa(nama);
CREATE NONCLUSTERED INDEX idx_nc_Prestasi_jenis ON Prestasi(jenis);
CREATE NONCLUSTERED INDEX idx_nc_Dosen_nama ON Dosen(nama);

-- Constraints
ALTER TABLE Prestasi ADD CONSTRAINT CHK_Tingkat CHECK (tingkat IN ('Nasional', 'Internasional', 'Regional', 'Lokal'));


-- Tambah data ke InfoAkun
INSERT INTO InfoAkun (username, password, role) VALUES
('mahasiswa2', 'password123', 'Mahasiswa'),
('mahasiswa3', 'password123', 'Mahasiswa'),
('dosen2', 'password123', 'Dosen'),
('dosen3', 'password123', 'Dosen'),
('adminjurusan2', 'password123', 'Admin Jurusan'),
('adminpolinema2', 'password123', 'Admin Polinema');

-- Tambah data ke Mahasiswa
INSERT INTO Mahasiswa (nim, id_akun, nama, pas_foto, program_studi, semester, jurusan) VALUES
('1122334455', 2, 'Citra Ananda', 'citra.jpg', 'Informatika', '7', 'Teknik Informatika'),
('6677889900', 3, 'Eko Saputra', 'eko.jpg', 'Sistem Informasi', '4', 'Teknik Informatika'),
('5544332211', 1, 'Dewi Lestari', 'dewi.jpg', 'Informatika', '6', 'Teknik Komputer'),
('7788990011', 2, 'Fajar Ramadhan', 'fajar.jpg', 'Teknologi Informasi', '3', 'Teknik Informatika');

-- Tambah data ke Dosen
INSERT INTO Dosen (nidn, nama, pas_foto) VALUES
('0012345680', 'Dr. Anita', 'anita.jpg'),
('0012345681', 'Prof. Bambang', 'bambang.jpg'),
('0012345682', 'Dr. Cahyono', 'cahyono.jpg');

-- Tambah data ke Prestasi
INSERT INTO Prestasi (jenis, tingkat, nama, juara, status) VALUES
('Lomba AI', 'Regional', 'AI Challenge 2024', 'Juara 3', 'Terverifikasi'),
('Lomba Web Design', 'Lokal', 'WebDev Competition', 'Juara 1', 'Terverifikasi'),
('Lomba Esai', 'Nasional', 'Esai Terbaik 2024', 'Juara 2', 'Terverifikasi'),
('Lomba Inovasi', 'Internasional', 'Innovation Fest 2024', 'Juara 1', 'Terverifikasi');

-- Tambah data ke DetailPrestasi
INSERT INTO DetailPrestasi (id_prestasi, lokasi, tanggal_mulai, tanggal_akhir, sertifikat, foto_kegiatan) VALUES
(1, 'Surabaya', '2024-09-01', '2024-09-02', 'sertifikat_aichallenge.pdf', 'foto_aichallenge.jpg'),
(2, 'Malang', '2024-08-15', '2024-08-16', 'sertifikat_webdev.pdf', 'foto_webdev.jpg'),
(3, 'Bandung', '2024-07-20', '2024-07-22', 'sertifikat_esai.pdf', 'foto_esai.jpg'),
(4, 'London', '2024-06-01', '2024-06-03', 'sertifikat_innovation.pdf', 'foto_innovation.jpg');

-- Tambah data ke PrestasiMahasiswa
INSERT INTO PrestasiMahasiswa (id_prestasi, nim) VALUES
(1, '1122334455'),
(2, '6677889900'),
(3, '5544332211'),
(4, '7788990011'),

-- Tambah data ke PrestasiDosen
INSERT INTO PrestasiDosen (id_prestasi, nidn) VALUES
(1, '0012345680'),
(2, '0012345681'),
(3, '0012345682'),
(4, '0012345679'),

-- Tambah data ke Prestasi_Histori
INSERT INTO Prestasi_Histori (id_prestasi, jenis, tingkat, nama, juara, status, lokasi, tanggal_mulai, tanggal_akhir, sertifikat, foto_kegiatan, action, changed_by, timestamp) VALUES
(1, 'Lomba AI', 'Regional', 'AI Challenge 2024', 'Juara 3', 'Terverifikasi', 'Surabaya', '2024-09-01', '2024-09-02', 'sertifikat_aichallenge.pdf', 'foto_aichallenge.jpg', 'Insert', 'adminjurusan1', GETDATE()),
(2, 'Lomba Web Design', 'Lokal', 'WebDev Competition', 'Juara 1', 'Terverifikasi', 'Malang', '2024-08-15', '2024-08-16', 'sertifikat_webdev.pdf', 'foto_webdev.jpg', 'Insert', 'adminjurusan2', GETDATE()),
(3, 'Lomba Esai', 'Nasional', 'Esai Terbaik 2024', 'Juara 2', 'Terverifikasi', 'Bandung', '2024-07-20', '2024-07-22', 'sertifikat_esai.pdf', 'foto_esai.jpg', 'Insert', 'adminpolinema1', GETDATE()),
(4, 'Lomba Inovasi', 'Internasional', 'Innovation Fest 2024', 'Juara 1', 'Terverifikasi', 'London', '2024-06-01', '2024-06-03', 'sertifikat_innovation.pdf', 'foto_innovation.jpg', 'Insert', 'adminpolinema2', GETDATE());

-- Tambah data ke Admin_Jurusan
INSERT INTO Admin_Jurusan (id_akun, nama) VALUES
(5, 'Admin Jurusan Teknik Komputer'),
(5, 'Admin Jurusan Teknologi Informasi');

-- Tambah data ke Admin_Polinema
INSERT INTO Admin_Polinema (id_akun, nama) VALUES
(6, 'Admin Polinema Teknik Informatika'),
(6, 'Admin Polinema Sistem Informasi');


