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
