-- Percobaan Satu (Membuat Database)
CREATE DATABASE Informatika;

-- Percobaan Dua (Membuat Tabel)
CREATE TABLE Mahasiswa(NIM varchar(10)PRIMARY KEY NOT NULL, Nama char(50)NULL, Kelas char(5)NULL, Alamat char(50)NULL);

-- Percobaan Tiga (Memasukkan Data)
INSERT INTO Mahasiswa VALUES('L200080001', 'Ari Wibowo', 'A', 'Solo');
SELECT * FROM Mahasiswa;
INSERT INTO Mahasiswa(NIM,Nama,Kelas) VALUES('L200080002', 'Agustina', 'B');
SELECT * FROM Mahasiswa;

-- Percobaan Empat (Mengubah Data)
UPDATE Mahasiswa SET Nama='Agustina Anggraini' WHERE Nama='Agustina';
SELECT * FROM Mahasiswa;

-- Interlude (JOIN)
CREATE TABLE Nilai(NIM varchar(10)PRIMARY KEY NOT NULL, Nama_MK varchar(50)NULL, Nilai_Angka INT(10) NULL, Nilai_Huruf char(5)NULL);
INSERT INTO Nilai(NIM, Nama_MK, Nilai_Angka, Nilai_Huruf) VALUES ('L200080002', 'Kapita Selekta', 60, 'BC'),('L200080010', 'Pemrograman Web', 87, 'A'),('L200080080', 'Pemrograman Web', 90, 'A');

-- Percobaan Lima (Join)
SELECT Mahasiswa.NIM, Mahasiswa.Nama, Nilai.Nama_MK, Nilai.Nilai_Angka, Nilai.Nilai_Huruf FROM (Mahasiswa JOIN Nilai ON Mahasiswa.NIM=Nilai.NIM);

-- Percobaan Enam (Left Join)
SELECT Mahasiswa.NIM, Mahasiswa.Nama, Nilai.Nama_MK, Nilai.Nilai_Angka, Nilai.Nilai_Huruf FROM (Mahasiswa LEFT JOIN Nilai ON Mahasiswa.NIM=Nilai.NIM);

-- Percobaan Tujuh (Right Join)
SELECT Mahasiswa.NIM, Mahasiswa.Nama, Nilai.Nama_MK, Nilai.Nilai_Angka, Nilai.Nilai_Huruf FROM (Mahasiswa RIGHT JOIN Nilai ON Mahasiswa.NIM=Nilai.NIM);

-- Percobaan Delapan (Fungsi AVG)
SELECT AVG(Nilai_Angka) 'Rata-rata Nilai' FROM Nilai;

-- Percobaan 9 (Fungsi SUM)
SELECT SUM(Nilai_Angka) 'Total Nilai' FROM Nilai;

-- Perrcobaan 10 (View)
CREATE VIEW KHS AS SELECT Mahasiswa.NIM, Nilai.Nama_MK, Nilai.Nilai_Angka, Nilai.Nilai_Huruf FROM (Mahasiswa INNER JOIN Nilai ON Mahasiswa.NIM=Nilai.NIM);
SELECT * FROM KHS;
