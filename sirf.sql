-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 03:33 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sirf`
--

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `ID_Log` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Activity` int(11) NOT NULL,
  `Date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `ID` int(11) NOT NULL,
  `Kind` varchar(10) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Description` text NOT NULL,
  `Price` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID`, `Kind`, `Name`, `Description`, `Price`, `Status`) VALUES
(1, 'Paket', 'Paket Ayam Geprek', 'Nasi putih, ayam bakar / goreng, tahu goreng, tempe goreng, lalap, sambal geprek', 20000, 1),
(2, 'Paket', 'Paket Melati 1 Ayam Bakar', 'Nasi Putih, Ayam Bakar, Gudeg Krecek, Orek Tempe, Lalap, Sambal Pedas', 23000, 1),
(3, 'Paket', 'Paket Ayam Keju Geprek', 'Nasi putih, ayam goreng keju, tahu goreng, tempe goreng, lalap, sambal', 25000, 1),
(4, 'Paket', 'Paket Gudeg Ayam Bakar', 'Nasi putih, ayam bakar, gudeg krecek, orek tempe, sambal', 25000, 1),
(5, 'Paket', 'Paket Nasi Kuning Ayam Bakar', 'Nasi kuning, ayam bakar, perkedel, tempe/tahu bacem, ati ampela, orek tempe, sambal', 25000, 1),
(6, 'Paket', 'Paket Exclusive 3 Ayam Teriyaki', 'Nasi putih, ayam teriyaki, ikan asam manis, salad buah / sayur', 40000, 1),
(7, 'Paket', 'Paket Nasi Ijo Ayam Bakar', 'Nasi Ijo, Ayam Bakar, Ati Ampela, Perkedel Kentang, Tahu/Tempe Goreng, Dadar Rawis, Orek Tempe, Urap Sayur, Sambal', 35000, 1),
(8, 'Paket', 'Paket Nasi Liwet Ayam Bakar', 'Nasi liwet, ayam bakar, ikan asin, tahu/tempe goreng, oseng toge + kacang panjang, sayur asem', 30000, 1),
(9, 'Paket', 'Paket Ayam Saus Merah', 'Nasi putih, daging bistik, ayam saos merah, cah pancawarna, mie goreng, kerupuk', 35000, 1),
(10, 'Makanan', 'Ayam Goreng Madu', '1 Pcs Ayam Goreng Madu', 15000, 1),
(11, 'Makanan', 'Ayam Bakar', '1 Pcs Ayam Bakar', 15000, 1),
(12, 'Makanan', 'Nasi Putih', '1 Piring Nasi Putih', 5000, 1),
(13, 'Makanan', 'Nasi Hijau', '1 Piring Nasi Hijau', 7000, 1),
(14, 'Makanan', 'Nasi Kuning', '1 Piring Nasi Kuning', 7000, 1),
(15, 'Sayuran', 'Capcai', 'Brokoli,kentang, ayam suwir, Wortel, Daun Bawang\r\n', 15000, 1),
(16, 'Sayuran', 'Sop Ayam', '1 Mangkok Sop Ayam', 15000, 1),
(19, 'Minuman', 'Es Teh', '', 5000, 1),
(20, 'Minuman', 'Teh Hangat', '', 5000, 1),
(21, 'Minuman', 'Es Cappucino Cincau', '', 8000, 1),
(22, 'Minuman', 'Jus Jeruk', '', 6000, 1),
(23, 'Minuman', 'Jus Mangga', '', 8000, 1),
(24, 'Minuman', 'Jus Buah Naga ', '', 10000, 1),
(25, 'Minuman', 'Jus Lemon Tea', '', 8000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID_Reservation` varchar(16) NOT NULL,
  `user_id` varchar(16) NOT NULL,
  `no_meja` int(4) NOT NULL,
  `note` varchar(300) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID_Reservation`, `user_id`, `no_meja`, `note`, `date`, `total`, `status`) VALUES
('ERP12122019-001', 'waiter1', 3, '2', '2019-12-12', 120000, 1),
('ERP12122019-0010', 'waiter1', 3, 'borong  kkk', '2019-12-12', 280000, 1),
('ERP12122019-002', 'waiter1', 1, 'Begancang', '2019-12-12', 28000, 1),
('ERP12122019-003', 'sholahul', 5, 'Begancang', '2019-12-12', 85000, 0),
('ERP12122019-004', 'sholahul', 2, 'Payooo', '2019-12-12', 40000, 0),
('ERP12122019-005', 'sholahul', 4, 'Hmm', '2019-12-12', 20000, 0),
('ERP12122019-006', 'sholahul', 10, 'Horang Kaya', '2019-12-12', 120000, 0),
('ERP12122019-007', 'sholahul', 8, 'Special', '2019-12-12', 40000, 0),
('ERP12122019-008', 'sholahul', 9, 'ok', '2019-12-12', 75000, 0),
('ERP12122019-009', 'waiter1', 7, 'ok', '2019-12-12', 40000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` varchar(16) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `Name`, `quantity`) VALUES
(28, 'ERP12122019-001', 'Paket Ayam Geprek', 3),
(29, 'ERP12122019-001', 'Paket Ayam Geprek', 3),
(31, 'ERP12122019-002', 'Paket Ayam Geprek', 1),
(32, 'ERP12122019-002', 'Jus Mangga', 1),
(36, 'ERP12122019-003', 'Paket Ayam Geprek', 3),
(37, 'ERP12122019-003', 'Nasi Hijau', 1),
(38, 'ERP12122019-003', 'Jus Jeruk', 3),
(39, 'ERP12122019-004', 'Paket Ayam Geprek', 2),
(40, 'ERP12122019-005', 'Paket Ayam Geprek', 1),
(41, 'ERP12122019-006', 'Paket Exclusive 3 Ayam Teriyaki', 3),
(42, 'ERP12122019-007', 'Paket Ayam Geprek', 2),
(43, 'ERP12122019-008', 'Paket Nasi Kuning Ayam Bakar', 1),
(44, 'ERP12122019-008', 'Paket Nasi Kuning Ayam Bakar', 1),
(45, 'ERP12122019-008', 'Paket Nasi Kuning Ayam Bakar', 1),
(46, 'ERP12122019-009', 'Paket Ayam Geprek', 2),
(47, 'ERP12122019-0010', 'Paket Ayam Saus Merah', 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Username` varchar(11) NOT NULL,
  `Password` varchar(11) NOT NULL,
  `Role` tinyint(1) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Birthday` date NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Username`, `Password`, `Role`, `Name`, `Birthday`, `Address`) VALUES
('Sholahul', '30mei1998', 2, 'Sholahul Fajri', '1998-05-30', 'Jl. M. Yamin. No.13 RT.11 RW.03 Kel. Muntang Tapus Kec. Prabumulih Barat'),
('Waiter1', 'Waiter1', 1, 'M. Robby', '1997-01-01', 'JL. Jendral Sudirman No.11 Palembang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`ID_Log`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID_Reservation`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `ID_Log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
