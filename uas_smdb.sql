-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 01:04 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_smdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `IdUser` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`IdUser`, `Username`, `Email`, `Password`, `Status`) VALUES
(6, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(7, 'hardy', 'hardylie8@gmail.com', '0cdadc9ab9e91d4a482958962f56a566', 'User');

-- --------------------------------------------------------

--
-- Table structure for table `detailtransaksi`
--

CREATE TABLE `detailtransaksi` (
  `id` int(11) NOT NULL,
  `idTransaksi` int(11) NOT NULL,
  `IdMenu` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detailtransaksi`
--

INSERT INTO `detailtransaksi` (`id`, `idTransaksi`, `IdMenu`, `qty`) VALUES
(15, 16, 8, 1),
(16, 17, 8, 2),
(17, 17, 13, 2),
(18, 17, 5, 2),
(19, 17, 2, 1),
(20, 17, 7, 2),
(21, 17, 1, 1),
(22, 17, 4, 2),
(23, 18, 9, 1),
(24, 18, 13, 1),
(25, 18, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `IdMenu` int(11) NOT NULL,
  `NamaMenu` text NOT NULL,
  `Harga` int(13) NOT NULL,
  `Gambar` text NOT NULL,
  `Category` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`IdMenu`, `NamaMenu`, `Harga`, `Gambar`, `Category`) VALUES
(1, 'Dark Beef Burger', 45, 'https://drive.google.com/thumbnail?id=1tgB-MwbDIEvNUmjbhv4ltIyifRwvE4w0', 'Burger'),
(2, 'Chicken Burger', 34, 'https://drive.google.com/thumbnail?id=1piigRLztfb85QXU-aPMorTJPBWn2XItW', 'Burger'),
(3, 'Coca-cola Float', 20, 'https://drive.google.com/thumbnail?id=1WjLvQEMLFVTMP5kYRyjcaLVi5JIJNxUX', 'Dessert'),
(4, 'Air Mineral', 12, 'https://drive.google.com/thumbnail?id=1tDDEtgi7tLaiMmBadrW_f2WXhbbSYI2g', 'Drinks'),
(5, 'Cheese Burger', 44, 'https://drive.google.com/thumbnail?id=1JkGD0rhrKFBBWAHOHNVLFkROzJvk07uy', 'Burger'),
(6, 'Chocolate Ice Cream', 20, 'https://drive.google.com/thumbnail?id=1QY1siHQ6qAcfLWOUBOpBNjh8hUvTpCFI', 'Dessert'),
(7, 'Coca-cola', 14, 'https://drive.google.com/thumbnail?id=1atJ-uooZ_qT36kOBv1yo5mbiXxQ13b6r', 'Drinks'),
(8, 'Iced Americano', 20, 'https://drive.google.com/thumbnail?id=1BsfaISvEKrCwsOj8O_xmfEty6ediPoQ8', 'Drinks'),
(9, 'French Fries', 15, 'https://drive.google.com/thumbnail?id=1q77-TuPdORI_6XnZfQ_thddW9N4wqXCX', 'Side-Dish'),
(11, 'Vanilla Ice Cream', 20, 'https://drive.google.com/thumbnail?id=1-a2V-D7LX_xnIr_aN8snmKMdd8RB5gY2', 'Dessert'),
(12, 'Chicken Nugget', 15, 'https://drive.google.com/thumbnail?id=1SjF1jMPV8qXcTsja5kcAx8hDG7wmusQx', 'Side-Dish'),
(13, 'Onion Ring', 15, 'https://drive.google.com/thumbnail?id=1m8hw7u-WDp3XKVKnzt34bWOKmmWqBLF3', 'Side-Dish');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `idTransaksi` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `totalHarga` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `Tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`idTransaksi`, `IdUser`, `qty`, `totalHarga`, `SubTotal`, `Tanggal`) VALUES
(16, 7, 1, 20, 22, '2021-02-03 11:39:53'),
(17, 7, 12, 289, 318, '2021-02-03 11:40:51'),
(18, 7, 3, 50, 55, '2021-02-03 11:46:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`IdUser`);

--
-- Indexes for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`IdMenu`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idTransaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `IdUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detailtransaksi`
--
ALTER TABLE `detailtransaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `IdMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idTransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
