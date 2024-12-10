-- Menggunakan database PrestasiMahasiswa
CREATE DATABASE pbl;
USE pbl;

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
	nip CHAR(20) UNIQUE,
    nama NVARCHAR(100),
    jurusan VARCHAR(100),
	pas_foto VARCHAR(255),
    FOREIGN KEY (id_akun) REFERENCES Info_Akun(id_akun)
);

-- Tabel Admin_Polinema
CREATE TABLE Admin_Polinema (
    id_admin_polinema INT IDENTITY(1,1) PRIMARY KEY,
    id_akun INT UNIQUE,
	nip CHAR(20) UNIQUE,
    nama NVARCHAR(100),
	pas_foto VARCHAR(255),
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
    judul NVARCHAR(100),
    juara NVARCHAR(50),
	kategori NVARCHAR(50),
    lokasi NVARCHAR(255),
    tanggal_mulai DATE,
    tanggal_akhir DATE,
	no_surat_tugas VARCHAR(255),
	tgl_surat_tugas DATE,
    status VARCHAR(50),
    sertifikat VARCHAR(255),
    foto_kegiatan VARCHAR(255),
	scan_surat_tugas VARCHAR(255),
	poster VARCHAR(255)
);

-- Tabel Prestasi_Mahasiswa
CREATE TABLE Prestasi_Mahasiswa (
    id_prestasi INT,
    id_mahasiswa INT,
	peran VARCHAR(100),
    PRIMARY KEY (id_prestasi, id_mahasiswa),
    FOREIGN KEY (id_prestasi) REFERENCES Prestasi(id_prestasi),
    FOREIGN KEY (id_mahasiswa) REFERENCES Mahasiswa(id_mahasiswa)
);

