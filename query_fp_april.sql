-- view
-- menampilkan pemijkam yang belum pernah merusakkan alat or
CREATE OR REPLACE VIEW view_april AS			
SELECT m.m_id, m.m_nama
FROM peminjam m 
LEFT JOIN penyewaan s ON (m.m_id=s.m_id) 
LEFT JOIN denda d ON (s.t_id = d.t_id)
WHERE d.t_id IS NULL;

-- function
-- menampilkan jumlah transaksi yang dilayani oleh pegawai tertentu
DELIMITER $$
CREATE OR REPLACE FUNCTION total_transaksi(id CHAR(3))
    RETURNS INT
    DETERMINISTIC
    BEGIN
	DECLARE total INT;
	SELECT COUNT(t.t_id) INTO total
	FROM transaksi t
	WHERE id=t.g_id;
	RETURN total;
    END$$
DELIMITER $$

SELECT DISTINCT total_transaksi('G02') AS totaltransaksi FROM transaksi

-- procedure
-- Memberikan diskon kepada peminjam yang menyewa lebih dari 5.000.000
DELIMITER $$
CREATE OR REPLACE PROCEDURE potongan(harga_diskon INT)
BEGIN
SELECT t.t_id, m.m_nama, t.t_totalharga, (t.t_totalharga-(t.t_totalharga*0.1)) AS setelah_diskon
FROM transaksi t, peminjam m, penyewaan s
WHERE t.t_totalharga > harga_diskon AND t.t_id =s.t_id AND s.m_id = m.m_id;
END $$
DELIMITER $$

CALL potongan (5000000);

-- index
-- memberikan indeks berdasarkan nama alat olahraga
CREATE OR REPLACE INDEX index_alat ON alat_or(a_id);

-- join
-- Mencari denda terbanyak pada bulan tertentu.
SELECT MAX(d.d_totaldenda)
FROM denda d JOIN penyewaan s ON d.t_id = s.t_id
WHERE EXTRACT(MONTH FROM s.s_tglsewa) = 04; 

-- cursor
-- Menampilkan nama pegawai dan transaksi yang dilakukan
DELIMITER $$
CREATE OR REPLACE PROCEDURE cursorpeg(id CHAR(3))
BEGIN
SELECT g.g_nama, t.t_id
FROM pegawai g, transaksi t
WHERE t.g_id = id AND g.g_id = t.g_id;
END $$
DELIMITER $$
 
CALL cursorpeg ('G01');

-- trigger
-- Mencatat setiap ada update jumlah stok pada tabel alat OR 
-- BELOM
CREATE TABLE trigger_april(
 a_id CHAR(3),
 a_nama VARCHAR(50),
 a_merk VARCHAR(20),
 a_hargasewa INT,
 a_stok INT
 );
 
ALTER TABLE trigger_april ADD(
`tanggal_perubahan` DATETIME,
`status` VARCHAR(30)
);

DELIMITER$$
CREATE TRIGGER tr_april AFTER UPDATE ON alat_or
FOR EACH ROW	
BEGIN
   INSERT INTO trigger_april VALUES (old.a_id, old.a_nama, old.a_merk, old.a_hargasewa, old.a_stok, SYSDATE(), 'UPDATE');
   INSERT INTO trigger_april VALUES (new.a_id, new.a_nama, new.a_merk, new.a_hargasewa, new.a_stok, SYSDATE(), 'UPDATE');
END$$
DELIMITER$$
 
 UPDATE alat_or
 SET a_stok= '49'
 WHERE a_id = 'A11';
