-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 02:41 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bditjawx_sylcoffe`
--

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `stock_alert` text NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`id`, `name`, `unit`, `description`, `stock_alert`, `deleted`, `created_at`, `updated_at`) VALUES
(38, 'Salt', 'Kg', 'Salt', '50,100,150', 1, NULL, NULL),
(46, 'Tea Red', 'Kg', 'Tea Red', '500,700,1000', 1, NULL, NULL),
(47, 'Tea Yellow', 'Kg', 'Tea Yellow', '500,700,1000', 1, NULL, NULL),
(49, 'Sodium', 'Kg', 'Sodium', '250,300,400', 1, NULL, NULL),
(50, 'Segarin', 'Kg', 'Segarin', '50,100,200', 1, NULL, NULL),
(51, 'Potassium', 'Kg', 'Potassium', '100,150,200', 1, NULL, NULL),
(52, 'T C P', 'Kg', 'T C P', '100,150,200', 1, NULL, NULL),
(53, 'S Partan', 'Kg', 'S Partan', '30,40,50', 1, NULL, NULL),
(59, 'Tea Flavour', 'Kg', 'Tea Flavour', '50,80,100', 1, NULL, NULL),
(65, 'Sugar', 'Kg', 'Sugar', '300,500,750', 2, NULL, NULL),
(69, 'Tea Leaf Colour', 'Kg', '', '10,15,20', 2, NULL, NULL),
(70, 'Tea Leaf Colour', 'Kg', 'Tea Leaf Colour', '10,15,20', 2, NULL, '2020-12-07 13:05:23'),
(71, 'Tea Leaf Colour black', 'Kg', 'Tea Leaf Colour black', '101520', 2, NULL, '2020-12-08 09:57:47'),
(73, 'Peach Power', 'Kg', 'Peach Power', '10,15,20', 2, NULL, '2020-12-21 13:32:55'),
(76, 'Sugar', 'kg', 'sugar descrition', '500', 2, '2020-12-07 11:17:36', '2020-12-08 03:23:12'),
(85, 'Abul', 'kg', 'Abul', '12323', 2, '2020-12-07 12:28:44', '2020-12-07 13:05:46'),
(86, 'Agar', 'pics', 'Agar', '500', 2, '2020-12-07 12:32:52', '2020-12-07 13:05:44'),
(87, 'Agar', 'pics', 'agar', '100', 2, '2020-12-07 12:34:07', '2020-12-07 13:03:55'),
(88, 'Dirking Water', 'Litre', 'Pure Dirking Water form Himalaya', '100', 2, '2020-12-08 03:15:42', '2020-12-14 10:49:48'),
(89, 'Flower', 'kg', 'Flower form Australia', '500', 2, '2020-12-08 05:13:22', '2020-12-08 05:22:28'),
(90, 'Rice', '100', 'Minicte Rice', '1200', 2, '2020-12-12 13:09:11', '2020-12-14 13:17:40'),
(91, 'Oil', 'Littre', 'Teer Oil', '950', 1, '2020-12-14 13:20:10', '2020-12-14 13:20:10'),
(92, 'dd', 'kg', 'rtghter', '[\"565\",\"5545\",\"455\"]', 1, '2020-12-21 11:06:11', '2020-12-21 11:06:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `unit` (`unit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
