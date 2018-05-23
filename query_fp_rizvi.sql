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
CREATE OR REPLACE FUNCTION jmltotal(id CHAR(3))
    RETURNS INT
    DETERMINISTIC
    BEGIN
	DECLARE total INT;
	SELECT SUM(s.s_jumlahsewa) INTO total
	FROM alat_or a JOIN penyewaan s ON a.a_id = s.a_id
	WHERE id=a.a_id;
	RETURN total;
    END$$
DELIMITER $$

SELECT DISTINCT jmltotal('A03') AS Total_Alat FROM alat_or

-- Procedure
-- Menampilkan nama alat yang dipinjam pada instansi tertentu

DELIMITER$$
CREATE OR REPLACE PROCEDURE ins(id CHAR(3))
BEGIN
 SELECT DISTINCT a_nama, a_merk
 FROM alat_or a JOIN penyewaan s ON a.a_id = s.a_id
 JOIN peminjam m ON s.m_id = m.m_id
 JOIN instansi i ON m.i_id = i.i_id
 WHERE id = i.i_id;
END$$

CALL ins('I02')

-- index
-- Memberikan index berdasarkan nama instansi

CREATE OR REPLACE INDEX index_instansi ON instansi(i_id);
SELECT *
FROM instansi
WHERE i_nama = 'PT. Dharmala Intiland';

-- join belum
-- Menampilkan  alat yang belum pernah di sewa

SELECT a.*
FROM alat_or a
WHERE NOT EXISTS(SELECT a.*
		FROM alat_or a1 JOIN penyewaan s1 ON(a1.a_id=s1.a_id)
		WHERE a.a_id = a1.a_id
		)
SELECT s.*
LEFT OUTER JOIN penyewaan s

		
-- cursor belum
-- Menampilkan nama peminjam beserta instansinya

DELIMITER$$
CREATE OR REPLACE PROCEDURE eksplisit()
BEGIN
 DECLARE id CHAR(10);
 DECLARE kelar INT DEFAULT 0;
 DECLARE excursor CURSOR FOR SELECT id_transaksi FROM transaksi;
 DECLARE CONTINUE HANDLER FOR NOT FOUND SET kelar=1;
 
 OPEN excursor;
REPEAT 
 FETCH excursor INTO id;
 UPDATE transaksi
 SET total_pembayaran = harga_pertiket * jumlah_tiket * 0.9
 WHERE id_transaksi=id AND jumlah_tiket > 10;
 UNTIL kelar END REPEAT;
 CLOSE excursor;
END$$
DELIMITER$$

CALL eksplisit();

SELECT * FROM transaksi WHERE jumlah_tiket > 10;