-- Tabel Prestasi_Dosen
CREATE TABLE Prestasi_Dosen (
    id_prestasi INT,
    id_dosen INT,
    peran VARCHAR(255),
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

INSERT INTO Info_Akun (username, password, role, token)
VALUES 
-- mahasiswa --  
('2341760138', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341760138'), 2), 'Mahasiswa', NULL),
('2341760119', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341760119'), 2), 'Mahasiswa', NULL),
('2341760107', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341760107'), 2), 'Mahasiswa', NULL),
('2341760179', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341760179'), 2), 'Mahasiswa', NULL),
('2341760196', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341760196'), 2), 'Mahasiswa', NULL),
('2341720130', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341720130'), 2), 'Mahasiswa', NULL),
('2341720149', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341720149'), 2), 'Mahasiswa', NULL),
('2341720048', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341720048'), 2), 'Mahasiswa', NULL),
('2341720145', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341720145'), 2), 'Mahasiswa', NULL),
('2321770004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2321770004'), 2), 'Mahasiswa', NULL),
('2321771003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2321771003'), 2), 'Mahasiswa', NULL),
('2321770006', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2321770006'), 2), 'Mahasiswa', NULL),
('2321771002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2321771002'), 2), 'Mahasiswa', NULL),
('2321770005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2321770005'), 2), 'Mahasiswa', NULL),
('2332610077', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2332610077'), 2), 'Mahasiswa', NULL),
('2232610159', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2232610159'), 2), 'Mahasiswa', NULL),
('2332610066', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2332610066'), 2), 'Mahasiswa', NULL),
('2332610085', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2332610085'), 2), 'Mahasiswa', NULL),
('2332610063', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2332610063'), 2), 'Mahasiswa', NULL),
('2242620196', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242620196'), 2), 'Mahasiswa', NULL),
('2242720160', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242720160'), 2), 'Mahasiswa', NULL),
('2242620125', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242620125'), 2), 'Mahasiswa', NULL),
('2242620042', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242620042'), 2), 'Mahasiswa', NULL),
('2242620044', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242620044'), 2), 'Mahasiswa', NULL),
('2342830034', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342830034'), 2), 'Mahasiswa', NULL),
('2342830038', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342830038'), 2), 'Mahasiswa', NULL),
('2342820040', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342820040'), 2), 'Mahasiswa', NULL),
('2342820056', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342820056'), 2), 'Mahasiswa', NULL),
('2342630044', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342630044'), 2), 'Mahasiswa', NULL),
('2342630029', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342630029'), 2), 'Mahasiswa', NULL),
('2342630026', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342630026'), 2), 'Mahasiswa', NULL),
('2242840011', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242840011'), 2), 'Mahasiswa', NULL),
('2242840042', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242840042'), 2), 'Mahasiswa', NULL),
('2242840005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242840005'), 2), 'Mahasiswa', NULL),
('2232510098', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2232510098'), 2), 'Mahasiswa', NULL),
('2342530080', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342530080'), 2), 'Mahasiswa', NULL),
('243205000000', CONVERT(VARCHAR(32), HASHBYTES('MD5', '243205000000'), 2), 'Mahasiswa', NULL),
('2332510007', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2332510007'), 2), 'Mahasiswa', NULL),
('2232510085', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2232510085'), 2), 'Mahasiswa', NULL),
('2342520059', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2342520059'), 2), 'Mahasiswa', NULL),
('2242520235', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242520235'), 2), 'Mahasiswa', NULL),
('2242520075', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242520075'), 2), 'Mahasiswa', NULL),
('244205000000', CONVERT(VARCHAR(32), HASHBYTES('MD5', '244205000000'), 2), 'Mahasiswa', NULL),
('2242520082', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2242520082'), 2), 'Mahasiswa', NULL),
('244205000001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '244205000001'), 2), 'Mahasiswa', NULL),
('2142530037', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2142530037'), 2), 'Mahasiswa', NULL),
('2142530047', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2142530047'), 2), 'Mahasiswa', NULL),
('2241160147', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2241160147'), 2), 'Mahasiswa', NULL),
('2341160147', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2341160147'), 2), 'Mahasiswa', NULL),
('2241160016', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2241160016'), 2), 'Mahasiswa', NULL),
('2241160035', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2241160035'), 2), 'Mahasiswa', NULL),
('2241160048', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2241160048'), 2), 'Mahasiswa', NULL),
('2141150045', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2141150045'), 2), 'Mahasiswa', NULL),
('2141150099', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2141150099'), 2), 'Mahasiswa', NULL),
('2141150035', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2141150035'), 2), 'Mahasiswa', NULL),
('2141150009', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2141150009'), 2), 'Mahasiswa', NULL),
('2141150017', CONVERT(VARCHAR(32), HASHBYTES('MD5', '2141150017'), 2), 'Mahasiswa', NULL),
('230101001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230101001'), 2), 'Mahasiswa', NULL),
('230101002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230101002'), 2), 'Mahasiswa', NULL),
('230101003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230101003'), 2), 'Mahasiswa', NULL),
('230101004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230101004'), 2), 'Mahasiswa', NULL),
('230101005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230101005'), 2), 'Mahasiswa', NULL),
('230102001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230102001'), 2), 'Mahasiswa', NULL),
('230102002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230102002'), 2), 'Mahasiswa', NULL),
('230102003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230102003'), 2), 'Mahasiswa', NULL),
('230102004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230102004'), 2), 'Mahasiswa', NULL),
('230102005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230102005'), 2), 'Mahasiswa', NULL),
('230103001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230103001'), 2), 'Mahasiswa', NULL),
('230103002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230103002'), 2), 'Mahasiswa', NULL),
('230103003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230103003'), 2), 'Mahasiswa', NULL),
('230103004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230103004'), 2), 'Mahasiswa', NULL),
('230103005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230103005'), 2), 'Mahasiswa', NULL),
('230105001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230105001'), 2), 'Mahasiswa', NULL),
('230105002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230105002'), 2), 'Mahasiswa', NULL),
('230105003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230105003'), 2), 'Mahasiswa', NULL),
('230105004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230105004'), 2), 'Mahasiswa', NULL),
('230105005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '230105005'), 2), 'Mahasiswa', NULL),
('240201001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240201001'), 2), 'Mahasiswa', NULL),
('240201002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240201002'), 2), 'Mahasiswa', NULL),
('240201003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240201003'), 2), 'Mahasiswa', NULL),
('240201004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240201004'), 2), 'Mahasiswa', NULL),
('240201005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240201005'), 2), 'Mahasiswa', NULL),
('240202001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240202001'), 2), 'Mahasiswa', NULL),
('240202002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240202002'), 2), 'Mahasiswa', NULL),
('240202003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240202003'), 2), 'Mahasiswa', NULL),
('240202004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240202004'), 2), 'Mahasiswa', NULL),
('240202005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240202005'), 2), 'Mahasiswa', NULL),
('240203001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240203001'), 2), 'Mahasiswa', NULL),
('240203002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240203002'), 2), 'Mahasiswa', NULL),
('240203003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240203003'), 2), 'Mahasiswa', NULL),
('240203004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240203004'), 2), 'Mahasiswa', NULL),
('240203005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240203005'), 2), 'Mahasiswa', NULL),
('240204001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240204001'), 2), 'Mahasiswa', NULL),
('240204002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240204002'), 2), 'Mahasiswa', NULL),
('240204003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240204003'), 2), 'Mahasiswa', NULL),
('240204004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240204004'), 2), 'Mahasiswa', NULL),
('240204005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '240204005'), 2), 'Mahasiswa', NULL),
('250301001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250301001'), 2), 'Mahasiswa', NULL),
('250301002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250301002'), 2), 'Mahasiswa', NULL),
('250301003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250301003'), 2), 'Mahasiswa', NULL),
('250301004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250301004'), 2), 'Mahasiswa', NULL),
('250301005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250301005'), 2), 'Mahasiswa', NULL),
('250302001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250302001'), 2), 'Mahasiswa', NULL),
('250302002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250302002'), 2), 'Mahasiswa', NULL),
('250302003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250302003'), 2), 'Mahasiswa', NULL),
('250302004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250302004'), 2), 'Mahasiswa', NULL),
('250302005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250302005'), 2), 'Mahasiswa', NULL),
('250303001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250303001'), 2), 'Mahasiswa', NULL),
('250303002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250303002'), 2), 'Mahasiswa', NULL),
('250303003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250303003'), 2), 'Mahasiswa', NULL),
('250303004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250303004'), 2), 'Mahasiswa', NULL),
('250303005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250303005'), 2), 'Mahasiswa', NULL),
('250304001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250304001'), 2), 'Mahasiswa', NULL),
('250304002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250304002'), 2), 'Mahasiswa', NULL),
('250304003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250304003'), 2), 'Mahasiswa', NULL),
('250304004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250304004'), 2), 'Mahasiswa', NULL),
('250304005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250304005'), 2), 'Mahasiswa', NULL),
('250305001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250305001'), 2), 'Mahasiswa', NULL),
('250305002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250305002'), 2), 'Mahasiswa', NULL),
('250305003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250305003'), 2), 'Mahasiswa', NULL),
('250305004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250305004'), 2), 'Mahasiswa', NULL),
('250305005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '250305005'), 2), 'Mahasiswa', NULL),
('260401001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260401001'), 2), 'Mahasiswa', NULL),
('260401002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260401002'), 2), 'Mahasiswa', NULL),
('260401003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260401003'), 2), 'Mahasiswa', NULL),
('260401004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260401004'), 2), 'Mahasiswa', NULL),
('260401005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260401005'), 2), 'Mahasiswa', NULL),
('260402001', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260402001'), 2), 'Mahasiswa', NULL),
('260402002', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260402002'), 2), 'Mahasiswa', NULL),
('260402003', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260402003'), 2), 'Mahasiswa', NULL),
('260402004', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260402004'), 2), 'Mahasiswa', NULL),
('260402005', CONVERT(VARCHAR(32), HASHBYTES('MD5', '260402005'), 2), 'Mahasiswa', NULL),
-- admin jurusan --
('adminJurusanAk', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Akutansi2024'),�2), 'Admin Jurusan', NULL),
('adminJurusanEl', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Elektro2024'),�2), 'Admin Jurusan', NULL),
('adminJurusanKim', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Kimia2024'),�2), 'Admin Jurusan', NULL),
('adminJurusanMe', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Mesin2024'),�2), 'Admin Jurusan', NULL),
('adminJurusanAn', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Niaga2024'),�2), 'Admin Jurusan', NULL),
('adminJurusanSip', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Sipil2024'),�2), 'Admin Jurusan', NULL),
('adminJurusanTi', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Informasi2024'),�2), 'Admin Jurusan', NULL),
-- admin polinema -- 
('adminPolinema1', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Polinema1'),�2), 'Admin Polinema', NULL),
('adminPolinema2', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Polinema2'),�2), 'Admin Polinema', NULL),
('adminPolinema3', CONVERT(VARCHAR(32), HASHBYTES('MD5', 'Polinema3'),�2), 'Admin Polinema', NULL);

INSERT INTO Mahasiswa (nim, id_akun, nama, pas_foto, program_studi, semester, jurusan)
VALUES 
-- jurusan TI --
('2341760138', 1, 'MOCH. HAIKAL PUTRA MUHAJIR', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV SISTEM INFORMASI BISNIS'),
('2341760119', 2, 'ALYA AJENG AYU', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV SISTEM INFORMASI BISNIS'),
('2341760107', 3, 'EKA PUTRI NATALYA KABELEN', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV SISTEM INFORMASI BISNIS'),
('2341760179', 4, 'NADYA HAPSARI PUTRI', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV SISTEM INFORMASI BISNIS'),
('2341760196', 5, 'MUHAMMAD KEMAL SYAHRU GUNAWAN', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV SISTEM INFORMASI BISNIS'),
('2341720130', 6, 'ABDILLAH AGIL ARBIANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV TEKNIK INFORMATIKA'),
('2341720149', 7, 'VINCENTIUS LEONANDA PRABOWO', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV TEKNIK INFORMATIKA'),
('2341720048', 8, 'ANANDA RAHMAWATI', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV TEKNIK INFORMATIKA'),
('2341720145', 9, 'OLTHA ROSYEDA ALHAQ', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV TEKNIK INFORMATIKA'),
('2341720200', 10, 'DINA AMALIA', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '3', 'D-IV TEKNIK INFORMATIKA'),
('2321770004', 11, 'AFFANSYAH HANAN WINDHARTO', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '2', 'D-II PPLS'),
('2321771003', 12, 'BAGUS FARY ANANTA', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '2', 'D-II PPLS'),
('2321770006', 13, 'MUHAMMAD NAAFIUL RAZZAQ', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '2', 'D-II PPLS'),
('2321771002', 14, 'ODAN SYAHARTA', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '2', 'D-II PPLS'),
('2321770005', 15, 'SILVA TRIA ALFARES', '/PBL/uploads/pas-foto.png', 'TEKNOLOGI INFORMASI', '2', 'D-II PPLS'),

-- jurusan ADMINISTRASI NIAGA --
('2332610077', 16, 'Abimanyu', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '3', 'D3 ADMINISTRASI BISNIS'),
('2232610159', 17, 'Affan Samudra', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '3', 'D3 ADMINISTRASI BISNIS'),
('2332610066', 18, 'Agnes Putri Pertiwi', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '3', 'D3 ADMINISTRASI BISNIS'),
('2332610085', 19, 'Agrinda Salwa Putri Lestari', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '3', 'D3 ADMINISTRASI BISNIS'),
('2332610063', 20, 'Aisyah Anjali Bana', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '3', 'D3 ADMINISTRASI BISNIS'),
('2242620196', 21, 'Abdul Rosid Mubarrok', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 MANAJEMEN PEMASARAN'),
('2242720160', 22, 'Abigail Lituhayu', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 MANAJEMEN PEMASARAN'),
('2242620125', 23, 'Adilla Anugrah', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 MANAJEMEN PEMASARAN'),
('2242620042', 24, 'Afifah Septiana', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 MANAJEMEN PEMASARAN'),
('2242620044', 25, 'Agustin Mahardika', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 MANAJEMEN PEMASARAN'),
('2342830034', 26, 'Belva Putri Mazaya Andika', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Bahasa Inggris untuk Industri Pariwisata'),
('2342830038', 27, 'Siswo Fauzi', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Bahasa Inggris untuk Industri Pariwisata'),
('2342820040', 28, 'Ahmad Afrizal Karaman', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Bahasa Inggris untuk Komunikasi Bisnis dan Profesional'),
('2342820056', 29, 'Aqila Sahira Dewi', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Bahasa Inggris untuk Komunikasi Bisnis dan Profesional'),
('2342630044', 30, 'Aura Alindra Putri', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Pengelolaan Arsip dan Rekaman Informasi'),
('2342630029', 31, 'Cindy Julindah Putri', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Pengelolaan Arsip dan Rekaman Informasi'),
('2342630026', 32, 'Dewanata Candra Lukita', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Pengelolaan Arsip dan Rekaman Informasi'),
('2242840011', 33, 'Devanka Tiara Yusiella Putri', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Usaha Perjalanan Wisata'),
('2242840042', 34, 'Dimas Ardia Saputra', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Usaha Perjalanan Wisata'),
('2242840005', 35, 'Eunike Kristanti', '/PBL/uploads/pas-foto.png', 'ADMINISTRASI NIAGA', '4', 'D4 Usaha Perjalanan Wisata'),

-- jurusan AKUTANSI --
('2232510098', 36, 'Anas Farichan', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '3', 'D3 Akuntansi'),
('2342530080', 37, 'Ayuk Anggi Windari', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '3', 'D3 Akuntansi'),
('2432050100', 38, 'Firman Sayidin Akasah', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '3', 'D3 Akuntansi'),
('2332510007', 39, 'Indah Tri Wahyuningtyas', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '3', 'D3 Akuntansi'),
('2232510085', 40, 'Laura Isika Putri', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '3', 'D3 Akuntansi'),
('2342520059', 41, 'Esa Dwi Juwita Muliana', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Akuntansi Manajemen'),
('2242520235', 42, 'Febriana Nur Azizah', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Akuntansi Manajemen'),
('2242520075', 43, 'Frida Elistyani', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Akuntansi Manajemen'),
('2442050200', 44, 'Hayya Tsabitah Raharjo', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Akuntansi Manajemen'),
('2242520082', 45, 'Heppy Indah Palupi', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Akuntansi Manajemen'),
('2442050300', 46, 'Putri Riyatun Zulkiana', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Keuangan'),
('2142530037', 47, 'Rachel Angel Marcellya Nurida', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Keuangan'),
('2142530047', 48, 'Radinda Feril Abrilia', '/PBL/uploads/pas-foto.png', 'AKUTANSI', '4', 'D4 Keuangan'),

-- jurusan TEKNIK ELEKTRO --
('224116014', 49, 'JOKO FEBRIANTO', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 JARINGAN TELEKOMUNIKASI DIGITAL'),
('234116014', 50, 'M HAKIM FAHAD HARVIANDRA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 JARINGAN TELEKOMUNIKASI DIGITAL'),
('224116001', 51, 'MUHAMAD DZIKRI HENDREANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 JARINGAN TELEKOMUNIKASI DIGITAL'),
('224116003', 52, 'MUHAMMAD ADIB FAKHRIZA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 JARINGAN TELEKOMUNIKASI DIGITAL'),
('224116004', 53, 'MUHAMMAD YUSUF AL RASYID', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 JARINGAN TELEKOMUNIKASI DIGITAL'),
('214115004', 54, 'ALTHAFIAN NAZIR AL Y', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 SISTEM KELISTRIKAN'),
('214115009', 55, 'ANNISA ANGGRAINI NINGRUM', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 SISTEM KELISTRIKAN'),
('214115003', 56, 'DERYSAN MIFTA SETIYA IRFANI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 SISTEM KELISTRIKAN'),
('214115000', 57, 'FAHRI ARDWIYANTO', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 SISTEM KELISTRIKAN'),
('214115001', 58, 'FERDINAN ANDRE PRATAMA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D4 SISTEM KELISTRIKAN'),
('230101001', 59, 'AHMAD PRASETYO', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK LISTRIK'),
('230101002', 60, 'BUDI SANTOSO', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK LISTRIK'),
('230101003', 61, 'CITRA DEWI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK LISTRIK'),
('230101004', 62, 'DANI FIRMANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK LISTRIK'),
('230101005', 63, 'EKA SURYANI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK LISTRIK'),
('230102001', 64, 'FAJAR MAHENDRA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK ELEKTRONIKA'),
('230102002', 65, 'GITA RAHMAWATI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK ELEKTRONIKA'),
('230102003', 66, 'HENDRA SAPUTRA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK ELEKTRONIKA'),
('230102004', 67, 'INDRA KUSUMA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK ELEKTRONIKA'),
('230102005', 68, 'JOKO PURWANTO', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK ELEKTRONIKA'),
('230103001', 69, 'KARTIKA SARI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK TELEKOMUNIKASI'),
('230103002', 70, 'LILIS WAHYUNI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK TELEKOMUNIKASI'),
('230103003', 71, 'MIKO FEBRIANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK TELEKOMUNIKASI'),
('230103004', 72, 'NUR HALIMAH', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK TELEKOMUNIKASI'),
('230103005', 73, 'OKTAVIANUS HADI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '3', 'D-III TEKNIK TELEKOMUNIKASI'),
('230105001', 74, 'UMI SALSABILA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D-IV TEKNIK ELEKTRONIKA'),
('230105002', 75, 'VINA SEPTIANI', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D-IV TEKNIK ELEKTRONIKA'),
('230105003', 76, 'WAHYU AGUNG', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D-IV TEKNIK ELEKTRONIKA'),
('230105004', 77, 'XAVERIUS MANURUNG', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D-IV TEKNIK ELEKTRONIKA'),
('230105005', 78, 'YOSEF MULYANA', '/PBL/uploads/pas-foto.png', 'TEKNIK ELEKTRO', '4', 'D-IV TEKNIK ELEKTRONIKA'),

-- MESIN
('240201001', 1, 'ANDI PRATAMA', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNIK MESIN'),
('240201002', 1, 'BELLA AMELIA', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNIK MESIN'),
('240201003', 1, 'CAHYADI PUTRA', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNIK MESIN'),
('240201004', 1, 'DINDA SAFITRI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNIK MESIN'),
('240201005', 1, 'EKA RAHAYU', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNIK MESIN'),
('240202001', 1, 'FARHAN KURNIAWAN', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNOLOGI PEMELIHARAAN PESAWAT UDARA'),
('240202002', 1, 'GITA MAHARANI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNOLOGI PEMELIHARAAN PESAWAT UDARA'),
('240202003', 1, 'HANA WIJAYANTI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNOLOGI PEMELIHARAAN PESAWAT UDARA'),
('240202004', 1, 'INDRA WIBOWO', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNOLOGI PEMELIHARAAN PESAWAT UDARA'),
('240202005', 1, 'JAKA SANTOSO', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-III', 'TEKNOLOGI PEMELIHARAAN PESAWAT UDARA'),
('240203001', 1, 'KARINA MAULIDA', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK MESIN PRODUKSI DAN PERAWATAN'),
('240203002', 1, 'LEO PERMADI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK MESIN PRODUKSI DAN PERAWATAN'),
('240203003', 1, 'MAYA SARI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK MESIN PRODUKSI DAN PERAWATAN'),
('240203004', 1, 'NUGROHO RACHMAT', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK MESIN PRODUKSI DAN PERAWATAN'),
('240203005', 1, 'OKI SETIAWAN', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK MESIN PRODUKSI DAN PERAWATAN'),
('240204001', 1, 'PUTRA RIZALDI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK OTOMOTIF ELEKTRONIK'),
('240204002', 1, 'QADRI NURFALAH', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK OTOMOTIF ELEKTRONIK'),
('240204003', 1, 'RINA ANGRYANI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK OTOMOTIF ELEKTRONIK'),
('240204004', 1, 'SANDI PRAKOSO', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK OTOMOTIF ELEKTRONIK'),
('240204005', 1, 'TANIA WULANDARI', '/PBL/uploads/pas-foto.png', 'TEKNIK MESIN', 'D-IV', 'TEKNIK OTOMOTIF ELEKTRONIK'),

--SIPIL
('250301001', 2, 'AHMAD FAUZI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI SIPIL'),
('250301002', 2, 'BELLA RAHAYU', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI SIPIL'),
('250301003', 2, 'CANDRA WIJAYA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI SIPIL'),
('250301004', 2, 'DWI SETIAWAN', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI SIPIL'),
('250301005', 2, 'EKA SURYANI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI SIPIL'),
('250302001', 2, 'FARID HIDAYAT', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI KONSTRUKSI JALAN, JEMBATAN, DAN BANGUNAN AIR'),
('250302002', 2, 'GITA AMBARWATI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI KONSTRUKSI JALAN, JEMBATAN, DAN BANGUNAN AIR'),
('250302003', 2, 'HENDRI SAPUTRA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI KONSTRUKSI JALAN, JEMBATAN, DAN BANGUNAN AIR'),
('250302004', 2, 'INTAN MARLINA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI KONSTRUKSI JALAN, JEMBATAN, DAN BANGUNAN AIR'),
('250302005', 2, 'JOKO PURNOMO', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI KONSTRUKSI JALAN, JEMBATAN, DAN BANGUNAN AIR'),
('250303001', 2, 'KIKI ANDRIANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI PERTAMBANGAN'),
('250303002', 2, 'LISA MAULIDA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI PERTAMBANGAN'),
('250303003', 2, 'MIKO ALAMSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI PERTAMBANGAN'),
('250303004', 2, 'NINA WULANDARI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI PERTAMBANGAN'),
('250303005', 2, 'OKA NUGRAHA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-III', 'TEKNOLOGI PERTAMBANGAN'),
('250304001', 2, 'PUTRI OKTAVIANI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'TEKNOLOGI REKAYASA KONSTRUKSI JALAN DAN JEMBATAN'),
('250304002', 2, 'QORI MAULIDYA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'TEKNOLOGI REKAYASA KONSTRUKSI JALAN DAN JEMBATAN'),
('250304003', 2, 'RIZKI ADRIANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'TEKNOLOGI REKAYASA KONSTRUKSI JALAN DAN JEMBATAN'),
('250304004', 2, 'SITI NURAINI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'TEKNOLOGI REKAYASA KONSTRUKSI JALAN DAN JEMBATAN'),
('250304005', 2, 'TAUFIK HIDAYAT', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'TEKNOLOGI REKAYASA KONSTRUKSI JALAN DAN JEMBATAN'),
('250305001', 2, 'UMI AULIA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'MANAJEMEN REKAYASA KONSTRUKSI'),
('250305002', 2, 'VINA ANGGRAENI', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'MANAJEMEN REKAYASA KONSTRUKSI'),
('250305003', 2, 'WAHYU FIRMANSYAH', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'MANAJEMEN REKAYASA KONSTRUKSI'),
('250305004', 2, 'XENA AMELIA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'MANAJEMEN REKAYASA KONSTRUKSI'),
('250305005', 2, 'YUDI PRATAMA', '/PBL/uploads/pas-foto.png', 'TEKNIK SIPIL', 'D-IV', 'MANAJEMEN REKAYASA KONSTRUKSI'),

-- KIMIA
('260401001', 3, 'AHMAD RIDWAN', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-III', 'TEKNIK KIMIA'),
('260401002', 3, 'BELLA SAFITRI', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-III', 'TEKNIK KIMIA'),
('260401003', 3, 'CANDRA WIJAYA', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-III', 'TEKNIK KIMIA'),
('260401004', 3, 'DWI ANGRAINI', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-III', 'TEKNIK KIMIA'),
('260401005', 3, 'EKA PRASETYO', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-III', 'TEKNIK KIMIA'),
('260402001', 3, 'FAJAR NUGRAHA', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-IV', 'TEKNOLOGI KIMIA INDUSTRI'),
('260402002', 3, 'GITA AYU MAHARANI', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-IV', 'TEKNOLOGI KIMIA INDUSTRI'),
('260402003', 3, 'HENDRA SAPUTRA', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-IV', 'TEKNOLOGI KIMIA INDUSTRI'),
('260402004', 3, 'INDAH MAULIDYA', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-IV', 'TEKNOLOGI KIMIA INDUSTRI'),
('260402005', 3, 'JOKO SURYANTO', '/PBL/uploads/pas-foto.png', 'TEKNIK KIMIA', 'D-IV', 'TEKNOLOGI KIMIA INDUSTRI');

INSERT INTO Admin_Jurusan (id_akun, nip, nama, jurusan, pas_foto)
VALUES 
('', '198403182009102001', 'Liliya Indra Cahyani, SE.', 'Akutansi', '/uploads/admin_jurusan/akutansi/admin_ak.png'),
('', '120972007', 'Antin Suhartati, SE.', 'Teknik Elektro', '/uploads/admin_jurusan/elektro/admin_elektro.png' ),
('', '198503112014042001', 'Fauziah Sholikhatun Nisa, A.Md.', 'Teknik Kimia', '/uploads/admin_jurusan/kimia/admin_kimia.png'),
('', '197212271993031003', 'Imam Saukani, ST., MT.', 'Teknik Mesin', '/uploads/admin_jurusan/mesin/admin_mesin.png'),
('', '197410152001121001', 'Hariyanto, A.Md.', 'Administrasi Niaga', '/uploads/admin_jurusan/niaga/admin_niaga.png'),
('', '181172042', 'Laily Ratnaningtyas, S.ST.' , 'Teknik Sipil', '/uploads/admin_jurusan/sipil/admin_sipil.png'),
('', '180171002', 'Ahmadyani Bagus Wicaksono, S.M.', 'Teknologi Informasi', '/uploads/admin_jurusan/ti/admin_ti.png');

INSERT INTO Admin_Polinema (id_akun, nip, nama, pas_foto)
VALUES 
('', '160671010', 'Mohammad Yunus', '/uploads/admin_polinema/admin-polinema1.png'),
('', '197811302001122001', 'Rosita Ferdiyana, S.ST.', '/uploads/admin_polinema/admin-polinema2.png'),
('', '100471012', 'Slamet Hariyanto', '/uploads/admin_polinema/admin-polinema3.png');

INSERT INTO Dosen (nidn, nama, pas_foto)
VALUES 
-- Data dari Teknologi Informasi
('0030107702', 'Mungki Astiningrum, ST., M.Kom', 'Dosen/TI/1.png', 'Teknologi Informasi', 'D-II Pengembangan Piranti Lunak Situs'),
('0010068402', 'Imam Fahrur Rozi, ST., MT', 'Dosen/TI/2.png', 'Teknologi Informasi', 'D-IV Sistem Informasi Bisnis'),
('0018057101', 'Hendra Pradibta, SE., M.Sc', 'Dosen/TI/3.png', 'Teknologi Informasi', 'D-IV Sistem Informasi Bisnis'),
('0013037905', 'Arief Prasetyo, S.Kom', 'Dosen/TI/4.png', 'Teknologi Informasi', 'D-IV Teknik Informatika'),
('0002027214', 'Cahya Rahmad, ST., M.Kom., Dr. Eng', 'Dosen/TI/5.png', 'Teknologi Informasi', 'D-IV Teknik Informatika'),

-- Data dari Teknik Mesin
('0004016314', 'Ir. Agus Harijono, M.T', 'Dosen/Mesin/6.png', 'Teknik Mesin', 'D-III Teknologi Pemeliharaan Pesawat Udara'),
('0016057602', 'Drs. Heru Prasetyo, M.P.d', 'Dosen/Mesin/7.png', 'Teknik Mesin', 'D-IV Teknik Mesin Produksi dan Perawatan'),
('0010117307', 'Agus Hardjito, S.T., M.T.', 'Dosen/Mesin/8.png', 'Teknik Mesin', 'D-IV Teknik Otomotif Elektronik'),
('0013066004', 'Dr. Eko Yudiyanto, S.T., M.T.', 'Dosen/Mesin/9.png', 'Teknik Mesin', 'D-IV Teknik Otomotif Elektronik'),
('0002126902', 'Dr. Wirawan, B.Eng(HONS).MT', 'Dosen/Mesin/10.png', 'Teknik Mesin', 'D-IV Teknik Otomotif Elektronik'),

-- Data dari Teknik Kimia
('0013016003', 'Denda Dewatama S.T.M.T', 'Dosen/Kimia/11.png', 'Teknik Kimia', 'D-III Teknik Kimia'),
('0029095804', 'Donny Radianto S.T.M.Eng', 'Dosen/Kimia/12.png', 'Teknik Kimia', 'D-III Teknik Kimia'),
('0015125702', 'Dr. Budhy Setiawan B.S.E.ET.M.T', 'Dosen/Kimia/13.png', 'Teknik Kimia', 'D-III Teknik Kimia'),
('0026017106', 'Hari Kurnia Safitri, S.T., M.T.', 'Dosen/Kimia/14.png', 'Teknik Kimia', 'D-IV Teknologi Kimia Industri'),
('0015027003', 'Herwandi, S.T., M.T.', 'Dosen/Kimia/15.png', 'Teknik Kimia', 'D-IV Teknologi Kimia Industri'),

-- Data dari Teknik Sipil
('0017085912', 'Faisal Rahutomo, ST., M.Kom., Dr.Eng', 'Dosen/Sipil/16.png', 'Teknik Sipil', 'D-III Teknik Sipil'),
('0016087201', 'Dwi Puspitasari, S.Kom., M.Kom', 'Dosen/Sipil/17.png', 'Teknik Sipil', 'D-III Teknologi Konstruksi Jalan, Jembatan, Dan Bangunan Air'),
('0030106302', 'Dimas Wahyu Wibowo, ST., MT', 'Dosen/Sipil/18.png', 'Teknik Sipil', 'D-III Teknologi Pertambangan'),
('0008066606', 'Dhebys Suryani H, S.Kom., MT', 'Dosen/Sipil/19.png', 'Teknik Sipil', 'D-IV Teknologi Rekayasa Konstruksi Jalan Dan Jembatan'),
('0007085916', 'Deddy Kusbianto Purwoko Aji, Ir., M.MKom', 'Dosen/Sipil/20.png', 'Teknik Sipil', 'D-IV Manajemen Rekayasa Konstruksi'),

-- Data dari Teknik Elektro
('0015097103', 'Ir. Mohammad Luqman MS.', 'Dosen/Elektro/21.png', 'Teknik Elektro', 'D-III Teknik Listrik'),
('0012046309', 'Indrawan Nugrahanto S.ST M.T', 'Dosen/Elektro/22.png', 'Teknik Elektro', 'D-III Teknik Elektronika'),
('0021056703', 'Indrazno Sirajuddin S.T.M.T.Ph.D', 'Dosen/Elektro/23.png', 'Teknik Elektro', 'D-III Teknik Telekomunikasi'),
('0011067601', 'Ir. Agus Sukoco Heru Sumarno M.T', 'Dosen/Elektro/24.png', 'Teknik Elektro', 'D-IV Sistem Kelistrikan'),
('0014016305', 'Ir. Ari Murtono M.T', 'Dosen/Elektro/25.png', 'Teknik Elektro', 'D-IV Teknik Elektronika'),

-- Data dari Akuntansi
('0011095908', 'Drs. Eka Mandayatma, M.T', 'Dosen/Akutansi/26.png', 'Akuntansi', 'D-III Akuntansi'),
('0002027214', 'Drs. Fathoni, M.T', 'Dosen/Akutansi/27.png', 'Akuntansi', 'D-III Akuntansi'),
('0005116404', 'Leonardo Kamajaya, S.ST., M.Sc', 'Dosen/Akutansi/28.png', 'Akuntansi', 'D-IV Keuangan'),
('0028116204', 'Mila Fauziyah, S.T., M.T', 'Dosen/Akutansi/29.png', 'Akuntansi', 'D-IV Keuangan'),
('0027127801', 'Denda Dewatama, S.T., M.T', 'Dosen/Akutansi/30.png', 'Akuntansi', 'D-IV Akuntansi Manajemen'),

-- Data dari Administrasi Niaga
('0020026106', 'Siti Amerieska, SE.MSA.Ak.CA.', 'Dosen/Administrasi Niaga/31.png', 'Administrasi Niaga', 'D-III Administrasi Bisnis'),
('0008078401', 'Annisa Fatimah, S.ST., M.SA.', 'Dosen/Administrasi Niaga/32.png', 'Administrasi Niaga', 'D-IV Manajemen Pemasaran'),
('0023026206', 'Dr. Nurafni Eltivia, S.E., M.SA.', 'Dosen/Administrasi Niaga/33.png', 'Administrasi Niaga', 'D-IV Bahasa Inggris untuk Komunikasi Bisnis dan Profesional'),
('0022126104', 'Dr. Dra. Kurnia Ekasari, Ak., M.M., CA.', 'Dosen/Administrasi Niaga/34.png', 'Administrasi Niaga', 'D-IV Bahasa Inggris untuk Industri Pariwisata'),
('0013056007', 'Drs. Hari Purnomo, Ak., M.Si.', 'Dosen/Administrasi Niaga/35.png', 'Administrasi Niaga', 'D-IV Pengelolaan Arsip dan Rekaman Informasi'),
('0025036304', 'Dr. Drs. Sumiadji, Ak., M.SA.', 'Dosen/Administrasi Niaga/36.png', 'Administrasi Niaga', 'D-IV Usaha Perjalanan Wisata');


INSERT INTO Prestasi (jenis, tingkat, judul, juara, lokasi, tanggal_mulai, tanggal_akhir, status, sertifikat, foto_kegiatan, scan_surat_tugas, poster)
VALUES 
('Kompetisi Pemrograman', 'Nasional', 'Hackathon 2024', 'Juara 1', 'Jakarta', '2024-07-01', '2024-07-03', 'On Hold', '/uploads/prestasi/1/sertifikat.pdf' , '/uploads/prestasi/1/foto-kegiatan.jpg');

INSERT INTO Prestasi_Mahasiswa (id_prestasi, id_mahasiswa, peran)
VALUES 
(1, 1, 'Personal');

INSERT INTO Prestasi_Dosen (id_prestasi, id_dosen, peran)
VALUES 
(1, 1, 'Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional')