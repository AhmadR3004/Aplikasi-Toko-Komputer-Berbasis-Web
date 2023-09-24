-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2023 at 02:01 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `telp_admin` varchar(20) NOT NULL,
  `email_admin` varchar(50) NOT NULL,
  `alamat_admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `username`, `password`, `telp_admin`, `email_admin`, `alamat_admin`) VALUES
(1, 'Ahmad Rosyad', 'admin', '0192023a7bbd73250516f069df18b500', '089692572431', 'ahmadrosyad3004@gmail.com', 'Jl.Kelayan B Gang Setia Rahman No.23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'ACER Nitro'),
(2, 'ASUS TUF'),
(3, 'ASUS ROG'),
(4, 'RAZER Blade');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `gambar_produk` varchar(100) NOT NULL,
  `status_produk` tinyint(4) NOT NULL,
  `tanggal_dibuat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `deskripsi_produk`, `gambar_produk`, `status_produk`, `tanggal_dibuat`) VALUES
(1, 1, 'ACER Nitro 5', 15000000, '<p>&nbsp;</p>\r\n\r\n<p>For Sale ACER Nitro AN515 -54. Laptop yg asik di ajak bekerja keras. Laptop ini di bekali hardware yg tinggi sehingga kegiatan gaming dan editing pun bisa di lakukan dengan lancar. Di balut dengan desain body yg sangat keren merah menyala dan kokoh. Layar 120 Hz Dan Nvidia GTX 1660 Ti akan membuat nyaman kegiatan gaming anda.</p>\r\n\r\n<p>Spesifikasi :<br />\r\n* Procie intel Core i7 9750H 2.4 Ghz<br />\r\n* Ram 8 Gb DDR 4 Dual Chanel up to 32 GB<br />\r\n* SSD 256 GB Kenceng ngebutt * HDD 1 TB<br />\r\n* 2 slot ssd m.2 dan 1 slot hdd sata. mantap<br />\r\n* Display 15,6 in FHD IPS Acer colorblast LCD bazelles 144 Hz. Layar mantap buat gaming<br />\r\n* Graphic dual canel intel HD dan NVIDIA Geforce GTX 1660 Ti 6GB. ( grafik mantap buat gaming dan rendering )<br />\r\n* Usb 3.0 dan 3.1 Type C, wifi , bluetooth, HD Camera, Combo audio jack, Big SD Card<br />\r\n* Windows 11 Home * Lampu keyboard nyala Merah Keren<br />\r\n* Coolbost technology agar laptop tetap dingin * ultra fast wireless speed<br />\r\n* Dolby audio premium with acer true harmony ( speaker sangat mantap )<br />\r\n* DTSX immersive Gaming Audio * Dual Fan with Quad exhaust Port Kondisi :<br />\r\n* Mesin Normal 100% * LCD Normal nyala terang dan jernih<br />\r\n* Speker suara kenceng empuk High Quality Audio<br />\r\n* Wifi dan Bluetooth Oke<br />\r\n* Fisik 90% Muluss Bekas Pemakaian wajar manusiawi<br />\r\n* Slot Berfungsi semua<br />\r\n* batrai 2+ jam awett<br />\r\n* Keyboard tactile dan touchpad empuk mantap</p>\r\n\r\n<p>Kelengkapan : Laptop + Charger Ori Siap lahap game2 terbaru dengan hasil gambar yg mulus no lag. .set high - ultra. Buat kerja editing foto dan video siappp</p>\r\n', 'produk1695556403.png', 1, '2023-09-24 11:53:23'),
(3, 3, 'ASUS ROG Zephyrus G14', 12000000, '<p>Beyond Fast GeForce RTX&trade; 40 Series</p>\r\n\r\n<p>Specification :</p>\r\n\r\n<p>Graphics : NVIDIA&reg; GeForce RTX&trade; 4050 Laptop GPU, ROG Boost: 2405MHz* at 120W (2355MHz Boost Clock+50MHz OC, 100W+20W Dynamic Boost)<br />\r\nProcessor : 12th Gen Intel&reg; Core&trade; i7-12700H Processor 2.3 GHz (24M Cache, up to 4.7 GHz, 14 cores: 6 P-cores and 8 E-cores)<br />\r\nMemory : 16GB DDR4 Support dual channel memory Storage : 512GB PCIe&reg; 4.0 NVMe&trade; M.2 SSD<br />\r\nDisplay : 16-inch FHD+ 16:10 (1920 x 1200, WUXGA) 250nits anti-glare panel<br />\r\nOperating System : Windows 11 Home + Office Home Student 2021<br />\r\nPorts : 1x RJ45 LAN port 1x Thunderbolt&trade; 4 support DisplayPort&trade; / power delivery 1x USB 3.2 Gen 2 Type-C support DisplayPort&trade; / power delivery / G-SYNC 2x USB 3.2 Gen 2 Type-A 1x&nbsp;card&nbsp;reader&nbsp;(microSD)&nbsp;(UHS-II,&nbsp;312MB/s) 1x HDMI 2.1 FRL 1x 3.5mm Combo Audio Jack<br />\r\nKeyboard : Backlit Chiclet Keyboard 1-Zone RGB<br />\r\nWireless Network : Wi-Fi 6E(802.11ax) (Triple band) 2*2 + Bluetooth&reg; 5.2 (*Bluetooth&reg; version may change with OS version different.)<br />\r\nBattery : 90WHrs, 4S1P, 4-cell Li-ion Weight : 2.00 Kg<br />\r\nWebcam : 720P HD IR Camera for Windows Hello<br />\r\nPower Supply : &oslash;6.0, 240W AC Adapter, Output: 20V DC, 12A, 240W, Input: 100~240C AC 50/60Hz universal<br />\r\n<br />\r\nWarranty 2 Years By ASUS INDONESIA</p>\r\n', 'produk1695556474.png', 1, '2023-09-24 11:54:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
