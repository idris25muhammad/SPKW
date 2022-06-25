-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql-master-vulms
-- Generation Time: Jun 18, 2022 at 08:20 AM
-- Server version: 5.7.37
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vulms-portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` int(11) NOT NULL,
  `vulnapp_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `img_badge` varchar(255) NOT NULL,
  `completed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `vulnapp_id`, `user_id`, `img_badge`, `completed_at`) VALUES
(1, 1, 2, '/img/badge/owasp-api.png', '2022-06-03 06:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `challenges`
--

CREATE TABLE `challenges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vulnapp_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `category_risk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `objektif` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `risk_rating` int(1) NOT NULL,
  `cve_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_pengujian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hint_tooltip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `countermeasure` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flag_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `challenges`
--

INSERT INTO `challenges` (`id`, `title`, `vulnapp_id`, `category_risk`, `objektif`, `description`, `risk_rating`, `cve_id`, `data_pengujian`, `hint_tooltip`, `countermeasure`, `url_target`, `flag_code`) VALUES
(1, 'Fulan\'s private grade', 1, 'API1:2019 Broken Object Level Authorization', 'Dapatkan flag pada data pribadi grade/nilai mahasiswa Fulan', 'API cenderung mengekspos titik akhir yang menangani pengidentifikasi objek, menciptakan masalah Kontrol Akses Level permukaan serangan yang luas. Pemeriksaan otorisasi tingkat objek harus dipertimbangkan dalam setiap fungsi yang mengakses sumber data menggunakan input dari pengguna.', 4, 'CVE-2021-44877', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : 212121 dan password : bob123', '<h6> Tools </h6> Burp Suite / OWASP ZAP\n<br>\n<h6> Hints </h6>\nGo to student\'s page to get Fulan\'s student ID', '- Terapkan pemeriksaan otorisasi dengan kebijakan dan hierarki dari setiap konsumer API. <br>\n- Periksa otorisasi untuk setiap permintaan klien untuk mengakses database. <br>\n- Gunakan UUID agar identifikasi terhadap data user tidak mudah ditebak', 'http://localhost:4040', 'bc50d2a3d99cf9c90c19c574ef5df769'),
(2, 'JWT Confusion Key', 1, 'API2:2019 Broken Authentication', 'Lakukan eksploitasi autentikasi sistem dengan melakukan key confusion attack terhadap JWT', 'Mekanisme otentikasi sering diimplementasikan secara tidak benar, memungkinkan penyerang untuk mengkompromikan token otentikasi atau mengeksploitasi kelemahan implementasi untuk mengasumsikan identitas pengguna lain untuk sementara atau permanen. Mengganggu kemampuan sistem untuk mengidentifikasi klien/pengguna, membahayakan keamanan API secara keseluruhan.', 4, 'CVE-2021-46743', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : 212121 dan password : bob123', 'Burp Suite / OWASP ZAP dan JWTCat / JohnTheRipper', 'Gunakan kata sandi kunci pribadi yang kuat dan sesuai dengan standar keamanan. Sebagai tambahan dalam keamanan JWT, Simpan private key di tempat yang aman dan gunakan hanya algoritma JWT yang diperlukan pada autentikasi', 'http://localhost:4040', '03fcfc46ffc24c90ffa41b83453822a7'),
(3, 'Student\'s PII Leak', 1, 'API3:2019 Excessive Data Exposure', 'Pada tantangan ini, anda akan menemukan flag yang berada pada alamat mahasiswa dengan ID 252525. Alamat ini tidak muncul pada halaman frontend. Selamat mencoba!', 'Menantikan implementasi generik, pengembang cenderung mengekspos semua properti objek tanpa mempertimbangkan sensitivitas masing-masing, mengandalkan klien untuk melakukan pemfilteran data sebelum menampilkannya kepada pengguna.', 5, 'CVE-2019-20360', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : 212121 dan password : bob123', 'Burp Suite / OWASP ZAP', 'Identifikasi data pribadi / sensitive yang tidak seharusnya ditampilkan di respon JSON.', 'http://localhost:4040', '04f6b383091e538c75b02a6e4a171a30'),
(4, 'Unlimited Requests', 1, 'API4:2019 Lack of Resources & Rate Limiting', 'Pada tantangan ini, dapatkan flag dengan mengubah parameter pada endpoint buku untuk menampilkan data sebanyak lebih dari 5000 records', 'Cukup sering, API tidak memberlakukan batasan apa pun pada ukuran atau jumlah sumber daya yang dapat diminta oleh klien/pengguna. Hal ini tidak hanya dapat memengaruhi kinerja server API, yang mengarah ke Denial of Service (DoS), tetapi juga membuka pintu untuk kelemahan otentikasi seperti brute force.', 3, 'CVE-2021-22259', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : bob@hotmail.com dan password : rahasia123', 'Burp Suite / OWASP ZAP', 'Terapkan API rate limiter pada setiap konsumer. Gunakan API key untuk memberikan limit yang dinamis antar user yang memiliki spesifikasi yang berbeda', 'http://localhost:4041', '07176cbd77d6b45e3b47f23a955cc785'),
(5, 'No more announcements', 1, 'API5:2019 Broken Function Level Authorization', 'Pada tantangan ini, dapatkan flag dengan menghapus semua data announcement pada halaman utama VAIS', 'Kebijakan kontrol akses yang kompleks dengan hierarki, grup, dan peran yang berbeda, dan pemisahan yang tidak jelas antara fungsi administratif dan reguler, cenderung mengarah pada kelemahan otorisasi. Dengan mengeksploitasi masalah ini, penyerang mendapatkan akses ke sumber daya pengguna lain dan/atau fungsi administratif', 5, 'CVE-2019-0039', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : 212121 dan password : bob123', 'Burp Suite / OWASP ZAP', '- Hanya izinkan operasi oleh pengguna yang termasuk dalam grup atau role yang tepat. <br>\n- Jangan mengandalkan klien / konsumer ', 'http://localhost:4040', '3b0ce457aa2483667c096c08c04006fe'),
(6, 'Registration & Privilege Escalation ', 1, 'API6:2019 Mass Assignment', 'Pada tantangan ini, dapatkan flag dengan melakukan registrasi member vPerpus sebagai administrator', 'Mengikat data yang disediakan klien (misalnya, JSON) ke model data, tanpa pemfilteran properti yang tepat berdasarkan daftar yang diizinkan, biasanya mengarah ke Tugas Massal. Entah menebak properti objek, menjelajahi titik akhir API lainnya, membaca dokumentasi, atau menyediakan properti objek tambahan dalam muatan permintaan, memungkinkan penyerang untuk memodifikasi properti objek yang tidak seharusnya mereka lakukan.', 4, 'CVE-2019-0039', 'Tidak ada', 'Burp Suite / OWASP ZAP', 'Setiap parameter yang akan dikirimkan ke server harus ditentukan secara eksplisit dalam sistem, seperti dengan menggunakan teknik whitelisting ataupun blacklisting.', 'http://localhost:4041', '401ad0dba47bf4c07a569579be21ea2f'),
(7, 'Misconfigured directory permission', 1, 'API7:2019 Security Misconfiguration', 'Pada tantangan ini, flag dapat ditemukan pada file pdf yang berada pada server. API respon memberikan informasi link url suatu file multimedia, namun karena konfigurasi yang buruk dari file dan folder permission, seluruh file dan folder dapat diakses dengan mudah.', 'Kesalahan konfigurasi keamanan biasanya merupakan akibat dari konfigurasi default yang tidak aman, konfigurasi yang tidak lengkap atau ad-hoc, penyimpanan cloud terbuka, header HTTP yang salah konfigurasi, metode HTTP yang tidak perlu, berbagi sumber daya Cross-Origin (CORS) permisif, dan pesan kesalahan verbose yang berisi informasi sensitif.', 3, 'CVE-2020-29582', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : bob@hotmail.com dan password : rahasia123', 'Burp Suite / OWASP ZAP', 'Jangan berikan hak akses penuh untuk semua file dan folder di server kepada user web ataupun anonymous user.', 'http://localhost:4041', 'e8774e7b117963fcae4759defda0864b'),
(8, 'API SQL injection', 1, 'API8:2019 Injection', 'Pada tantangan ini, anda akan menemukan flag pada API endpoint yang vulnerable terhadap SQL injection. Ambil alih sistem database lalu lihat flag pada tabel dengan nama \"flag\". Selamat mencoba!', 'Security risk ini disebabkan oleh kerentanan terhadap injeksi, seperti SQL, NoSQL, Command Injection, dll., terjadi ketika data yang tidak dipercaya dikirim ke juru bahasa sebagai bagian dari perintah atau kueri. Data berbahaya penyerang dapat mengelabui penerjemah agar menjalankan perintah yang tidak diinginkan atau mengakses data tanpa otorisasi yang tepat.', 5, 'CVE-2022-29603', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : bob@hotmail.com dan password : rahasia123', 'SQLMap', '- Selalu validasi dan sanitasi inputan dari konsumer <br> \r\n- Gunakan web application firewall untuk menghindari SQL injection. Untuk API, anda dapat menggunakan Wallarm API Firewall\r\n', 'http://localhost:4041', '6c0baf50647a69d5ef75df5f83d35fdb'),
(9, 'Old version of lecturer\'s data', 1, 'API9:2019 Improper Assets Management', 'Pada tantangan ini, flag dapat ditemukan pada API endpoint versi 1 dari detail data dosen/lecturer. Selamat mencoba!', 'API cenderung mengekspos lebih banyak titik akhir daripada aplikasi web tradisional, membuat dokumentasi yang tepat dan diperbarui menjadi sangat penting. Host yang tepat dan inventaris versi API yang diterapkan juga memainkan peran penting untuk mengurangi masalah seperti versi API yang tidak digunakan lagi dan titik akhir debug yang terbuka.', 3, 'CVE-2021-39905', 'Untuk memulai pengujian, anda dapat menggunakan kredential sebagai mahasiswa Bob dengan username : 212121 dan password : bob123', 'Burp Suite / OWASP ZAP', 'Matikan versi endpoint yang tidak diperlukan dari produksi. Jika dua versi memang dibutuhkan untuk keperluan konsumer, pastikan semua versi dari API endpoint dengan tujuan yang sama memperoleh perlakukan yang sama dari sisi pengujian keamanan seperti monitoring, logging maupun vulnerability assesment', 'http://localhost:4040', 'e37ea288e5f33ab601b35970019b5666'),
(10, 'Credential stuffing member login', 1, 'API10:2019 Insufficient Logging & Monitoring', 'Pada tantangan ini, karena tidak adanya logging autentikasi pada percobaan autentikasi yang salah, anda dapat melakukan eksploitasi dengan teknik credential stuffing  terhadap password dari user admin@spkapi.local. Selamat mencoba!. Sumber password untuk teknik credential stuffing ini dapat menggunakan password umum pada link berikut : https://github.com/danielmiessler/SecLists/blob/master/Passwords/Common-Credentials/10-million-password-list-top-1000.txt', 'Pencatatan dan pemantauan yang tidak memadai, ditambah dengan integrasi yang hilang atau tidak efektif dengan respons insiden, memungkinkan penyerang menyerang sistem lebih lanjut, mempertahankan kegigihan, beralih ke lebih banyak sistem untuk mengutak-atik, mengekstrak, atau menghancurkan data. Sebagian besar studi pelanggaran menunjukkan waktu untuk mendeteksi pelanggaran lebih dari 200 hari, biasanya dideteksi oleh pihak eksternal daripada proses atau pemantauan internal.', 4, 'CVE-2022-24044', 'username : alice@gmail.com', 'FFUF / Burp Suite / OWASP ZAP', '- Catat setiap upaya yang gagal, akses yang ditolak, kegagalan validasi input, dll. <br>\r\n- Sediakan format yang sesuai standar untuk menyimpan log dengan aman. <br>\r\n- Gunakan aplikasi monitoring seperti Grafana terhadap masing-masing API server / API gateway untuk memantau trafik yang mencurigakan\r\n', 'http://localhost:4041', '619ff4193bffc4858ebb7b70af4edfc5');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_19_054906_create_challenges_table', 1),
(6, '2022_02_19_062635_create_pentests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pentests`
--

CREATE TABLE `pentests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `challenge_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `point` int(3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pentests`
--

INSERT INTO `pentests` (`id`, `challenge_id`, `user_id`, `status`, `point`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 75, '2022-05-19 09:42:34', '2022-06-06 01:15:42'),
(2, 2, 2, 1, 75, '2022-05-28 11:30:46', '2022-05-28 11:30:46'),
(3, 3, 2, 0, 100, '2022-05-28 11:31:01', '2022-06-01 23:41:06'),
(4, 4, 2, 0, 50, '2022-05-28 11:31:12', '2022-05-28 11:31:12'),
(5, 5, 2, 0, 100, '2022-05-28 11:31:26', '2022-05-28 11:31:26'),
(6, 6, 2, 0, 75, '2022-05-28 11:31:47', '2022-05-29 21:59:59'),
(7, 7, 2, 1, 50, '2022-05-28 11:54:23', '2022-06-16 11:21:34'),
(8, 8, 2, 0, 100, '2022-05-28 11:54:38', '2022-05-28 11:54:38'),
(9, 9, 2, 1, 50, '2022-05-28 11:55:04', '2022-05-31 01:53:35'),
(10, 10, 2, 1, 75, '2022-05-28 11:55:04', '2022-05-28 11:55:04'),
(11, 1, 3, 1, 75, '2022-05-29 21:42:02', '2022-05-29 21:53:10'),
(12, 2, 3, 0, 75, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(13, 3, 3, 0, 100, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(14, 4, 3, 0, 50, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(15, 5, 3, 0, 100, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(16, 6, 3, 1, 75, '2022-05-29 21:42:02', '2022-05-29 22:00:19'),
(17, 7, 3, 1, 50, '2022-05-29 21:42:02', '2022-05-31 15:10:27'),
(18, 8, 3, 0, 100, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(19, 9, 3, 0, 50, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(20, 10, 3, 0, 75, '2022-05-29 21:42:02', '2022-05-29 21:42:02'),
(42, 1, 4, 0, 75, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(43, 2, 4, 0, 75, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(44, 3, 4, 0, 100, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(45, 4, 4, 0, 50, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(46, 5, 4, 0, 100, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(47, 6, 4, 0, 75, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(48, 7, 4, 0, 50, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(49, 8, 4, 1, 100, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(50, 9, 4, 0, 50, '2022-05-30 02:43:02', '2022-05-30 02:43:02'),
(51, 10, 4, 0, 75, '2022-05-30 02:43:02', '2022-05-30 02:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(2, 'Muhammad Idris', 'idris@gmail.com', NULL, '$2y$10$iotmamrPV7z.dID9UNsgweGjp6pqxinQFcbNzNJ9HOxy7tMqhNYem', NULL, 0, '2022-05-19 09:41:18', '2022-05-19 09:41:18'),
(3, 'Alice', 'alice@gmail.com', NULL, '$2y$10$/YauIZsbmDcciZNi38kyjeU8ahY8mpRQQVr.FuCCo/8rfyQXHt.TO', NULL, 0, '2022-05-29 21:21:28', '2022-05-31 15:10:46'),
(4, 'Bob', 'bob@hotmail.com', NULL, '$2y$10$dRwsYK.ezQdYSFb8Ti9ldu7kBLoKSnCSV1CRoRzZFSX85RsydBPmW', NULL, 0, '2022-05-30 02:10:58', '2022-05-30 02:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `vulnapps`
--

CREATE TABLE `vulnapps` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `gamified` tinyint(4) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vulnapps`
--

INSERT INTO `vulnapps` (`id`, `app_name`, `description`, `gamified`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SPKAPI', 'SPKAPI merupakan singkatan dari sistem pembelajaran keamanan API. Mari mengenal dan mempelajari fundamental risiko keamanan API berdasarkan Top 10 OWASP API Security Project di Tahun 2019. VPWA terdiri dari 2 aplikasi utama yaitu VAIS (Vulnerable Academic Information System) dan vPerpus (Vulnerable perpustakaan)', 1, NULL, 1, NULL, NULL),
(2, 'DVWA', 'Damn Vulnerable Web Application (DVWA) adalah aplikasi web PHP/MySQL yang sangat rentan. Tujuan utamanya adalah untuk membantu profesional keamanan menguji keterampilan dan alat mereka dalam lingkungan hukum, untuk membantu pengembang web untuk lebih memahami proses keamanan aplikasi web, dan untuk membantu guru/siswa mengajar/mempelajari aplikasi web di kelas pengaturan program keamanan.', 0, 'http://localhost:4044', 1, NULL, NULL),
(3, 'Mutillidae II', 'OWASP Mutillidae II adalah aplikasi web gratis, open source yang menyediakan target untuk penggemar keamanan siber  yang dirancang untuk lab, penggemar keamanan, ruang kelas, CTF, dan target alat penilaian kerentanan.', 0, 'http://localhost:4043/mutillidae', 1, NULL, NULL),
(4, 'WebGoat', 'WebGoat adalah aplikasi yang sengaja dibuat tidak aman yang memungkinkan pengembang yang tertarik seperti Anda untuk menguji kerentanan umum dalam aplikasi berbasis Java yang menggunakan komponen open source yang umum dan populer. Versi yang digunakan pada aplikasi pembelajaran ini adalah WebGoat 8.', 0, 'http://localhost:4042/WebGoat', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Vunapp_Badge` (`vulnapp_id`),
  ADD KEY `FK_user_badge` (`user_id`);

--
-- Indexes for table `challenges`
--
ALTER TABLE `challenges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Vunapp_Challenge` (`vulnapp_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pentests`
--
ALTER TABLE `pentests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pentests_challenge_id_foreign` (`challenge_id`),
  ADD KEY `pentests_user_id_foreign` (`user_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vulnapps`
--
ALTER TABLE `vulnapps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `challenges`
--
ALTER TABLE `challenges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pentests`
--
ALTER TABLE `pentests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vulnapps`
--
ALTER TABLE `vulnapps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `badges`
--
ALTER TABLE `badges`
  ADD CONSTRAINT `FK_Vunapp_Badge` FOREIGN KEY (`vulnapp_id`) REFERENCES `vulnapps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_user_badge` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `challenges`
--
ALTER TABLE `challenges`
  ADD CONSTRAINT `FK_Vunapp_Challenge` FOREIGN KEY (`vulnapp_id`) REFERENCES `vulnapps` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pentests`
--
ALTER TABLE `pentests`
  ADD CONSTRAINT `pentests_challenge_id_foreign` FOREIGN KEY (`challenge_id`) REFERENCES `challenges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pentests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
