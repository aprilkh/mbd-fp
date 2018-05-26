-- view
CREATE OR REPLACE VIEW view_april AS
SELECT DISTINCT m.m_nama
FROM peminjam m
WHERE NOT EXISTS (SELECT m2.m_id 
FROM peminjam m2 JOIN penyewaan s2 ON m2.m_id = s2.m_id 
JOIN transaksi t2 ON s2.t_id = t2.t_id JOIN denda d2 ON t2.t_id = d2.d_id
WHERE m.m_id = m2.m_id);

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