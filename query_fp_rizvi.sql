-- 1. View
-- Menampilkan alat yang paling banyak rusak
CREATE OR REPLACE VIEW view_rizvi AS
SELECT DISTINCT a.a_nama, d.d_jumlahrusak, d.d_totaldenda
FROM alat_or a JOIN penyewaan s ON a.a_id = s.a_id
JOIN transaksi t ON s.t_id = t.t_id
JOIN denda d ON t.t_id = d.t_id
ORDER BY d_jumlahrusak DESC
LIMIT 1;

-- 2. TRIGGER
-- Mencatat setiap ada instansi baru (insert)

CREATE TABLE log_instansi(
i_id CHAR(3) NOT NULL,
i_nama VARCHAR(100),
i_alamat VARCHAR(100),
i_notelp VARCHAR(12),
PRIMARY KEY(i_id)
);

ALTER TABLE log_instansi ADD
(
`tgl_perubahan` DATETIME,
`status` VARCHAR(200)
);

DELIMITER$$
CREATE OR REPLACE TRIGGER historis_insert
AFTER INSERT ON instansi
FOR EACH ROW
BEGIN
  INSERT INTO log_instansi VALUES (new.i_id, new.i_nama, new.i_alamat, new.i_notelp, SYSDATE(), 'INSERTED');
END$$
DELIMITER$$

INSERT INTO instansi VALUES ('I31','PT. Kenangan Indah','Jl. kenangan menuju, bahagia','087689785544');

-- 3. FUNCTION
-- Menampilkan total dari alat olahraga tertentu yang dipinjam

DELIMITER $$
CREATE OR REPLACE FUNCTION jmltotal(nama VARCHAR(50))
    RETURNS INT
    DETERMINISTIC
    BEGIN
	DECLARE total INT;
	SELECT SUM(s.s_jumlahsewa) INTO total
	FROM alat_or a JOIN penyewaan s ON a.a_id = s.a_id
	WHERE a.a_nama = nama;
	RETURN total;
    END$$
DELIMITER $$

SELECT DISTINCT jmltotal('Bola Basket') AS Total_Alat FROM alat_or

-- Procedure
-- Menampilkan nama alat yang dipinjam pada instansi tertentu

DELIMITER$$
CREATE OR REPLACE PROCEDURE ins(id INT)
BEGIN
 SELECT DISTINCT i_nama, a_nama, a_merk, s_jumlahsewa, t_totalharga
 FROM alat_or a 
 JOIN penyewaan s ON a.a_id = s.a_id
 JOIN transaksi t ON s.t_id = t.t_id
 JOIN peminjam m ON s.m_id = m.m_id
 JOIN instansi i ON m.i_id = i.i_id
 WHERE id = i.i_id;
END$$

CALL ins('122')

-- index
-- Memberikan index berdasarkan nama instansi

CREATE OR REPLACE INDEX index_instansi ON instansi(i_nama);
SELECT *
FROM instansi
WHERE i_nama = 'PT. Dharmala Intiland';

-- join belum
-- Menampilkan  alat yang belum pernah di sewa

SELECT a.a_id, a.a_nama, a.a_merk
FROM alat_or a
LEFT JOIN penyewaan s ON s.a_id = a.a_id
WHERE s.s_id IS NULL
ORDER BY s.s_id
		
-- cursor belum
-- Menampilkan nama peminjam beserta instansinya
DELIMITER $$
CREATE OR REPLACE PROCEDURE cursor_rizvi(id INT)
BEGIN
SELECT DISTINCT i.i_id, i.i_nama, m.m_id, m.m_nama
FROM instansi i JOIN peminjam m ON(i.i_id = m.i_id)
WHERE id=i.i_id;
END $$
DELIMITER $$

CALL cursor_rizvi ('122');