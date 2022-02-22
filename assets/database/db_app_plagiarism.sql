-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 03:16 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_app_plagiarism`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `content` longtext NOT NULL,
  `create_by` varchar(50) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `title`, `author`, `filename`, `content`, `create_by`, `create_date`) VALUES
(1, 'Pendeteksi plagiat dengan Rabin Karp', 'Eko Mulya Chandra', 'rabinkarp.pdf', 'asdasd asdadas asdasda sadasdas sdadas', 'ekomulyachandra99@gmail.com', '2021-12-03 09:34:06'),
(2, 'Implementasi algoritma dalam mendeteksi kemiripan ', 'Eko Mulya Chandra', 'Paper.pdf', 'KHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	 \r\n    	98 	 	 \r\nkhazanah	 	\r\ninformatika	 	\r\n \r\n \r\n \r\n \r\n  	Jurnal Ilmu Komputer dan	 Informatika	  	\r\n 	 	\r\nKomparasi	 Kinerja	 Algoritma	 Data	 Mining	 pada	 	\r\nDataset 	Konsumsi Alkohol	 Siswa	 	\r\nNoviyanti Sagala	*, Hendrik	 Tampubolon	 	\r\nDepartemen	 Sistem	 Informasi	 	\r\nUniversitas Kristen Krida	 Wacana	 	\r\nJakarta,	 Indonesia	 	*noviyanti.sagala@ukrida.ac.id	 	  	\r\n 	\r\n1. Pendahuluan	 	 	 	\r\nData  mining  adalah  proses  mengekstrasi  dan 	\r\nmengidentifikasi  pengetahuan  yang  didapatkan  dari \r\nsekumpulan  data  yang  cukup 	besar. 	Salah  satu  teknik 	\r\ndata  mining  adalah  klasifikasi  yang  digunaka	n  untuk 	\r\nmemprediksi  kelas  pada  suatu  label  tertentu.  Model \r\nklasifikasi  yang  dibangun  berdasarkan  data  latih  dan \r\nmenggunakan  model tersebut untuk mengklasifikasian \r\ndata	 uji.	 	\r\nData    mining    telah    menjadi    area    penelitian   	\r\nyang  esensial  dikarenakan  potensin	ya  pada  institusi 	\r\npendidikan[1].  Adapun  beberapa  penelitian  sebelumnya \r\nmenggunakan  data  mining  berfokus  pada  prestasi \r\nakademik	 siswa,	 misalnya	 kelulusan	 atau	 nilai	 akhir	 siswa 	\r\nnamun	 mengetahui	 pola	 perilaku	 siswa	 juga	 bermanfaat 	\r\nuntuk meningkatkan evaluasi	 prestasi akademik siswa [2] 	\r\n[3].	 Pola	 perilaku	 siswa	 mencakup	 perilaku	 di dalam	 dan	 di 	\r\nluar lingkungan sekolah. Salah satunya perilaku 	konsumsi 	\r\nalkohol.	 	\r\nKonsumsi 	alkohol  merupakan  masalah 	kesehatan 	\r\nyang  umum,  terutama  di  kalangan  generasi  muda. \r\nData  yang  didapat  dari 	World 	Health  Organization 	\r\n(WHO)  menunjukan  tingkat  peminum  usia  dini  dan \r\npola	 konsumsi	 alkohol	 meningkat	 71%	 di 73 negara	 [4]. 	\r\nKecanduan  alkohol  dapat  dipengaruhi  beberapa  faktor \r\nseperti	 genetika, lingkungan sosial, dan kesehatan	 mental. 	\r\nKonsumsi	 alkohol	 pada	 usia	 muda	 (pelajar)	 memberikan 	\r\nefek	 jangka	 panjang	 pada	 otak	 dan	 kinerja	 akademik	 siswa. 	\r\nSecara khusus, siswa yang pernah mengkonsumsi	 alkohol	 	\r\nyang	 berlebihan	 cenderung	 mengalami	 kesulitan	 berkaitan 	\r\ndengan	 memori	 otak	 dan	 kemampuan	 untuk	 fokus.	 Efek 	\r\nyang paling berbahaya adalah dapat memicu penggunaan \r\nnarkoba, seperti marijuana, kokain, atau heroin. Di sisi \r\nlain,  ditemukan  bahwa  sekolah  berperan  besar  dalam \r\nmemprediksi	 perilaku	 kon	sumsi	 alkohol	 di kalangan	 siswa 	\r\n[5].	 \r\nPenelitian  tentang  konsumsi  alkohol  pada  siswa 	\r\ntelah	 dilakukan	 dengan	 beberapa	 algoritma	 data	 mining 	\r\ndi antaranya	 penelitian	 yang	 dilakukan	 oleh	 Palaniappan 	\r\n[6],  model  klasifikasi  yang  dikembangkan  dengan \r\nmenggunakan  algoritma  AutoMLP  mencapai  akurasi \r\nlebih  tinggi  yakni  64,54%  jika  dibandingkan  dengan \r\nArtificial	 Neural	 Networks	 (ANN)	 hanya	 61,78%.	 Fabio 	\r\net al., 	menerapkan teknik klasifikasi dan 	clustering 	untu	k 	\r\nprediksi	 konsumsi	 alkohol	 dengan	 membuat	 segmentasi 	\r\ndata  menggunakan  K	-Means  dan  teknik  data  mining 	\r\nseperti  Decision 	Tree, 	SVM,  Bayesian  Network,  dan 	\r\nKNN.	 Hasil	 penelitian	 menunjukkan	 SVM	 lebih	 efisien 	\r\ndaripada	 model	 lainnya	 [7].	 Hariharan	 et al, secara	 khusus 	\r\nmenyebutkan	 bahwa	 faktor	 banyaknya	 waktu	 luang	 setelah 	\r\nsekolah adalah faktor yang paling mempengaruhi seorang \r\nsiswa menjadi pecandu alkohol. Model prediksi dibangun \r\nmenggunakan algoritma 	Random 	Forest 	[8]. 	Tetapi 	belum 	\r\nada	 penelitian	 yang	 melakukan	 komparasi	 kinerja	 algoritma 	\r\nNaïve	 Bayes,	 K-Nearest	 Neighbor	 (KNN),	 Decision	 Tree 	\r\nC5.0,	 dan	 SVM	 sehingga	 belum	 diketahui	 metode	 yang 	\r\npaling	 akurat	 dalam	 membangun	 model	 klasifikasi	 pada 	\r\ndataset	 konsumsi	 alkohol	 pada	 siswa	. 	\r\nAbstrak	-Data mining melakukan proses ekstraksi pengetahuan yang diperoleh dari sekumpulan data dalam jumlah besar. 	\r\nPenelitian	 ini bertujuan	 untuk	 menerapkan	 dan	 melakukan	 analisis	 kinerja	 algoritma	 data	 mining	 untuk	 memprediksi	 konsumsi 	\r\nalkohol	 dan	 menganalisis	 faktor	-faktor	 yang	 terkait	 pada	 siswa	 tingkat	 menengah.	 Adapun	 tahapan	 yang	 dilakukan	 ialah	 pra	- 	\r\nuntuk	 memudahkan	 proses	 klasifikasi.	 Selanjutnya,	 algoritma	 Gain	 Ratio	 dan	 Fast	 Correlation	 Based	 Filter	 (FCBF)	 digunakan 	\r\nuntuk	 memilih	 fitur	-fitur	 yang	 relevan	 dan	 penting	 untuk	 digunakan	 dalam	 tahapan	 klasifikasi.	 Decision	 Tree	 C5.0,	 Support 	\r\nVector	 Machine	 (SVM),	 K-Nearest	 Neighbor	 (KNN),	 dan	 Naive	 Bayes	 (NB)	 dieksekusi	 pada	 kelompok	 fitur	 yang	 terpilih. 	\r\nAkurasi	 model	 yang	 dibangun	 dievaluasi	 menggunakan	 10-fold	 Cross	-Validation	 (CV).	 Hasil	 penelitian	 menunjukkan	 bahwa 	\r\ndari	 Gain	 Ratio.	 Selain	 itu,	 penggunaan	 metode	 pemilihan	 fitur	 mampu	 meningkatkan	 performa	 dari	 seluruh	 klasifier	 secara 	\r\numum. Pengujian lebih lanjut pada data yang sama  maupun berbeda perlu dilakukan  untuk  mendapatkan gambaran lebih \r\nmendalam mengenai kinerja algoritma	-algoritma yang	 digunakan.	 	\r\n \r\nKata kunci: 	Data Mining; 	Kon	sumsi Alkohol Siswa	, Naïve Bayes, 	KNN	, Decision Tree.\r\n\r\nKHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	 	\r\n 	 	\r\nKinerja	 algoritma	 data	 mining	 juga	 dipengaruhi	 oleh	 	\r\natribut	-atribut 	yang digunakan 	pada	 tahap	 klasifikasi.	 	\r\nSemakin	 banyak	 atribut	 yang	 digunakan	 boleh	 jadi	 semakin	 	\r\nmenurunkan	 performa	 metode	 klasifikasi	 jika	 fitur	 yang	 	\r\ndipilih	 memiliki	 kekuatan	 diskriminasi	 kelas	 yang	 buruk	 	\r\n[9].	 Oleh	 karena	 itu,	 pemilihan	 atribut	-atribut	 yang	 paling	 	\r\nrelevan 	dan informatif 	adalah 	hal yang	 penting	 dalam	 	\r\nmeningkatkan 	informasi 	tentang 	proses,	 mengurangi	 biaya	 	\r\ndan 	penyimpanan, 	serta 	meningkatkan	 performa	 algoritma	 	\r\nklasifikasi yang digunakan [10]. 	Pada 	penelitian	 ini,	 2 	\r\nalgoritma 	pemilihan 	fitur 	Filter	-based yaitu 	Gain	 Ratio	 dan	 	\r\nFast	 Correlation	 Based	 Feature	 (FCBF)	 diimplementasikan.	 	\r\nDalam 	penelitian 	ini 	dilakukan	 komparasi	 kinerja	 	\r\nalgoritma	 data	 mining	 untuk	 mengetahui	 metode	 dengan	 	\r\nperforma 	prediksi konsumsi alkohol pada	 siswa	 yang	 	\r\nterbaik 	dan 	faktor	-faktor 	yang	 mempengaruhi	 siswa	 	\r\nkecanduan	 terhadap	 alkohol	 berdasarkan	 model	 data	 yang	 	\r\nada.	 	\r\n 	\r\n2. Landasan	 Teori	 	 	 	\r\na. Decision Tree	 C5.0	 	\r\nAlgoritma decision tree merupakan algoritma	 yang 	\r\npaling sering 	digunakan untuk klasifikasi. Decision	 tree 	\r\nadalah	 sebuah	 diagram	 alir	 yang	 terdiri	 atas	 3 node	 yaitu	 root 	\r\nnode,	 internal	 node,	 dan	 leaf	 node	. Algoritma	 C5.0	 merupakan 	\r\npengembangan	 dari	 algoritma	 C4.5	 di mana	 lebih	 unggul 	\r\ndalam 	kecepatan, 	memori,  dan  efisiensi.  Selain 	itu, 	\r\nalgoritma	 C5.0	 mampu	 menangani	 berbagai	 macam	 tipe 	\r\ndata	 (kontinu,	 kategorikal,	 dan	 timestamps	) dan	 missing	 values 	\r\n[11].	 	\r\nTabel 1. Deskripsi data yang digunakan	 	\r\nDecision	 tree	 dibentuk	 menggunakan	 nilai	 entropy	 dan 	\r\ninformation	 gain	. Entropy	 menyatakan	 impurity	 suatu	 kumpulan 	\r\nobjek 	dengan n 	kelas 	ditunjukkan 	oleh persamaan 	1 dan 	\r\npersamaan 	2 [12].	 	\r\n                                      	 (1) 	\r\n                                	 (2) 	\r\nInformation  gain 	digunakan  untuk  mengukur 	\r\nketidakpastian  dalam  teori  informasi  ditunjukkan  oleh \r\npersamaan 3.	 	 	\r\n                        	  (3)	 	\r\nb. Naïve	 Bayes	 	\r\nNaïve	 Bayes	 adalah	 metode	 data	 mining	 yang	 sederhana	      	 	\r\ndan   	mudah   	untuk   	diimplementasikan 	 dibandingkan	 	\r\nmetode	 yang	 lain	 dalam	 konteks	 klasifikasi.	 Metode	 ini juga	 	Tabel 2. Konversi nilai berdasarkan sistem erasmus (	europe 	system	) 	mampu mengolah data 	numeric 	dan 	teks. 	Theorema	 Bayesian	 	  	 	dijelaskan seperti pada persamaan 4 [13].	 	\r\n                            	 (4) 	\r\nadalah	 probabilitas	 data	 dengan	 vector	 E pada 	\r\nkelas	 H. 	= probabilitas	 awal	 kelas	 H. 	 	\r\n= probabilitas	 independen	 kelas	 H dari	 semua	 fitur	 dalam	 	\r\nvektor E.	 	\r\n 	99 	\r\nAtribut	 	Deskripsi	 	\r\nSex	 	Jenis	 kelamin	 siswa	 (angka	 biner:	 perempuan{0}	 atau 	laki	-laki{1})	 	\r\nAge	 	Usia siswa (numerik: 15	-22)	 	\r\n 	Asal sekolah (binary: Gabriel Pereira or Mounsinho)	 	\r\n 	Daerah tempat tinggal siswa (kota atau desa)	 	\r\n 	Status orang tua (hidup bersama atau terpisah)	 	\r\n 	Pendidikan ibu (numerik: 0 ke 4.a)	 	\r\n 	Pendidikan ayah (numerik: 0 ke 4.a)	 	\r\n 	Pekerjaan ibu (nominal b.)	 	\r\n 	Pekerjaan ayah (nominal b.)	 	\r\n 	Wali (nominal: ibu, ayah atau lainnya)	 	\r\n 	Jumlah keluarga(biner: <=3 atau > 3)	 	\r\n 	Kualitas hubungan keluarga (numerik: 1sampai 5)	 	\r\n 	reputasi sekolah, preferensi kursus atau lainnya)	 	\r\n 	Waktu	 perjalanan	 pulang	 ke rumah	 (numerik:	 1sampai 	5 ) 	\r\n 	Waktu belajar mingguan (numerik: 1 sampai 5)	 	\r\n 	Jumlah	 kelas	 sebelumnya	 yang	 tidak	 lulus	 (numerik:	 n 	jika 1 <=n<3, else	 4) 	\r\n 	Dukungan pendidikan ekstra dari sekolah (ya atau tidak)	 	\r\n 	Dukungan pendidikan ekstra dari keluarga (ya atau tidak)	 	\r\n 	Aktivitas ekstra	-kurikuler (ya atau tidak)	 	\r\n 	Kelas ekstra berbayar (ya atau tidak)	 	\r\n 	Akses Internet di rumah (ya atau tidak)	 	\r\n 	Nursery school (ya atau tidak)	 	\r\n 	atau tidak)	 	 	Memiliki hubungan romantis (ya atau tidak)	 	\r\n 	Waktu luang setelah (numerik: 1 sampai 5)	 	\r\n 	Bergaul dan pergi bermain dengan teman	-teman 	(numerik: 1 sampai 5)	 	\r\n 	Komsumsi	 alkohol	 di akhir	 pekan	 (numerik:	 1 sampai 	5) 	\r\n 	Komsumsi alkohol di hari kerja(numerik: 1 sampai 5)	 	\r\n 	Kondisi kesehatan (numerik: 1	- sangat buruk sampai 	5-sangat baik)	 	\r\n 	Jumlah ketidakhadiran disekolah (numerik: 0 sampai 93)	 	\r\nG1 	Nilai periode pertama (numerik: 0 sampai 20)	 	\r\nG2 	Nilai periode kedua (numerik: 0 sampai 20)	 	\r\nG3 	Nilai periode ketiga(numerik: 0 sampai 20)	 	\r\n \r\n 	Range Score	 	Conversion	 	\r\nI (Very good)	 	16-20 	 	\r\n 	14-15 	 	\r\nIII (Satisfactory)	 	12-13 	 	\r\nIV (Sufficient)	 	10-11 	 	\r\nV (Fail)	 	0-9\r\n\r\nKHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	 	\r\n 	 \r\nc. 	K-Nearest 	Neighbor	 (KNN)	 	\r\nKNN	 bekerja	 secara	 sederhana	 dimana	 menyimpan 	\r\nseluruh	 kasus	 yang	 ada	 dan	 mengklasifikasikan	 kasus	-kasus 	\r\nbaru berdasarkan kemiripan (fungsi  jarak). Kasus baru \r\ndiklasifikasikan	 berdasarkan	 jarak	 data	 baru	 ke beberapa 	\r\ndata/tetangga	 terdekat.	 Menghitung	 jarak	 menggunakan 	\r\nfungsi 	Euclidean Distance	 [14].	 	\r\n 	\r\n                                	 (5)	 	\r\n=data	 latih,	 	=data	 uji,	 = variable	 data,	 = dimensi 	\r\ndata	 	\r\n \r\nd. Support Vector Machine	 (SVM)	 	\r\nSVM merupakan salah satu algoritma 	machine learning 	\r\nyang	 paling	 popular	 dan	 efektif	 digunakan	 pada	 klasifikasi 	\r\ndan	 pengenalan	 citra.	 Prinsip	 kerja	 SVM	 adalah	 mencari 	\r\nruang	 pemisah	 yang	 paling	 optimal	 dari	 suatu	 data	 dalam 	\r\nkelas	 yang	 berbeda.	 Performa	 SVM	 sangat	 dipengaruhi 	\r\noleh	 fungsi	 kernel	 dan	 parameter	 yang	 digunakan.	 Pada 	\r\npenelitian ini digunakan kernel 	RBF (Radial Basis Function) 	\r\nkarena mempunyai performa yang baik dengan kesalahan \r\npelatihan yang minimum	 [15].	 	\r\n \r\n3. Metode	 	 	 	\r\na. Dataset	 	\r\nData	 yang	 digunakan	 dalam	 penelitian	 ini diambil	 dari 	\r\nUCI	 Machine	 Learning	 dengan	 1024	 data	 dan	 33 atribut 	\r\n[16].	 	\r\n Tabel 1.	 	\r\n \r\nb. Metodologi	 	\r\nPada 	penelitian ini, model prediksi komsumsi 	alkohol 	\r\nsiswa  dibangun  dalam  beberapa  tahapan,  yakni  pra	- 	\r\nproses	 data,	 seleksi	 fitur,	 membangun	 model	 klasifikasi, 	\r\nserta  evaluasi  model.  Keseluruhan  tahapan  dilakukan \r\nmenggunakan	 R Programming	 dan	 RStudio	 (IDE).	 	\r\nMetode	 yang	 diusulkan	 dalam	 studi	 ini dapat	 dilihat	 	\r\npada Gambar 1.	 	 	\r\nGambar 1. Metodologi yang diusulkan	 	\r\n 	\r\nPra	-pemrosesan  data  adalah  tahapan  yang 	\r\nmembutuhkan  waktu  yang  lebih  lama  dibandingkan \r\ntahapan	 yang	 lainnya,	 dikarenakan	 data	 diolah	 agar dapat 	\r\nmemenuhi  kebutuhan  dari  inputan  data  pada  setiap \r\nalgoritma	 data	 mining	 yang	 diusulkan.	 	\r\nTahapan 	pertama ialah 	data	-cleaning 	yang dilakukan 	\r\nuntuk  memeriksa  dan  mengisi  data  yang  hilang  serta \r\nmenangani  data  yang  tidak  konsisten.  Setelah  tahapan \r\ndata	-cleaning	 selesai	 dan	 diasumsikan	 bahwa	 atribut	 sudah 	\r\ndapat	 diakses	 sebagai	 kolom,	 tranformasi	 data	 dilakukan, 	\r\ndi  antaranya  atribut  konsumsi  alkohol  di  hari  kerja \r\n(Dalc),	 konsumsi	 alkohol	 di akhir	 pekan	 (Walc),	 jumlah 	\r\nketidakhadiran  (Absence),  dan  nila	i  periode  pertama 	\r\nsampai	 periode	 ketiga(G1	-G3).	 Kemudian,	 target	 atribut 	\r\n(Alc)  dirumuskan  menggunakan  persamaan  (6)  [6]. \r\nSelanjutnya, atribut “	Absence	” dimodifikasikan ke dalam 	\r\nnilai	 biner,	 di mana	 absence	 dirumuskan	 dengan	 persamaan	 	\r\n(7) dan dengan  mengasumsikan bahwa semakin tinggi 	\r\njumlah  ketidakhadiran  maka  semakin  tinggi  obsesi \r\nuntuk	 meminum	 alkohol.	 Selain	 itu,	 atribut	 G1,	 G2,	 G3 	\r\ndiklasifikasikan ke dalam 5  level  sesuai dengan sistem \r\nkonversi	 nilai	 dari	 Erasmus	 sebagaimana	 dapat	 dilihat	 pada 	\r\ntabel 2. Selanjutnya, atribut numerik	 ditransformasikan 	\r\nmenjadi	 kategorikal,	 di mana	 transformasi	 ini	 dilakukan 	\r\nsecara otomatis dengan pemrograman	 R. 	\r\n 	\r\n                                   	 (6)	 	\r\n                     	 (7)	 	\r\nSeleksi fitur terdiri da	ri dua 	tahap. 	Pertama,	 seleksi 	\r\nfitur  yang  digunakan  untuk  pelatihan  dan  pengujian. \r\nKedua,  penilaian  kemampuan  metode  pemilihan  fitur \r\nmenggunakan pengklasifikasian yang berbeda.	 Metode 	\r\nberbasis  filter  kemudian  didemonstrasikan  di  mana \r\nmetode	 ini	 tidak	 memerlukan	 eksekusi	 ulang	 (re-execution	) 	\r\nuntuk algoritma penambangan data yang berbeda,	 serta 	\r\nmemerlukan	 waktu	 yang	 lebih	 sedikit.	 Metode	 berbasis 	\r\nfilter  ini  menerapkan  beberapa  pemeringkatan  (	ranking	) 	\r\natas	 atribut	-atribut	 yang	 ada,	 yang	 artinya	 seberapa	 penting 	\r\nsetiap	 fitur	 tersebut	 untuk	 proses	 klasifikasi.	 	\r\nPada 	penelitian  ini,  dua  algoritma  berbasis 	filter 	\r\ndiaplikasikan,  yakni  FCBF  menggunakan  pendekatan \r\nmultivariate 	dan Gain Ratio menggunakan pendekatan 	\r\nunivariate	.  Fitur	-fitur  diberi  peringkat  sesuai  dengan 	\r\nrelevansinya 	terhadap  target 	variabel. 	Pada 	algoritma 	\r\nGain	 Ratio,	 batas	 ambang	 (threshold	) didefinisikan	 dengan 	\r\nmemilih  fitur	-fitur  terbaik  dengan  urutan  5,10,15,20, 	\r\n25,30,  dan  31  [17].  Kumpulan  fitur  tersebut 	kemudian 	\r\ndigunakan  sebagai  data  masukan  (input)  pada  fase \r\nklasifikasi. 	Fase 	terakhir  adalah  klasifikasi  dengan  tujuan 	\r\nuntuk	 memprediksi	 kelas	 dari	 target	 secara	 akurat	 untuk 	\r\nsetiap kasus dalam	 data.	 	\r\nTahapan 	klasifikasi  terdiri  dari  dua  langkah  yakni 	\r\nmembangun	 model	 dan	 menggunakan	 model	 yang	 sudah 	\r\ndibangun.	 Pada	 proses	 membangun	 model,	 kuantitas	 dari 	\r\nproses	 pengujian	 dan	 pelatihan	 diatur	 menggunakan	 cross	- 	\r\nvalidation	. Setelah	 itu,	 Naive	 Bayes,	 Decision	 Tree	 C5.0, 	\r\nKNN, 	dan  SVM  diaplikasikan  dan  dibandingkan  pada 	\r\nsekumpulan	 data	 yang	 berisi	 fitur	-fitur	 terpilih.	 Akan	 tetapi, 	\r\nparameter	-parameter	 terkait	 tidak	 dirinci	 secara	 spesifik 	\r\nsebelumnya  melainkan  menjalankan  lansung  model yang \r\nada	 di library	 caret	 yang	 tersedia	 pada	 R Programming.\r\n\r\nKHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	 	\r\n 	 	\r\nTabel 3. Hasil algoritma FCBF	 	 	\r\nAtribut	 	Information gain	 	\r\nSex	 	0.03	 	\r\nGoout	 	0.018	 	\r\nG1	 	0.014	 	\r\nAbsences	 	0.0076	 	\r\nTabel	 4. Hasil	 akurasi	 tertinggi	 dari	 masing	-masing	 algoritma	 	 	\r\nModel	 	Akurasi	 	\r\nNaive Bayes	 	1 	\r\nKNN	 	0.883	 	\r\nC5.0	 	0.876	 	\r\nSVM	 	0.893	 	\r\nTabel 5. Akurasi dari model klasifikasi dengan gain ratio	 	 	\r\nJumlah Atribut	 	Model	 	Akurasi	 	\r\n5 	Naive Bayes	 	1 	\r\n15 	KNN	 	0.9126	 	\r\n30 	C5.0	 	0.9047	 	\r\n31 	SVM	 	0.893	 	\r\nPada	 model	 KNN	 yang	 mana	 memiliki	 keunggulan 	\r\npada kepraktisannya dan sederhana, nilai 	k yang	 optimum 	\r\nditentukan	 menggunakan	 k-fold	 cross	 validation	 kemudian 	\r\nmenggunakan  nilai  tersebut  untuk  membangun  model \r\nprediksi.  Metrik  jarak  yang  digunakan  pada  algoritma \r\nini  adalah 	Euclidean  Distance	.  Model  SVM  dibangun 	\r\nmenggunakan kernel 	Radial Basic Function 	(RBF). Nilai 	\r\nparameter	 Cost	 (	  dan gamma (	  dipilih	 dengan 	\r\nkombinasi	 terbaik	 dari	 kedua	 parameter	 tersebut	 di mana 	\r\nnilainya  ditentukan  menggunakan 	cross  validation	.  Oleh 	\r\nkarena  itu,  nilai  dari	 dan  perlu  dirinci  dengan	 tepat, 	\r\nyakni	 	dan 	 	\r\n. Semakin	 besar	 rentang	 nilai	 pada	 Cost	 dan 	\r\nGamma,	 semakin	 lama	 waktu	 komputasi	 yang	 diperlukan, 	\r\nnamun	 memberikan	 rentang	 nilai	 yang	 terlalu	 kecil	 juga 	\r\nberakibat	 pada	 hasil	 yang	 tidak	 bisa	 diterima	 [18].	 	\r\nSetelah  model  klasifikasi  prediktif  selesai  dibangun, 	\r\ndilakukan	 evaluasi	 kinerja	 dari	 model	 tersebut.	 Keakuratan 	\r\ndari	 model	 prediksi	 ini kemudian	 diestimasi	 menggunakan 	\r\ndata	 uji.	 Dalam	 tahap	 ini	 estimasi	 tingkat	 akurasi	 model 	\r\ndilakukan  dengan  menggunakan  metode 	10-fold  cross 	\r\nvalidation.	 Metode ini membagi data ke dalam	 sepuluh 	\r\npartisi	 (fold	) dari	 total	 data	 kemudian	 diambil	 satu	 fold	 untuk 	\r\ndigunakan	 sebagai	 data	 uji dan	 kumpulan	 dari	 fold	 lainnya 	\r\nsebagai	 data	 latih,	 proses	 ini	 berlangsung	 selama	 sepuluh 	\r\nkali	 dan	 fold	 data	 uji yang	 digunakan	 berbeda	 setiap	 kalinya. 	\r\nLalu	 rata	 rata	 dari	 pengujian	 ini	 menjadi	 nilai	 akurasi	 dari 	\r\nmodel.	 	\r\n 	\r\n4. Hasil dan	 Pembahasan	 	 	 	\r\nHasil	 dari	 tahapan	 data	 cleaning	 adalah	 tidak	 ditemukan 	\r\ndata	 yang	 hilang,	 kosong,	 serta	 data	 yang	 tidak	 konsisten.	 	\r\nKemudian hasil dari tahapan lainnya akan	 didiskusikan 	\r\npada	 bagian	 sub	 bab	 berikut,	 yakni:	 hasil	 dari	 teknik	 seleksi 	\r\nfitur	 dan	 penerapan	 algoritma	 data	 mining.	 	\r\n 	\r\na. Hasil 	Teknik 	Seleksi Fitur	 	\r\nHasil  seleksi  fitur  pada  algoritma  FCBF  dengan 	\r\nmenggunakan	 kumpulan	 fitur	 yang	 lengkap	 dapat	 dilihat 	\r\npada 	Tabel	 3. 	\r\nTabel 	3  mendeskripsikan  atribut  dengan 	skor 	\r\ninformation	 gain	 lebih	 tinggi	 memiliki	 pengaruh	 yang	 lebih 	\r\nkuat	 dalam	 pengklasifikasian	 data.	 Atribut	 jenis	 kelamin 	\r\nternyata  merupakan  atribut  yang  sangat  berpengaruh \r\ndalam  menentukan  apakah  seorang  siswa  terindikasi \r\nmenjadi	 peminum	 atau	 tidak.	 Hal	 ini diperkuat	 dari	 laporan 	\r\ntentang	 status	 global	 alkohol	 2014	 yang	 diterbitkan	 oleh 	\r\nWHO  yang  merepresentasikan  bahwa  peminum  laki	- 	\r\nlaki  lebih  besar  dari  peminum  perempuan. 	Perbedaan 	\r\ninformation	 gain	 dari	 atribut	 Goout	 dan	 G1	 ialah	 0.004	 yang 	\r\nberarti	 frekuensi	 bepergian	 (going	 out	) dan	 nilai	 periode 	\r\npertama	 (G1)	 tidak	 terlalu	 jauh	 berbeda.	 Selain	 itu,	 tingkat 	\r\nketidakhadiran (	absence	) siswa yang semakin tinggi akan 	\r\nberakibat	 semakin	 besar	 pula	 peluang	 untuk	 siswa	 menjadi 	\r\npecandu	 alkohol.	 	\r\nSelanjutnya, Gain Ratio di implementasikan untuk 	\r\nmemberi	 peringkat	 pada	 fitur	 sesuai	 dengan	 relev	ansinya 	\r\nterhadap  label.  Hasil  dari  Gain  Ratio  diurutkan  sesuai \r\ndengan	 tingkatan	 pengaruh	 terbesar	 dari	 atribut	 terhadap 	\r\nlabel,	 yakni;	 sex,	 goout,	 studytime,	 absences,	 freetime,	 G1,	 G2,	 G3, 	\r\nhigher, reason, school, address, 	Fjob, 	guardian, famsize, schoolsup, 	\r\nnuersery, famsup, 	Mjob, 	Pstatus, paid, romantic,  internet, activities, 	\r\nage,	 Medu,	 Fedu,	 traveltime,	 failures,	 famrel,	 health	. Dari	 hasil 	\r\ntersebut	 kemudian	 digunakan	 5, 10,	 15,	 20,	 25,	 30 atribut 	\r\ntertinggi dalam proses	 klasifikasi.	 	\r\nHasil Gain Ratio dengan menggunakan dua atribut 	\r\npertama	 yang	 paling	 penting	 yakni	 sex,	 goout,	 memberikan 	\r\nhasil	 yang	 sama	 pada	 FCBF.	 Hal	 ini	 menunjukkan	 bahwa 	\r\njenis kelamin dan frekuensi bepergian memiliki pengaruh \r\nyang  lebih  besar  untuk  menentukan  siswa  tersebut \r\npeminum	 atau	 tidak	 daripada	 atribut	 yang	 lainnya.	 Namun 	\r\nberbeda	 dengan	 hasil	 Gain	 Ratio	 dan	 FCBF	 pada	 atribut 	\r\nG1  di  mana  Gain  Ratio  memiliki  pengaruh  yang  lebih \r\nbesar	 pada	 siswa	 dibandingkan	 atribut	 Studytime	. 	\r\nKemudian  seluruh  algoritma  klasifikasi  yang 	\r\ndiimplentasikan	 pada	 sekumpulan	 fitur	 terpilih	 hasil	 dari 	\r\nalgoritma	 pemilihan	 fitur	 dan	 kinerja	 algoritma	 dihitung 	\r\npada  data  uji,  hasilnya  kemudian  digunakan  untuk \r\nmenganalisis	 kemampuan	 dari	 masing	-ma	sing	 model.	 	\r\n 	\r\nb. Hasil Algoritma	 Klasifikasi	 	\r\nHasil algoritma klasifikasi pada seluruh fitur (31	 fitur 	\r\ndapat	 dilihat	 pada	 tabel	 4. Model	 NB	 mengungguli	 model 	\r\nlainnya	 dengan	 rata	-rata	 akurasi	 100%	 diikuti	 model	 SVM, 	\r\nsedangkan model yang dibangun menggunakan algoritma \r\nDecision	 Tree	 C5.0	 menghasilkan	 akurasi	 terendah.	 	\r\nHasil	 akurasi	 keempat	 classifier	 yang	 diimplementasikan 	\r\npada  fitur  terpilih  hasil  algoritma  FCBF  menunjukkan \r\nalgoritma	 C5.0,	 NB	 dan	 SVM	 mencapai	 akurasi	 tertinggi 	\r\npada  89.23%, tetapi  algoritma  KNN  mencapai  akurasi \r\n91.30%.  KNN  berhasil  mengungguli  model  lainnya \r\ndengan	 4 fitur	 terbaik	 hasil	 FCBF	 pada	 nilai	 k=7.	 	\r\nKomparasi	 Kinerja	 Algoritma...	 	101\r\n\r\nKHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	 	\r\n 	 	\r\nPerforma  algoritma  C5.0,  SVM, 	KNN, 	dan  NB 	\r\npada  hasil  fitur  terpilih  Gain  Ratio  sangat  bervariasi. \r\nAkurasi  tertinggi  dari  setiap  model  dapat  dilihat  pada \r\ntabel  5  pada  setiap  jumlah  atribut  yang  digunakan. \r\nAlgoritma  C5.0  menghasilkan  akurasi  tertinggi  (90.47%) \r\nketika  menggunakan  top	-30 	fitur.	 Algoritma  SVM 	\r\nmempertahankan	 hasil	 akurasi	 yang	 sama	 dengan	 hasil	 saat 	\r\nmenggunakan	 fitur	-fitur	 hasil	 FCBF	 yakni	 89.32%	 dengan 	\r\nnilai parameter   	  dan 	. SVM 	juga 	\r\nmemberikan hasil yang konsisten ketika menggunakan \r\nfitur	 top	-5. Pada	 model	 KNN,	 akurasi	 meningkat	 setelah 	\r\nmenggunakan	 fitur	 top	-15.	 Di sisi	 lain,	 model	 NB	 berhasil 	\r\nmencapai akurasi 100% pada saat menggunakan 	top	-5 	\r\nfitur,	 yang	 berarti	 model	 NB	 mengungguli	 model	 lainnya 	\r\nhanya dengan menggunakan 5	 fitur.	 	\r\nBeberapa penelitian terdahulu	 menggunakan	 dataset	 	\r\nyang	 sama	 menunjukkan	 hasil	 yang	 berbeda	 dengan	 	\r\npenelitian	 ini	 dikarenakan	 penelitian	 ini menggunakan	 pra	- 	\r\npemrosesan	 data	 dan	 algoritma	 seleksi	 fitur	 yang	 berbeda.	 	\r\nEksperimen	 oleh	 Fabio	 Mat	 dan	 M.	 Amran	 [19]	 	\r\nmenggunakan Decision 	Tree 	di KNIME	 Tool 	memberikan	 	\r\nakurasi	 92%.	 Selain	 itu,	 atribut	 siswa	 laki	-laki	 dan	 frekuensi	 	\r\nbepergian	 merupakan	 2 atribut	 yang	 paling	 berpengaruh	 	\r\ndalam memprediksi siswa yang	 kecanduan	 terhadap	 	\r\nalkohol.	 Hasil	 ini serupa	 dengan	 hasil	 yang	 didapatkan	 dari	 	\r\npenelitian yang dilakukan 	penulis.	 Improvisasi	 dilakukan	 	\r\ndi mana	 metode	 yang	 diajukan	 menggunakan	 kombinasi	 	\r\nantara	 algoritma	 K-Means	 Clustering	 dan	 Decision	 Tree,	 	\r\nBayesian Network, 	KNN, 	serta SVM.	 Algoritma	 SVM	 	\r\nmengungguli performa algoritma yang lain	 dengan	 precision	 	\r\ndan	 recall	 yang	 sama	 yaitu	 98%.	 Pada	 penelitian	 ini	 tidak	 	\r\ndiimplementasikan metode pemilihan	 atribut.	 Kinerja	 	\r\nalgoritma	 AutoMLP	 dan	 standar	 MLP	 dibandingkan	 dan	 	\r\nmodel klasifikasi yang dibangun	 menggunakan	 AutoMLP	 	\r\nmencapai  akurasi  yang  lebih  baik  dengan 	 64.54%.	 	\r\nEksperimen	 dilakukan	 pada	 RapidMiner	 Tool	 dan	 tidak	 	\r\nmenggunakan metode pemilihan fitur [6].	 	\r\nPerforma	 Naïve	 Bayes	 juga	 mengungguli	 algoritma 	\r\nKNN,	 J48,	 ANN,	 dan	 ZeroR	 pada	 dataset	 diabetes	 [20]. 	\r\nAlgoritma  Naïve  Bayes  juga  mencapai  nilai  akurasi, \r\npresisi,	 dan	 recall	 terbaik	 dibandingkan	 Decision	 Tree	 dan 	\r\nk-Nearest	 neighbor	 untuk	 mencari	 design	 alternative	 pada 	\r\nalat	 simulasi	 energi	 [21].	 Penelitian	 lainnya	 pada	 referensi	 	\r\n[22]	 – [24]	 juga	 menunjukkan	 hasil	 yang	 sama	 ketika	 	\r\nperforma Naïve Bayes dan Decision 	Tree	 dibandingkan.	 	\r\nNaïve  Bayes  menghasilkan  performa  yang  baik 	\r\ndikarenakan  kemampuan  algoritma  tidak  hanya \r\nmenangani	 atribut	-atribut	 yang	 saling	 memiliki	 keterkaitan 	\r\natau	 tidak	 memiliki	 keterkaitan	 apapun	 saat	 mengolah	 data 	\r\ndari	 domain	 yang	 bervariasi.	 Saat	 diimplementasikan	 pada 	\r\nkasus	 klasifikasi,	 kombinasi	 dari	 keseluruhan	 relasi	 atribut	- 	\r\natribut	 dalam	 kelas	 tertentu	 akan	 mempengaruhi	 bahkan 	\r\nmenghilangkan  relasi  antar  dua  atribut  dan  tidak  akan \r\nmempengaruhi  klasifikasi.  Distribusi  keseluruhan  relasi \r\natribut	-atribut pada kelas tertentu yang  mempengaruhi 	\r\nklasifikasi  Naïve  Bayes  tidak  hanya  relasi  atau \r\nketergantungan	 antar	 dua	 atribut	 yang	 berbed	a [25]	-[26].	 	\r\nDalam	 penelitian	 ini,	 sama	 halnya	 dengan	 penelitian 	\r\nsebelumnya,  ditemukan  bahwa  model  klasifikasi  yang \r\ndibangun  menggunakan  algoritma  Naïve  Bayes  (NB) \r\nadalah	 model	 yang	 terbaik	 dibandingkan	 dengan	 model 	\r\nlainnya  walaupun  menggunakan  teknik  seleksi  fitur yang \r\nberbeda.	 	\r\n5. Kesimpulan	 	 	 	\r\nPada 	penelitian  ini,  beberapa  teknik  klasifikasi 	\r\nditerapkan  pada  data  konsumsi  alkohol  siswa. 	Variasi 	\r\nalgoritma klasifikasi yang diterapkan adalah Naïve	 Bayes, 	\r\nDecision 	Tree 	C5.	0, 	KNN, 	dan  SVM. 	Penentuan 	fitur	- 	\r\nfitur	 relevan	 dan	 penting	 dicapai	 dengan	 algoritma	 Gain 	\r\nRatio  dan 	FCBF. 	Pemilihan  fitur  ini  bertujuan  untuk 	\r\nmengetahui  faktor	-faktor  yang  paling  berpengaruh 	\r\nterhadap  konsumsi  alkohol  pada  siswa.  Model  klasifikasi \r\nyang	 paling	 efisien	 dikelola	 dengan	 membandingkan	 rata	- 	\r\nrata	 akurasi	 menggunakan	 10-fold	 cross	 validation	. Secara 	\r\numum,	 kinerja	 classifier	 menggunakan	 pemilihan	 fitur	 lebih 	\r\nbaik	 daripada	 menggunakan	 seluruh	 fitur.	 Namun,	 Naive 	\r\nBayes	 dengan	 5 fitur	 terbaik	 hasil	 Gain	 Ratio	 menghasilkan 	\r\nkinerja	 terbaik	 dengan	 akurasi	 100%.	 Sementara,	 Decision 	\r\nTree 	C5.0  dengan  fitur  lengkap  menghasilkan  akurasi 	\r\nmodel	 prediksi	 terendah	 di antara	 model	 lainnya.	 Namun, 	\r\nuntuk	 memberikan	 lebih	 banyak	 wawasan	 atau	 gambaran 	\r\nterhadap kiner	ja algoritma klasifikasi  yang digunakan, 	\r\npengujian lebih lanjut pada 	dataset 	yang sama maupun 	\r\nmenggunakan	 dataset	 yang	 berbeda	 perlu	 dilakukan.	 	\r\n \r\n6. Daftar	 Pustaka	 	 	 	\r\n[1] 	R. Sumitha, E. 	S. 	Vinothkumar, and 	P. Scholar, 	\r\n“Prediction  of  Students  Outcome  Using  Data \r\nMining	 Techniques,”	 Int.	 J. Sci.	 Eng.	 Appl.	 Sci.	, vol. 	\r\n2, 	no. 	6, pp. 	132	–139,	 2016.	 	\r\n[2] 	P. Kaur,	 M.	 Singh,	 and	 G. S. Josan,	 “Classification 	\r\nand  Prediction  Based  Data  Mining  Algorithms \r\nto  Predict  Slow  Learners  in  Education  Sector,” \r\nProcedia	 Comput.	 Sci.	, vol.	 57,	 pp.	 500	–508,	 2015.	 	\r\n[3] 	R. Campagni,	 D. Merlini,	 R. Sprugnoli,	 and	 M.	 C. 	\r\nVerri,	 “Data	 Mining	 Models	 for	 Student	 Careers,” 	\r\nExpert	 Sys.	 App.	, vol.	 42,	 no.13,	 pp.	 5508	–5521, 	\r\n2015.	 	\r\n[4] 	W. 	H.  Organisation,  “Global  status  report  on 	\r\nalcohol	 and	 health,”	 World	 Heal.	 Organ.	, pp.	 1–100, 	\r\n2014.	 	\r\n[5] 	S. 	Kairouz and E. M. Adlaf, “Schools, Students 	\r\nand  Heavy  Drinking:  a  Multilevel 	Analysis,” 	\r\nAddict. Res. Theory	, vol. 11, 	no. 	6, pp.	 427	–439, 	\r\n2003.	 	\r\n[6] 	S. 	Palaniappan, 	N. 	A.  Hameed,  A.  Mustapha, 	\r\nand 	N. 	A. Samsudin, “Classification of Alcohol 	\r\nConsumption  among  Secondary  School \r\nStudents,”	 vol.	 1, no.	 4, pp.	 224	–226,	 2017.	 	\r\n[7] 	M.	-P. Fabio, 	D. 	la Hoz	-Manotas Alexis,	 M.	-O. 	\r\nRoberto, M.	-P. Ubaldo, D.	-M. Jorge, and C.	- 	\r\nN. 	Harold,  “Designing  A  Method  for  Alcohol 	\r\nConsumption	 Prediction	 Based	 on Clustering	 and 	\r\nSupport	 Vector	 Machines,”	 Res.	 J. Appl.	 Sci.	 Eng. 	\r\nTechnol.	, vol.	 14,	 no.	 4, pp.	 146	–154,	 2017.	 	\r\n[8] 	B. 	Hariharan,  R.  Krithivasan,  and  A.  Deborah, 	\r\n“Prediction  of  Secondary  School  Students’ \r\nAlcohol	 Addiction	 using	 Random	 Forest,”	 Int.	 J. 	\r\nComput.	 Appl.	, vol.	 149,	 no.	 6, pp.	 975	–8887,	 2016.	 	\r\n[9] 	Syaiful  and  Harianto,  “Pemilihan  Fitur  untuk \r\nMonitoring dan Klasifikasi Kondisi 	Pahat,” 	vol. 	\r\n37, 	no. 	1, pp. 	32–40,	 2016.\r\n\r\nKHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	 	\r\n 	 	\r\n[10]	 	M.	 M.	 Abdul	 Jalil,	 F. Mohd,	 and	 N. M.	 Mohamad 	\r\nNoor,	 “A Comparative	 Study	 to Evaluate	 Filtering 	\r\nMethods  for  Crime  Data  Feature  Selection,” \r\nProcedia	 Comput.	 Sci.	, vol.	 116,	 pp.	 113	–120,	 2017.	 	\r\n[11]	 	R. 	Revathy 	and  R.  Lawrance,  “Comparative 	\r\nAnalysis of C4.5 and C5.0 Algorithms on Crop \r\nPest	 Data,”	 Int.	 J. Innov.	 Res.	 Comput.	 Commun.	 Eng.	, 	\r\nvol. 5, 	no. 	1, pp. 	50–58,	 2017.	 	\r\n[12]	 	J. Han,	 M.	 Kamber,	 and	 J. Pei,	 Data	 Mining	 Concepts 	\r\nand Technique	. 2011.	 	\r\n[13]	 	O. 	Ardhapure, 	G. 	Patil, 	D. 	Udani,  and  K.  Jetha, 	\r\n“Comparative	 Study	 of Classification	 Algorithm 	\r\nfor 	Text 	Based Categorization,” 	Int. 	J. Res.	 Eng. 	\r\nTechnol.	, vol.	 5, no.	 2, pp.	 217	–220,	 2016.	 	\r\n[14]	 	Y. 	Kustiyahningsih, 	D. 	R.  Anamisa,  and 	N. 	\r\nSyafa’ah,  “Sistem  Pendukung  Keputusan  \r\nuntuk  Menentukan  Jurusan  pada  Siswa  SMA \r\nMenggunakan  Metode  KNN  dan 	SMART,” 	\r\nSkripsi,	 Universitas	 Trunojoyo,	 Madura,	 2013.	 	\r\n[15]	 	A.  M.  Puspitasari, 	D. 	E.  Ratnawati,  and  A. 	W. 	\r\nWidodo,  “Klasifikasi  Penyakit  Gigi  Dan  Mulut \r\nMenggunakan	 Metode	 Support	 Vector	 Machine,” 	\r\nPengemb.	 Teknol.	 Inf.	 dan	 Ilmu	 Komput.	, vol.	 2, no.	 2, 	\r\npp. 	802	–810, 2018.	 	\r\n[16]	 	D. 	Dheeru and E. K. Taniskidou, “UCI	 Machine 	\r\nLearning  Repository 	[http://archi	ve.ics.uci.edu/	 	\r\nml].	 Irvine,	 CA:	 University	 of California,	 School 	\r\nof Information and Computer Science,	 2017.	 	\r\n[17]	 	N. Sagala	 and	 J. Wang,	 “A	 Comparative	 Stud	y for 	\r\nClassification  on  Different  Domain,” 	10th Intl. 	\r\nConf.	 on Mach.	 Learn.	 and	 Comp.	, pp.	 1–5, 2018.	 	\r\n[18]	 	S. 	W. 	Lin, K. C. Ying, 	S. C. Chen, and Z. 	J. Lee,	 	\r\n“Particle Swarm Optimization for Parameter	 	\r\n \r\n \r\n 	\r\n? 	Determination  and  Feature  Selection \r\nof Support 	Vector	 Machines,”	 Exp.	 	\r\nSyst.	 Appl.	, vol.	 35,	 no.	 4, 	pp. 	1817	–	\r\n1824, 2008.	 	\r\n[19]	 	F. 	Pagnotta  and  M.  A.  Hossain,  “Using  Data 	\r\nMining  to  Predict  Secondary  School  Student \r\nAlcohol	 Consumption,”	 Dep.	 Comput.	 Sci.	 Univ. 	\r\nCamerino.	, pp. 	1–9, 2016.	 	\r\n[20]	 	A. S. Rani	 and	 S. Jyothi,	 “Performance	 Analysis 	\r\nof  Classification  Algorithms  under  Different \r\nDatasets,”	 3rd	 Intl.	 Conf.	 on Comp.	 for	 Sustainable 	\r\nGlobal	 Dev.	 (INDIACom),	 pp.	 1584	-1589,	 2016.	 	\r\n[21]	 	A. Ashari,	 I. Paryudi,	 and	 A. M.	 Tjoa,	 “Performance 	\r\nComparison	 between	 Naïve	 bayes,	 Decision	 Tree 	\r\nand	 k-Nearest	 neighbor	 in Searching	 Alternative 	\r\nDesign	 in an Energy	 Simulation	 Tool,”	 Intl.	 J. of 	\r\nAdv.	 Comp.	 Science	 and	 App.	, vol	 4, pp 33-39,	 2013.	 	\r\n[22]	 	R.  M.  Rahman  and 	F. 	Afroz,  “Comparison  of 	\r\nVarious 	Classification 	Techniques 	using  Different 	\r\nData  Mining 	Tools 	for  Diabetes  Diagnosis,” 	J. 	\r\nSoftw.	 Eng.	 Appl.	, vol.	 6, no.	 1, pp.	 85	–97,	 2013.	 	\r\n[23]	 	L.  Dan,  L.  Lihua,  Z.  Zhaoxin,  “Research  of \r\nText	 Categorization	 on WEKA,”	 3rd Intl.	 Conf.	 on 	\r\nIntelligent	 Sys.	 Design	 and	 Engi.	 App.	, 2013.	 	\r\n[24]	 	J. Huang, 	J. Lu,  C.  X.  Ling,  “Comparing  Naive 	\r\nBayes, Decision 	Trees, 	and SVM with 	AUC	 and 	\r\nAccuracy,” 	3rd IEEE Int.  Conf.  on  Data  Mining	, 	\r\n2003.	 	\r\n[25]	 	E. Frank,	 L. Trigg,	 G. Holmes,	 and	 I. H. Witten, 	\r\n“Technical  note:  Naive  Bayes  for  Regression,” \r\nMach.	 Learn.	, vol.	 41,	 no.	 1, pp.	 5–25,	 2000.	 	\r\n[26]	 	H.  Zhang,  “The  Optimality  of  Naive 	Bayes,” 	\r\nFlorida	 Artif.	 Intell.	 Res.	 Soc.	 Conf.	, no.	 2, pp.	 1–6, 	\r\n2004.	 	\r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n \r\n 	\r\nKomparasi	 Kinerja	 Algoritma...	 	103\r\n\r\nKHAZANAH	 INFORMATIKA	 |ISSN:	 2621	-038X,	 Online	 ISSN:	 2477	-698X	 	\r\n 	\r\nKETERANGAN :	 	\r\n1.	 Tujuan melakukan \r\npenelitian /kebaruan \r\npenelitian	 	\r\n 	\r\n2.	 Metode yang digunakan 	 	\r\n 	\r\n3.	 Hasil Penelitian 	 	\r\n 	\r\n 	\r\n4.	 Kasus/ Objek', 'ekomulyachandra99@gmail.com', '2021-12-17 08:06:24');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu`, `icon`, `create_date`) VALUES
(6, 'Home', 'fas fa-home', '2021-11-18 07:37:41'),
(7, 'Management', 'fas fa-chalkboard-teacher', '2021-11-11 07:46:45'),
(10, 'Journal ', 'fas fa-book', '2021-11-11 08:03:34'),
(11, 'Plagiarism', 'nav-icon fas fa-spell-check', '2021-12-17 07:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `sub_menu`, `url`, `icon`, `create_date`) VALUES
(8, 7, 'Menu', 'menu', 'fas fa-folder', '2021-11-11 07:47:32'),
(9, 7, 'Sub Menu', 'submenu', 'far fa-folder-open', '2021-11-11 07:48:26'),
(10, 7, 'Users', 'user', 'fas fa-user', '2021-11-11 07:48:57'),
(11, 11, 'Guide', 'guide', 'fab fa-readme', '2021-11-11 08:35:54'),
(12, 11, 'Text', 'text', 'fas fa-font', '2021-11-11 08:36:22'),
(13, 6, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt', '2021-11-18 06:41:40'),
(14, 10, 'Journal\'s', 'journal', 'fas fa-book-open', '2021-12-03 08:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role_id` int(11) NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `create_date`) VALUES
(1, 'Eko Mulya Chandra', 'ekomulyachandra99@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 1, '2021-10-26 11:23:13'),
(5, 'Andi Tanjungg', 'anditanjung@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 2, '2021-10-26 10:14:28'),
(9, 'Mark Zuckemberg', 'mark@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, '2021-11-10 07:26:32'),
(10, 'Rimuru ', 'rimurutempest@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 2, '2021-11-10 08:03:09'),
(11, 'Member 4', 'member3@gmail.com', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 2, '2021-11-10 09:37:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
