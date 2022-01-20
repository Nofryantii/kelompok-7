-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2022 at 04:42 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbuntals`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_pesan` int(11) NOT NULL,
  `id` int(50) DEFAULT NULL,
  `id_gedung` int(50) DEFAULT NULL,
  `kegiatan` varchar(100) DEFAULT NULL,
  `start` timestamp NULL DEFAULT NULL,
  `end` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_pesan`, `id`, `id_gedung`, `kegiatan`, `start`, `end`) VALUES
(59, 13, 0, 'babi', '2022-01-19 19:56:00', '2022-01-21 20:57:00'),
(76, 13, 12, 'tes', '2022-01-01 09:01:00', '2022-01-04 09:01:00'),
(77, 13, 11, 'ted', '2022-01-12 09:25:00', '2022-01-16 09:25:00'),
(79, 13, 11, 'tes', '2022-01-17 09:30:00', '2022-01-19 09:30:00'),
(87, 13, 16, 'santet', '2022-01-04 15:19:00', '2022-01-06 15:19:00'),
(88, 15, 13, 'balas santet', '2022-01-07 15:19:00', '2022-01-08 15:19:00'),
(89, 18, 9, 'kondangan', '2022-01-10 15:21:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gedung`
--

CREATE TABLE `tbl_gedung` (
  `id_gedung` int(11) NOT NULL,
  `nama_gedung` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 DEFAULT NULL,
  `lokasi` text CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `harga` varchar(15) DEFAULT NULL,
  `chat` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_gedung`
--

INSERT INTO `tbl_gedung` (`id_gedung`, `nama_gedung`, `deskripsi`, `alamat`, `lokasi`, `harga`, `chat`, `foto`) VALUES
(9, 'acc al akbar', 'Masjid Raya Al Akbar adalah sebuah masjid yang berada di kota Sorong Provinsi Papua Barat. Masjid ini terletak di tengah kota yang beralamat tepat di Jalan Ahmad Yani No 40 kota Sorong. Di komplek masjid ini juga terdapat ruang pertemuan yang bernama Al Akbar Convetion Center', 'Jl. Ahmad Yani No.40, Remu Utara, Kec. Sorong, Kota Sorong, Papua Bar. 98412', 'https://www.google.com/maps/search/acc+al+akbar+sorong/@-0.8820629,131.2796218,17z/data=!3m1!4b1', '8000000', '', '697-bataylon.jpg'),
(11, 'Gedung Serbaguna Batalyon', 'Salah satu gedung pertemuan yang berada di Kota Sorong', 'Jl. Basuki Rahmat, Klawalu, Sorong Tim., Kota Sorong, Papua Bar. 98416', 'https://www.google.com/maps/place/Gedung+Serbaguna+Batalyon/@-0.8930961,131.3087385,15.24z/data=!4m9!1m2!2m1!1sgedung++batalyon+sorong!3m5!1s0x2d595563f438349d:0x7a1aa6871734d32f!8m2!3d-0.8973661!4d131.3190326!15sChdnZWR1bmcgIGJhdGFseW9uIHNvcm9uZ1oYIhZnZWR1bmcgYmF0YWx5b24gc29yb25nkgERY29udmVudGlvbl9jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVTmhlVzloV1VwQkVBRQ', '6000000', '', '397-gedung.jpg'),
(13, 'Gedung Graha Katedral', 'Gedung ini bisa disewa', 'Jl. Jend. Sudirman, Malabutor, Sorong Manoi, Kota Sorong, Papua Bar. 98412', 'https://www.google.com/maps/place/Gedung+Graha+Katedral/@-0.8854033,131.2693615,15z/data=!4m2!3m1!1s0x0:0x44e0930d79ded192?sa=X&ved=2ahUKEwinmf7jyMD1AhXhTWwGHUMUCr8Q_BJ6BAgYEAM', '500000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung', '518-gereja katedral sorong.JPG'),
(14, 'Gedung Serba Guna Graha Kirana', 'Gedung ini bisa disewa', 'Jl. R.A. Kartini, Rufei, Sorong Bar., Kota Sorong, Papua Bar. 98411', 'https://www.google.com/maps/place/Gedung+Serba+Guna+Graha+Kirana/@-0.8646303,131.2501461,17z/data=!3m1!4b1!4m12!1m6!3m5!1s0x0:0x44e0930d79ded192!2sGedung+Graha+Katedral!8m2!3d-0.8854033!4d131.2693615!3m4!1s0x2d5eab6ddf1310e7:0xa00627e7ddc5c060!8m2!3d-0.8646303!4d131.2523402', '4500000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung ', '258-gedungkinara.png'),
(15, 'Gedung Sirambe', 'Gedung ini bisa disewa', 'Jl. Sungai Remu, Malaingkedi, Sorong Utara, Kota Sorong, Papua Bar. 98412', 'https://www.google.com/maps/place/Gedung+Sirambe/@-0.8850385,131.2970045,17z/data=!3m1!4b1!4m12!1m6!3m5!1s0x0:0x44e0930d79ded192!2sGedung+Graha+Katedral!8m2!3d-0.8854033!4d131.2693615!3m4!1s0x2d5955218fb5774d:0x3bf92c2c8a7ca37!8m2!3d-0.8850385!4d131.2991986', '3500000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung', '299-sirambe.png'),
(16, 'Balai Pertemuan J.A. JUMAME', 'gedung in bisa disewa', '4872+862, Malaingkedi, Sorong Utara, Kota Sorong, Papua Bar. 98412', 'https://www.google.com/search?tbm=lcl&sxsrf=AOaemvKjB1_9S-sPR-W23kg1fAbc0so-WA:1642689908944&q=Gedung+Graha+Katedral&rflfq=1&num=20&stick=H4sIAAAAAAAAAB1Qu03EUBDUBSBiDhJHLmH_nwouIKAGS2cdoOMCgxuiAuqiCsZ-0pPe252dnZmH--GJU9rNSLpFgiJNAlV2pbbMlDTSimYZjpVdLtnCHFxcLbkTVEYYkXuKReA7PEoStVdku0q0kgLp4SCtZgtvVClrOKqrsVBIWIfrdgCl7AxRLTFnAzJ0V1Wh5ljEIW4lpbuAJA-qIBNuFSjZGIoam1IZtYgShywQWhLsKia8qQVIs2LiRENR683hxuowWqWeZlsSorZZsACrdnHAN3QZcmniBgOa3a3KBOjRGKkgulTniGjfIyCRxpoWZ0DxbsW8QhMFBvDFFdkNmElnKSFUJ-hv_j0c_g7D6zLdLuN1er-NH-tlGj_n23xdv9bl_efu-TSfV3RPy_Q2jS_T93xepus_pSfxy-kBAAA&sa=X&ved=2ahUKEwinmf7jyMD1AhXhTWwGHUMUCr8Q63UoAXoECBQQAg&biw=1093&bih=480&dpr=1.25#rlfi=hd:;si:10809914731193668257,l,ChVHZWR1bmcgR3JhaGEgS2F0ZWRyYWxaFyIVZ2VkdW5nIGdyYWhhIGthdGVkcmFskgERY29udmVudGlvbl9jZW50ZXI,y,s10_5pqNKaE;mv:[[-0.8591,131.3237561],[-0.962333,131.2355849]]', '500000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung', '565-jumela.png'),
(17, 'Gedung Samu Siret', 'gedung ini bisa di sewa juga', 'Bar., Remu Utara, Kec. Sorong, Kota Sorong, Papua Bar. 98412', 'https://www.google.com/maps/place/Gedung+Samu+Siret/@-0.8818028,131.2870828,15z/data=!4m2!3m1!1s0x0:0xf3f62d9f3defac72?sa=X&ved=2ahUKEwiXtP22zsD1AhU1SmwGHToDDPYQ_BJ6BAgREAU', '4200000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung', '565-serat.png'),
(18, 'Gedung LPTQ Aimas Unit 2 Kabupaten Sorong', 'gedung ini Tempat recommended untuk menggelar acara seminar', 'Jl. Buncis, Malawele, Aimas, Kabupaten Sorong, Papua Bar. 98414', 'https://www.google.com/maps/place/Gedung+LPTQ+Aimas+Unit+2+Kabupaten+Sorong/@-0.9568027,131.3135941,15z/data=!4m5!3m4!1s0x0:0x90ece96fd38b04df!8m2!3d-0.9568027!4d131.3135941', '4700000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung', '669-aimas.png'),
(19, 'Aula Maranatha', 'GEDUNG INI JUGA BISA DISEWA UNTUK BERBAGAI KEGIATAN KHUSUSNYA KEAGAMAAN', '478Q+R4G, Remu Utara, Kec. Sorong, Kota Sorong, Papua Bar. 98412', 'https://www.google.com/maps/place/Aula+Maranatha/@-0.8829429,131.2878214,15z/data=!4m5!3m4!1s0x0:0xaf47c87ecd5d10ab!8m2!3d-0.8829453!4d131.2878201', '3500000', 'https://wa.me/082248125210?text=Saya%20mau%20pesan%20gedung', '618-MARANATA.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(13, 'saya', 'saya', 'saya@gmail.com', '$2y$10$8b36xP6A0WMWoqNeCsupieY8wDcJEkXS8YbQG3pi9spdVGTjwaWJW'),
(14, 'nofryanti', 'nofryanti', 'nofryanti@gmail.com', '$2y$10$DW.6PLUdQ59PnaKIpn8FIuif9Jv7zIH8OWOMXnfM/kA1AEvVWpoje'),
(15, 'aku', 'aku', 'aku@gmail.com', '$2y$10$NUGLbCSffsnFFqkXYNDNvOq1uQRI7ougRD96bBO5JDNjohKCsvw..'),
(17, 'begadanguyy', 'begadanguyy', 'begadanguyy@gmail.com', '$2y$10$EZy3In3eOjs4cJnls/UzyOiCWGOYb06qF3FJV6BQviTlkO9nEPA0C'),
(18, 'dia', 'dia', 'dia@gmail.com', '$2y$10$Hi2SPOnsaV2kYZVAKKn.aOzB7.RHj94CcGs1jVUCHuCPnFN8VumOi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_gedung`
--
ALTER TABLE `tbl_gedung`
  MODIFY `id_gedung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
