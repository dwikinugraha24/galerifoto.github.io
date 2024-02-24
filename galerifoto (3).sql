-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 03:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galerifoto`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(2, 'Irawan', 'irawan', 'adminirawan', '085774137284', 'irawan@gmail.com', 'Jl. Raya Kadu Seungit'),
(3, 'Diana', 'diana', '1234', '085788992919', 'Diana@gmail.com', 'Suka Seneng Cikeusik'),
(4, 'Hazwan', 'hazwan', '123', '085787778811', 'hazwan@gmail.com', 'Cikeusik Pandeglang'),
(5, 'Dwiki Nugraha', 'kitea', '123123', '081573034917', 'dwikinugraha009@gmail.com', 'Batujajar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(14, 'Pemandangan'),
(15, 'Bawah Air'),
(16, 'Hewan Peliharaan'),
(17, 'Satwa Liar'),
(18, 'Makanan'),
(19, 'Olahraga'),
(20, 'Fashion'),
(21, 'Seni Rupa'),
(22, 'Dokumenter'),
(23, 'Arsitektur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(51, 17, 'Satwa Liar', 5, 'Dwiki Nugraha', 'Anjing galak', '<p>Awas gigit!!!1</p>\r\n', 'foto1707656255.png', 1, '2024-02-11 12:57:35'),
(52, 15, 'Bawah Air', 5, 'Dwiki Nugraha', 'dwiki', '<p>Gaskan</p>\r\n', 'foto1707656434.jpg', 1, '2024-02-11 13:00:34'),
(53, 14, 'Pemandangan', 5, 'Dwiki Nugraha', 'anjun ajan ', '<p>barudak bandung&nbsp;</p>\r\n', 'foto1707656527.jpg', 1, '2024-02-11 13:02:07'),
(56, 16, 'Hewan Peliharaan', 5, 'Dwiki Nugraha', 'bandung', '<p>barudak cuy</p>\r\n', 'foto1707656950.jpg', 1, '2024-02-11 13:09:10'),
(57, 18, 'Makanan', 5, 'Dwiki Nugraha', 'anju  ajan ', '<p>cuy brey</p>\r\n', 'foto1707657003.jpg', 1, '2024-02-11 13:10:03'),
(58, 19, 'Olahraga', 5, 'Dwiki Nugraha', 'dwiki', '<p>gas</p>\r\n', 'foto1707657154.jpg', 1, '2024-02-11 13:12:34'),
(59, 20, 'Fashion', 5, 'Dwiki Nugraha', 'brey ders', '<p>cuy cay</p>\r\n', 'foto1707657246.png', 1, '2024-02-11 13:14:06'),
(60, 21, 'Seni Rupa', 5, 'Dwiki Nugraha', 'anju  ajan ', '<p>kridis cuy&nbsp;</p>\r\n', 'foto1707657374.jpg', 1, '2024-02-11 13:16:14'),
(61, 22, 'Dokumenter', 5, 'Dwiki Nugraha', 'dwiki', '<p>bandung</p>\r\n', 'foto1707657560.jpg', 1, '2024-02-11 13:19:20'),
(62, 23, 'Arsitektur', 5, 'Dwiki Nugraha', 'banjung', '<p>lihat likungan&nbsp;</p>\r\n', 'foto1707657620.jpg', 1, '2024-02-11 13:20:20'),
(63, 16, 'Hewan Peliharaan', 5, 'Dwiki Nugraha', 'BULAN', '<p>tas tur&nbsp;</p>\r\n', 'foto1707657732.png', 1, '2024-02-11 13:22:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
