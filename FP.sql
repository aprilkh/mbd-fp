CREATE DATABASE FP;

CREATE TABLE INSTANSI(
i_id CHAR(3) NOT NULL AUTO_INCREMENT,
i_nama VARCHAR(100),
i_alamat VARCHAR(100),
i_notelp VARCHAR(12),
PRIMARY KEY(i_id)
);

CREATE TABLE PEMINJAM(
 m_id CHAR(3) NOT NULL,
 i_id CHAR(3) NOT NULL,
 m_nama VARCHAR(50),
 m_alamat VARCHAR(100),
 m_nohp NUMERIC(12),
 m_email VARCHAR(100),
 m_jk CHAR(1),
 PRIMARY KEY (m_id),
 FOREIGN KEY(i_id) REFERENCES INSTANSI(i_id)
);

CREATE TABLE PEGAWAI(
 g_id CHAR(3) NOT NULL,
 g_nama VARCHAR(50),
 g_alamat VARCHAR(100),
 g_nohp NUMERIC(12),
 g_tglmasuk DATE,
 g_bagian VARCHAR(20),
 g_jk CHAR(1),
 PRIMARY KEY (g_id)
);

CREATE TABLE ALAT_OR(
 a_id CHAR(3),
 a_nama VARCHAR(50),
 a_merk VARCHAR(20),
 a_hargasewa INT,
 a_stok INT,
 PRIMARY KEY(a_id)
);

CREATE TABLE TRANSAKSI(
t_id CHAR(3) NOT NULL,
g_id CHAR(3) NOT NULL,
t_totalharga INT,
PRIMARY KEY(t_id),
FOREIGN KEY(g_id) REFERENCES PEGAWAI(g_id)
);

CREATE TABLE PENYEWAAN(
s_id CHAR(3) NOT NULL,
a_id CHAR(3) NOT NULL,
m_id CHAR(3) NOT NULL,
t_id CHAR(3) NOT NULL,
s_tglsewa DATE,
s_tglkembali DATE,
s_jumlahsewa INT,
s_statuskembali INT, 
PRIMARY KEY(s_id),
FOREIGN KEY(a_id) REFERENCES ALAT_OR(a_id),
FOREIGN KEY(m_id) REFERENCES PEMINJAM(m_id),
FOREIGN KEY(t_id) REFERENCES TRANSAKSI(t_id)
);

CREATE TABLE denda(
 d_id CHAR(3) NOT NULL,
 t_id CHAR(3) NOT NULL,
 d_namaalat VARCHAR(50),
 d_jumlahrusak INT,
 d_totaldenda INT,
 d_status VARCHAR(20),
 PRIMARY KEY(d_id),
 FOREIGN KEY(t_id) REFERENCES transaksi(t_id)
 );

INSERT INTO PEGAWAI VALUES ('G01','eko baharuddin','Keputih Gg. 2, Surabaya','08977322486',STR_TO_DATE('13-04-2016','%d-%m-%Y'),'karyawan','L');
INSERT INTO PEGAWAI VALUES ('G02','Nabila Mirdad','Perumdos Blok J, Surabaya','081569874562',STR_TO_DATE('13-05-2016','%d-%m-%Y'),'kasir','P');
INSERT INTO PEGAWAI VALUES ('G03','Bambang Syahputra','Jl. Mayjen Sungkono 78-80, Surabaya','087869542356',STR_TO_DATE('15-04-2016','%d-%m-%Y'),'security','L');
INSERT INTO PEGAWAI VALUES ('G04','Rudi Agung Putra','Komplek RMI Blok L35 Ngagel, Surabaya','085732564895',STR_TO_DATE('02-07-2016','%d-%m-%Y'),'cleaning service','L');
INSERT INTO PEGAWAI VALUES ('G05','Kelly Camila','Jl. Hayam Wuruk No 21, Surabaya','081245698523',STR_TO_DATE('20-03-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G06','Reza Ahmad Putra','Jl. Ir. Soekarno No 22, Surabaya','088852642358',STR_TO_DATE('29-08-2016','%d-%m-%Y'),'karyawan','L');
INSERT INTO PEGAWAI VALUES ('G07','Maria Mercedes','Keputih Gg. 1 Blok A-1, Surabaya','088852642358',STR_TO_DATE('23-09-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G08','Stephanie Putri','Keputih Perintis 1, Surabaya','085966354862',STR_TO_DATE('14-05-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G09','Kurnia Putra','Keputih Perintis 2, Surabaya','085788828881',STR_TO_DATE('19-02-2016','%d-%m-%Y'),'cleaning service','L');
INSERT INTO PEGAWAI VALUES ('G10','Kurnia Putri','Keputih Perintis 3, Surabaya','085337937919',STR_TO_DATE('21-04-2016','%d-%m-%Y'),'kasir','P');

INSERT INTO PEGAWAI VALUES ('G11','Sartika Kharisma','Keputih Perintis 4, Surabaya','085537517333',STR_TO_DATE('22-03-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G12','Faris Didin','Keputih Kejawan, Surabaya','085136362788',STR_TO_DATE('21-04-2016','%d-%m-%Y'),'cleaning service','L');
INSERT INTO PEGAWAI VALUES ('G13','Aprilia Khairunnisa','Perumdos Blok U, Surabaya','085692678312',STR_TO_DATE('03-05-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G14','Rizvi Sofbrina','Keputih Gg.3, Surabaya','085198765332',STR_TO_DATE('09-11-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G15','Navinda Meutia','Perumdos Blok T, Surabaya','085987128932',STR_TO_DATE('13-10-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G16','Rifka Annisa','Perumdos Blok E, Surabaya','089712784382',STR_TO_DATE('25-09-2016','%d-%m-%Y'),'cleaning service','P');
INSERT INTO PEGAWAI VALUES ('G17','Fina Fitri','Pakuwon Educity, Surabaya','089852679102',STR_TO_DATE('10-05-2016','%d-%m-%Y'),'security','P');
INSERT INTO PEGAWAI VALUES ('G18','Fadhila','Gebang Gg.2, Surabaya','081290325823',STR_TO_DATE('12-06-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G19','Farida','Keputih Kejawan Gg.4, Surabaya','085280009898',STR_TO_DATE('16-04-2016','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G20','Yasinta','Mulyosari Blok J, Surabaya','081299882020',STR_TO_DATE('07-05-2016','%d-%m-%Y'),'security','P');

INSERT INTO PEGAWAI VALUES ('G21','Rizka Annisa','Jl. Polisi Istimewa No 19, Surabaya','081290305803',STR_TO_DATE('01-04-2017','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G22','Rafiar Rahmansyah','Jl. Klampis Jaya No 7, Surabaya','081291305982',STR_TO_DATE('06-05-2017','%d-%m-%Y'),'karyawan','L');
INSERT INTO PEGAWAI VALUES ('G23','Nafiar Rahmansyah','Jl. Klampis Jaya No 12, Surabaya','089720008432',STR_TO_DATE('01-02-2017','%d-%m-%Y'),'security','L');
INSERT INTO PEGAWAI VALUES ('G24','Nafia R','Perumdos Blok J-45, Surabaya','089760908821',STR_TO_DATE('13-03-2017','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G25','Agatha Putri','Jl. Ketintang No 110, Surabaya','085260979221',STR_TO_DATE('17-08-2017','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G26','Nafingatun Ngaliah','Jl. WR Supratman No 3, Surabaya','085192128477',STR_TO_DATE('11-08-2017','%d-%m-%Y'),'cleaning service','P');
INSERT INTO PEGAWAI VALUES ('G27','Shafira Ramadhani','Jl. Ir. Soekarno No 51, Surabaya','089792127166',STR_TO_DATE('21-04-2017','%d-%m-%Y'),'karyawan','P');
INSERT INTO PEGAWAI VALUES ('G28','Subhan Maulana','Keputih Gg. 1 Blok B-1, Surabaya','085188127865',STR_TO_DATE('24-12-2017','%d-%m-%Y'),'karyawan','L');
INSERT INTO PEGAWAI VALUES ('G29','Brama Diwangkara','Jl. Mayjen Sungkono 90, Surabaya','085390776123',STR_TO_DATE('14-02-2017','%d-%m-%Y'),'security','L');
INSERT INTO PEGAWAI VALUES ('G30','Cynthia Dewi','Jl. Hayam Wuruk No 45, Surabaya','085140060012',STR_TO_DATE('20-04-2017','%d-%m-%Y'),'karyawan','P');

INSERT INTO ALAT_OR VALUES ('A01','Bola Basket','Molten','300000','30');
INSERT INTO ALAT_OR VALUES ('A02','Hockey Stick','Grays','500000','35');
INSERT INTO ALAT_OR VALUES ('A03','Raket Tenis','Wilson','100000','45');
INSERT INTO ALAT_OR VALUES ('A04','Ring Basket','NBA','3000000','33');
INSERT INTO ALAT_OR VALUES ('A05','Sarung Tinju','Kettler','150000','29');
INSERT INTO ALAT_OR VALUES ('A06','Selancar','Tribord','180000','33');
INSERT INTO ALAT_OR VALUES ('A07','Skateboard','Silver Fox','185000','44');
INSERT INTO ALAT_OR VALUES ('A08','Masker Anggar','Strike Wiremesh','210000','20');
INSERT INTO ALAT_OR VALUES ('A09','Perahu Arung Jeram','Bestway','520000','25');
INSERT INTO ALAT_OR VALUES ('A10','Bola Voli','Mikasa','50000','44');

INSERT INTO ALAT_OR VALUES ('A11','Bola Basket','Spalding','350000','50');
INSERT INTO ALAT_OR VALUES ('A12','Bola Kaki','Adidas','45000','55');
INSERT INTO ALAT_OR VALUES ('A13','Bola Voli','Molten','100000','56');
INSERT INTO ALAT_OR VALUES ('A14','Bola Kasti','Tiger','7000','60');
INSERT INTO ALAT_OR VALUES ('A15','Raket Badminton','Yonex','50000','44');
INSERT INTO ALAT_OR VALUES ('A16','Barbel','Neoprene','40000','55');
INSERT INTO ALAT_OR VALUES ('A17','Matras','Glory','20000','67');
INSERT INTO ALAT_OR VALUES ('A18','Bola Golf','Titleist Pro','70000','44');
INSERT INTO ALAT_OR VALUES ('A19','Tenis Meja','Butterfly','2000000','55');
INSERT INTO ALAT_OR VALUES ('A20','Bola Golf','Srixon','45000','66');

INSERT INTO ALAT_OR VALUES ('A21','Sarung Tinju','Everlast','150000','65');
INSERT INTO ALAT_OR VALUES ('A22','Bow Panahan','R50','155000','63');
INSERT INTO ALAT_OR VALUES ('A23','Tolak Peluru','ROX','65000','46');
INSERT INTO ALAT_OR VALUES ('A24','Bola Sepak Takraw','Bola Mas','60000','46');
INSERT INTO ALAT_OR VALUES ('A25','Selancar','Vixion','50000','55');
INSERT INTO ALAT_OR VALUES ('A26','Bantalan Target Panahan','Vision','20000','50');
INSERT INTO ALAT_OR VALUES ('A27','Skateboard','Penny Board','170000','55');
INSERT INTO ALAT_OR VALUES ('A28','Bat Tenis Meja','Donic','55000','67');
INSERT INTO ALAT_OR VALUES ('A29','Anak Panahan','Quiver','35000','44');
INSERT INTO ALAT_OR VALUES ('A30','Bat Tenis Meja','Butterfly','20000','53');

INSERT INTO peminjam VALUES ('M01','I01','Hari Sudirman','Jl. Pondok Maritim II no 5','081324353627','harisud@gmail.com','l');
INSERT INTO peminjam VALUES ('M02','I02','Bondan Prakoso','Jl. Keputih Perintis no 23','081324353627','bondan@gmail.com','l');
INSERT INTO peminjam VALUES ('M03','I03','Subhan Maulana','Jl. Raya Mulyosari no 67','081234567875','subhanz@gmail.com','l');
INSERT INTO peminjam VALUES ('M04','I04','Amanda Lestari','Jl. Kenanga no 23','085343456332','amanda@gmail.com','p');
INSERT INTO peminjam VALUES ('M05','I05','Dilan','Jl. Manyar Selatan 21b','085390323610','dilanku@gmail.com','l');
INSERT INTO peminjam VALUES ('M06','I06','Amelia','Jl. Ciputra 219','085674221627','amelia@gmail.com','p');
INSERT INTO peminjam VALUES ('M07','I07','Brama Setyawan','Jl. Banyu Urip 119','084534447005','brama@gmail.com','l');
INSERT INTO peminjam VALUES ('M08','I08','Kamelia Citrawati','Jl. Mawar Indah no 13','081123456092','kamelia@gmail.com','p');
INSERT INTO peminjam VALUES ('M09','I04','Sulastrini','Jl. Pondok Indah no 1','081646737820','sulastrini@gmail.com','p');
INSERT INTO peminjam VALUES ('M10','I10','Berta Caroline','Jl. Keputih Tegal Timur no 9','089928374011','bertacar@gmail.com','p');
INSERT INTO peminjam VALUES ('M11','I12','Maudy Ayunda','Jl. Raya Gebang no 7','083334590871','maudya@gmail.com','p');
INSERT INTO peminjam VALUES ('M12','I12','Bunga Citra Lestari','Jl. Raya Mulyosari no 93','081239028374','bungacl@gmail.com','p');
INSERT INTO peminjam VALUES ('M13','I14','Adipati Dolken','Jl. Manyar Utara 29','081234324538','adipati@gmail.com','l');
INSERT INTO peminjam VALUES ('M14','I14','Amel Carla','Jl. Garuda 20','081212908783','carla@gmail.com','p');
INSERT INTO peminjam VALUES ('M15','I15','Chico Jerico','Jl. Banyu Manik 8','081090987875','jerico@gmail.com','l');

INSERT INTO peminjam VALUES ('M16','I16','Julian Jacob','Jl. Merdeka no 63','085523566322','julianjac@gmail.com','l');
INSERT INTO peminjam VALUES ('M17','I17','Adinda Thomas','Jl. Keputih Tegal Timur 11','081290327810','thomas@gmail.com','p');
INSERT INTO peminjam VALUES ('M18','I18','Alexa Key','Jl. Ciputra 33','081324221608','keykey@gmail.com','p');
INSERT INTO peminjam VALUES ('M19','I19','Ariel Tatum','Jl. Keputih Perintis 3','081238797005','ariel@gmail.com','l');
INSERT INTO peminjam VALUES ('M20','I20','Abdurrahman Arif','Jl. Mulyorejo no 4','085623456000','arifrahman@gmail.com','l');
INSERT INTO peminjam VALUES ('M21','I21','Adi Bing Slamet','Jl. Pondok Sari no 67','085646780899','slamet@gmail.com','l');
INSERT INTO peminjam VALUES ('M22','I22','Alexander Wiguna Wessels','Jl. Keputih Tegal Timur no 88','089928374445','wessels@gmail.com','l');
INSERT INTO peminjam VALUES ('M23','I22','Dinda Kirana','Jl. Raya Mulyosari no 63','085399028356','kirana@gmail.com','p');
INSERT INTO peminjam VALUES ('M24','I24','Ben Kasyafani','Jl. Manyar Selatan 40','085324324500','kasyafani@gmail.com','l');
INSERT INTO peminjam VALUES ('M25','I25','Christ Laurent','Jl. Merdeka 90','085672905483','christl@gmail.com','l');
INSERT INTO peminjam VALUES ('M26','I27','Tasya Kamila','Jl. Gebang Indah 7','082190984575','kamilatasya@gmail.com','p');
INSERT INTO peminjam VALUES ('M27','I27','Daniel Mananta','Jl. Merdeka no 33','082123784262','daniel@gmail.com','l');
INSERT INTO peminjam VALUES ('M28','I28','Derry Sudarisman','Jl. Arif Rahman Hakim 34','081272905478','derry@gmail.com','l');
INSERT INTO peminjam VALUES ('M29','I29','Edward Gunawan','Jl. Gebang 120','085670984212','gunamaned@gmail.com','l');
INSERT INTO peminjam VALUES ('M30','I30','Hengky Kurniawan','Jl. Merdeka no 54','085673784252','hengkykurkur@gmail.com','l');

INSERT INTO instansi VALUES ('I01','PT. Wahana Optima Permai','Gedung Bumi Mandiri Lantai 5','031545641');
INSERT INTO instansi VALUES ('I02','Alfa Retailindo, PT. Tbk','Jl. Dukuh Kupang 126 Surabaya','0315314018');
INSERT INTO instansi VALUES ('I03','PT. Aktus Sari Murni','Jl. Margomulyo No. 46 Blok I/12 Balongsari Tande Surabaya','0315314017');
INSERT INTO instansi VALUES ('I04','PT. Aneka Jasa Bersama Sejahtera','Jl. Ratna No. 14 Blok F-1 Ngagel Wonokromo Surabaya','0315016573');
INSERT INTO instansi VALUES ('I05','PT. Colliers International','Jl. Jendral Ahmad Yani No. 286 Surabaya','0318289393');
INSERT INTO instansi VALUES ('I06','PT. Dharmala Intiland','Jl. Panglima Jendral Sudirman No. 101-103 Surabaya','0315482722');
INSERT INTO instansi VALUES ('I07','PT. Dian Lestari Perdana','Jl. Embong Malang No. 61-65 Kedungdoro Tegalsari','0315325961');
INSERT INTO instansi VALUES ('I08','PT. Dwi Indah','Jl. Stasiun Kota No. 58 Bongkaran Pabean Cantikan','0313541270');
INSERT INTO instansi VALUES ('I09','PT. Graha Seribusatu Jaya','l. Raya Kendangsari Industri No. 57 Tenggilis','0318474585');
INSERT INTO instansi VALUES ('I10','PT. Graha Vinoti Kreasindo','Mall Galaxy Blok H-2/210-211 Lantai 2','0315937256');
INSERT INTO instansi VALUES ('I11','PT. Harapan Indah Cahaya Timur','Perkantoran Pondok Chandra Indah Blok TD/33','0318666776');
INSERT INTO instansi VALUES ('I12','PT. Imperium Mitra Persada','Jl. Barata Jaya XIX No. 56-A Brata Jaya Gubeng','0315011751');
INSERT INTO instansi VALUES ('I13','PT. Inti Rimba Persada','Ruko Gateway Blok D/43','0318555030');
INSERT INTO instansi VALUES ('I14','PT. Inti Cakrawala Citra','Jl. Jemursari Raya No. 351 Jemur Wonosari Winocolo','0318438444');
INSERT INTO instansi VALUES ('I15','PT. Jayakerta Anugrah Wisesa','Jl. Mastrip Kemlaten No. 46 Kebraon Karangpilang','0317662216');

INSERT INTO instansi VALUES ('I16','PT. Kartika Bhakti Sarinusantara','Jl. Jaksa Agung Suprapto No. 21 Ketabang Genteng','0315317360');
INSERT INTO instansi VALUES ('I17','PT. Karunia Wanaindah Persada','Jl. Ambengan No. 1-A Ketabang Genteng','0315319577');
INSERT INTO instansi VALUES ('I18','PT. Kayu Selasihan Indah','Jl. Kalikepiting No. 135 Pacarkembang Tambaksari','0313894149');
INSERT INTO instansi VALUES ('I19','PT. Kunia Jaya Wira Bhakti','Jl. Raya Tenggilis Mejoyo Kendangsari','0318490105');
INSERT INTO instansi VALUES ('I20','PT. Lion Super Indo','Jl. Rungkut Mapan Utara FA/1','0318704772');
INSERT INTO instansi VALUES ('I21','PT. Mulia Sasmita Bhakti','Gedung Medan Pemuda 6th Floor','0315311949');
INSERT INTO instansi VALUES ('I22','PT. Multi Modern Nusantara','Jl. Muncul No. 10 Gedangan Surabaya','0318544449');
INSERT INTO instansi VALUES ('I23','PT. Nawawindu Agung','Pertokoan Pasifik Megah Blok B-10','0315476293');
INSERT INTO instansi VALUES ('I24','PT. Palunesia Makmur','Jl. Margomulyo No. 61 Balongsari Tandes','0317493032');
INSERT INTO instansi VALUES ('I25','PT. Piranti Permata Nusa','Jl. Mayjen HR Mohammad No. 86-H','0317329057');
INSERT INTO instansi VALUES ('I26','PT. Puri Pariwara','Gedung World Trade Center Lantai 6','0315319312');
INSERT INTO instansi VALUES ('I27','PT. Samakarya Singgasana Jaya','Gedung Graha Pangeran Lantai 7','0318289393');
INSERT INTO instansi VALUES ('I28','PT. Sena Sanjaya Makmur Sejahtera','Jl. Panjang Jiwo Permai III B-12 Panjangjiwo','0318496898');
INSERT INTO instansi VALUES ('I29','PT. Suara Indah Raya','Jl. Tropodo No. II/20 Waru Surabaya','0318671552');
INSERT INTO instansi VALUES ('I30','PT. Suryacitra Adikusuma','Jl. Griyo Kebraon Tengah Blok M/12 Karangpilang','0317662064');

INSERT INTO transaksi VALUES ('T01','G03','700000');
INSERT INTO transaksi VALUES ('T02','G05','450000');
INSERT INTO transaksi VALUES ('T03','G07','3600000');
INSERT INTO transaksi VALUES ('T04','G16','585000');
INSERT INTO transaksi VALUES ('T05','G19','1800000');
INSERT INTO transaksi VALUES ('T06','G28','1040000');
INSERT INTO transaksi VALUES ('T07','G30','5920000');
INSERT INTO transaksi VALUES ('T08','G29','11000000');
INSERT INTO transaksi VALUES ('T09','G01','540000');
INSERT INTO transaksi VALUES ('T10','G03','12240000');
INSERT INTO transaksi VALUES ('T11','G10','140000');
INSERT INTO transaksi VALUES ('T12','G16','700000');
INSERT INTO transaksi VALUES ('T13','G13','5460000');
INSERT INTO transaksi VALUES ('T14','G07','3255000');
INSERT INTO transaksi VALUES ('T15','G02','5400000');

INSERT INTO transaksi VALUES ('T16','G03','240000');
INSERT INTO transaksi VALUES ('T17','G27','84000000');
INSERT INTO transaksi VALUES ('T18','G04','200000');
INSERT INTO transaksi VALUES ('T19','G10','11200000');
INSERT INTO transaksi VALUES ('T20','G14','1250000');
INSERT INTO transaksi VALUES ('T21','G21','12600000');
INSERT INTO transaksi VALUES ('T22','G11','2250000');
INSERT INTO transaksi VALUES ('T23','G22','2025000');
INSERT INTO transaksi VALUES ('T24','G16','4800000');
INSERT INTO transaksi VALUES ('T25','G21','600000');
INSERT INTO transaksi VALUES ('T26','G11','1800000');
INSERT INTO transaksi VALUES ('T27','G16','15600000');
INSERT INTO transaksi VALUES ('T28','G03','2100000');
INSERT INTO transaksi VALUES ('T29','G01','900000');
INSERT INTO transaksi VALUES ('T30','G15','2700000');

INSERT INTO PENYEWAAN VALUES ('S01','A01','M01','T30',STR_TO_DATE('13-04-2017','%d-%m-%Y'),STR_TO_DATE('16-04-2017','%d-%m-%Y'),'3','1');
INSERT INTO PENYEWAAN VALUES ('S02','A06','M02','T29',STR_TO_DATE('14-04-2017','%d-%m-%Y'),STR_TO_DATE('15-04-2017','%d-%m-%Y'),'5','1');
INSERT INTO PENYEWAAN VALUES ('S03','A03','M03','T28',STR_TO_DATE('17-04-2017','%d-%m-%Y'),STR_TO_DATE('20-04-2017','%d-%m-%Y'),'7','1');
INSERT INTO PENYEWAAN VALUES ('S04','A09','M04','T27',STR_TO_DATE('19-04-2017','%d-%m-%Y'),STR_TO_DATE('25-04-2017','%d-%m-%Y'),'5','1');
INSERT INTO PENYEWAAN VALUES ('S05','A01','M05','T26',STR_TO_DATE('22-04-2017','%d-%m-%Y'),STR_TO_DATE('23-04-2017','%d-%m-%Y'),'6','1');
INSERT INTO PENYEWAAN VALUES ('S06','A03','M06','T25',STR_TO_DATE('27-04-2017','%d-%m-%Y'),STR_TO_DATE('30-04-2017','%d-%m-%Y'),'2','1');
INSERT INTO PENYEWAAN VALUES ('S07','A05','M07','T24',STR_TO_DATE('03-05-2017','%d-%m-%Y'),STR_TO_DATE('07-05-2017','%d-%m-%Y'),'12','1');
INSERT INTO PENYEWAAN VALUES ('S08','A12','M08','T23',STR_TO_DATE('09-05-2017','%d-%m-%Y'),STR_TO_DATE('12-05-2017','%d-%m-%Y'),'15','1');
INSERT INTO PENYEWAAN VALUES ('S09','A20','M09','T22',STR_TO_DATE('15-05-2017','%d-%m-%Y'),STR_TO_DATE('20-05-2017','%d-%m-%Y'),'10','1');
INSERT INTO PENYEWAAN VALUES ('S10','A24','M10','T21',STR_TO_DATE('23-05-2017','%d-%m-%Y'),STR_TO_DATE('30-05-2017','%d-%m-%Y'),'30','1');
INSERT INTO PENYEWAAN VALUES ('S11','A10','M11','T20',STR_TO_DATE('05-06-2017','%d-%m-%Y'),STR_TO_DATE('10-06-2017','%d-%m-%Y'),'5','1');
INSERT INTO PENYEWAAN VALUES ('S12','A11','M12','T19',STR_TO_DATE('07-06-2017','%d-%m-%Y'),STR_TO_DATE('11-06-2017','%d-%m-%Y'),'8','1');
INSERT INTO PENYEWAAN VALUES ('S13','A03','M13','T18',STR_TO_DATE('12-06-2017','%d-%m-%Y'),STR_TO_DATE('13-06-2017','%d-%m-%Y'),'2','1');
INSERT INTO PENYEWAAN VALUES ('S14','A04','M14','T17',STR_TO_DATE('15-06-2017','%d-%m-%Y'),STR_TO_DATE('17-06-2017','%d-%m-%Y'),'14','1');
INSERT INTO PENYEWAAN VALUES ('S15','A17','M15','T16',STR_TO_DATE('16-06-2017','%d-%m-%Y'),STR_TO_DATE('20-06-2017','%d-%m-%Y'),'3','1');

INSERT INTO PENYEWAAN VALUES ('S16','A20','M16','T15',STR_TO_DATE('25-06-2017','%d-%m-%Y'),STR_TO_DATE('03-07-2017','%d-%m-%Y'),'15','1');
INSERT INTO PENYEWAAN VALUES ('S17','A22','M17','T14',STR_TO_DATE('05-07-2017','%d-%m-%Y'),STR_TO_DATE('12-07-2017','%d-%m-%Y'),'3','1');
INSERT INTO PENYEWAAN VALUES ('S18','A24','M18','T13',STR_TO_DATE('08-07-2017','%d-%m-%Y'),STR_TO_DATE('15-07-2017','%d-%m-%Y'),'13','1');
INSERT INTO PENYEWAAN VALUES ('S19','A26','M19','T12',STR_TO_DATE('16-07-2017','%d-%m-%Y'),STR_TO_DATE('21-07-2017','%d-%m-%Y'),'7','1');
INSERT INTO PENYEWAAN VALUES ('S20','A29','M20','T11',STR_TO_DATE('25-07-2017','%d-%m-%Y'),STR_TO_DATE('27-07-2017','%d-%m-%Y'),'2','1');
INSERT INTO PENYEWAAN VALUES ('S21','A27','M21','T10',STR_TO_DATE('01-08-2017','%d-%m-%Y'),STR_TO_DATE('07-08-2017','%d-%m-%Y'),'12','1');
INSERT INTO PENYEWAAN VALUES ('S22','A17','M22','T09',STR_TO_DATE('05-08-2017','%d-%m-%Y'),STR_TO_DATE('08-08-2017','%d-%m-%Y'),'9','1');
INSERT INTO PENYEWAAN VALUES ('S23','A02','M23','T08',STR_TO_DATE('09-08-2017','%d-%m-%Y'),STR_TO_DATE('11-08-2017','%d-%m-%Y'),'11','1');
INSERT INTO PENYEWAAN VALUES ('S24','A07','M24','T07',STR_TO_DATE('15-08-2017','%d-%m-%Y'),STR_TO_DATE('17-08-2017','%d-%m-%Y'),'16','1');
INSERT INTO PENYEWAAN VALUES ('S25','A23','M25','T06',STR_TO_DATE('18-08-2017','%d-%m-%Y'),STR_TO_DATE('22-08-2017','%d-%m-%Y'),'4','0');
INSERT INTO PENYEWAAN VALUES ('S26','A15','M26','T05',STR_TO_DATE('21-08-2017','%d-%m-%Y'),STR_TO_DATE('23-08-2017','%d-%m-%Y'),'18','0');
INSERT INTO PENYEWAAN VALUES ('S27','A23','M27','T04',STR_TO_DATE('24-08-2017','%d-%m-%Y'),STR_TO_DATE('27-08-2017','%d-%m-%Y'),'3','0');
INSERT INTO PENYEWAAN VALUES ('S28','A24','M28','T03',STR_TO_DATE('26-08-2017','%d-%m-%Y'),STR_TO_DATE('30-08-2017','%d-%m-%Y'),'15','0');
INSERT INTO PENYEWAAN VALUES ('S29','A12','M29','T02',STR_TO_DATE('02-09-2017','%d-%m-%Y'),STR_TO_DATE('07-09-2017','%d-%m-%Y'),'2','0');
INSERT INTO PENYEWAAN VALUES ('S30','A03','M30','T01',STR_TO_DATE('12-09-2017','%d-%m-%Y'),STR_TO_DATE('13-09-2017','%d-%m-%Y'),'7','0');

INSERT INTO denda VALUES ('D01','T16','Matras','1','10000','LUNAS');
INSERT INTO denda VALUES ('D02','T03','Bola Sepak Takraw','5','150000','BELUM LUNAS');
INSERT INTO denda VALUES ('D03','T01','Raket Tenis','2','100000','BELUM LUNAS');
INSERT INTO denda VALUES ('D04','T15','Bola Golf','4','90000','BELUM LUNAS');
INSERT INTO denda VALUES ('D05','T02','Bola Kaki','1','20000','LUNAS');
INSERT INTO denda VALUES ('D06','T07','Skateboard','8','720000','BELUM LUNAS');
INSERT INTO denda VALUES ('D07','T08','Hockey Stick','3','75000','LUNAS');
INSERT INTO denda VALUES ('D08','T25','Raket Tenis','1','50000','BELUM LUNAS');
INSERT INTO denda VALUES ('D09','T22','Bola Golf','3','105000','BELUM LUNAS');
INSERT INTO denda VALUES ('D10','T02','Bola Kaki','1','28000','LUNAS');
INSERT INTO denda VALUES ('D11','T27','Perahu Arung Jeram','2','520000','BELUM LUNAS');
INSERT INTO denda VALUES ('D12','T12','Bantalan Target Panahan','3','30000','BELUM LUNAS');
INSERT INTO denda VALUES ('D13','T13','Bola Sepak Takraw','6','180000','BELUM LUNAS');
INSERT INTO denda VALUES ('D14','T23','Bola Kaki','1','28000','BELUM LUNAS');
INSERT INTO denda VALUES ('D15','T04','Tolak Peluru','1','38000','LUNAS');
