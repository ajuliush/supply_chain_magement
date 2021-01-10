-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 02:48 PM
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
-- Table structure for table `attandance`
--

CREATE TABLE `attandance` (
  `id` bigint(20) NOT NULL,
  `staffID` bigint(20) NOT NULL,
  `check_time` datetime NOT NULL,
  `type` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `check_in_condition`
--

CREATE TABLE `check_in_condition` (
  `id` int(11) NOT NULL,
  `last_in` varchar(100) NOT NULL,
  `out_begin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerID` bigint(20) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerID`, `peopleID`, `company`, `bank_account`, `depoID`, `distributorID`, `deleted`) VALUES
(57, 149, '', '', 11, 62, 1),
(58, 150, 'sylcoffee', '', 11, 61, 1);

-- --------------------------------------------------------

--
-- Table structure for table `depo`
--

CREATE TABLE `depo` (
  `depoID` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depo`
--

INSERT INTO `depo` (`depoID`, `name`, `address`, `phone`, `email`, `bank_account`, `deleted`) VALUES
(11, 'Head Ofice', 'Amborkhana', '01711362170', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `depo_stock_out`
--

CREATE TABLE `depo_stock_out` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(100) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `promotions` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `total` varchar(100) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `distributor_approval` varchar(10) NOT NULL DEFAULT 'no',
  `change_request` int(11) NOT NULL,
  `msg` text NOT NULL,
  `approval_date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depo_stock_out`
--

INSERT INTO `depo_stock_out` (`id`, `invoiceID`, `batchID`, `productID`, `price`, `quantity`, `promotions`, `discount`, `total`, `peopleID`, `depoID`, `distributorID`, `customerID`, `distributor_approval`, `change_request`, `msg`, `approval_date`, `created_at`, `updated_at`) VALUES
(6, '1', '89', 39, '395.6', 100, '0', '0', '39560', 145, 11, 61, 0, 'yes', 0, '', '2020-09-05', '2020-09-05', '0000-00-00'),
(7, '2', 'Sep 20', 40, '347.8', 100, '0', '0', '34780', 145, 11, 61, 0, 'yes', 0, '', '2020-09-05', '2020-09-05', '0000-00-00'),
(10, '3', '89', 39, '395.6', 20, '0', '0', '7912', 147, 11, 62, 0, 'no', 0, '', '0000-00-00', '2020-09-15', '0000-00-00'),
(11, '4', 'Sep 20', 40, '347.8', 100, '0', '0', '34780', 147, 11, 68, 0, 'no', 0, '', '0000-00-00', '2020-09-15', '0000-00-00'),
(12, '5', 'Sep 20', 41, '299', 50, '0', '0', '14950', 147, 11, 61, 0, 'no', 0, '', '0000-00-00', '2020-09-17', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `depo_target`
--

CREATE TABLE `depo_target` (
  `id` bigint(20) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `months` varchar(50) NOT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `distributorID` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`distributorID`, `name`, `address`, `phone`, `email`, `bank_account`, `depoID`, `deleted`) VALUES
(61, 'Gowry Distrivuson', 'Haquers', '', '', '', 11, 1),
(62, 'Musthak Store', 'Gachbari', '', '', '', 11, 2),
(63, 'Bhai Bhai Traders', 'South Surma', '', '', '', 11, 1),
(64, 'Nabil raders', 'Biani Bazar', '', '', '', 11, 1),
(65, 'Bina Entarprice', 'Sunam Gonj', '', '', '', 11, 1),
(67, 'Musthak Store', 'Gachbari', '01711362170', 'musthak@gmail.com', '', 11, 1),
(68, 'Sohel Distributor', 'jkskldfjasdlkf', '389240320489', 'sohea@kldksljf.com', 'dkjfjasfjljl', 11, 1);

-- --------------------------------------------------------

--
-- Table structure for table `distributor_stock_out`
--

CREATE TABLE `distributor_stock_out` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(100) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `promotions` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `total` varchar(100) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `change_request` int(11) NOT NULL,
  `msg` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `distributor_target`
--

CREATE TABLE `distributor_target` (
  `id` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `months` varchar(50) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employeeID` bigint(20) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employeeID`, `peopleID`, `depoID`, `distributorID`, `designation`, `username`, `password`, `deleted`) VALUES
(3, 4, 0, 0, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(72, 145, 11, 0, 'distributor_manager', 'Musthak', '10dc7cc7972778e6600992f1e9f0129f', 2),
(73, 146, 11, 61, 'distributor_manager', 'gowry', '8872056f1ed062b6b135fcf55b7da28c', 1),
(74, 147, 11, 0, 'admin', 'depo', 'daf3634555a1791bd3eba85491708652', 1),
(75, 148, 11, 67, 'distributor_manager', 'musthak', '10dc7cc7972778e6600992f1e9f0129f', 1),
(76, 151, 11, 61, 'sales_man', 'hosan', 'd9c28feb27757fd8e2d9ee6a59ed137a', 1),
(77, 152, 11, 62, 'sales_man', 'ronjit', '7584fec74267e08633baed9015cca236', 1),
(78, 153, 11, 68, 'distributor_manager', 'sohel', '6dc13346a3bff7a2c40987ba895d0d1c', 1);

-- --------------------------------------------------------

--
-- Table structure for table `emp_target`
--

CREATE TABLE `emp_target` (
  `id` bigint(20) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `months` varchar(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `target` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expenseID` bigint(20) NOT NULL,
  `categoryID` bigint(20) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `deleted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holidayID` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_stock_in`
--

CREATE TABLE `main_stock_in` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(100) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `incentive` varchar(3) NOT NULL,
  `depo_rate` varchar(100) NOT NULL,
  `distributor_rate` varchar(100) NOT NULL,
  `retail_rate` varchar(100) NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `approval` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_stock_in`
--

INSERT INTO `main_stock_in` (`id`, `invoiceID`, `batchID`, `peopleID`, `productID`, `price`, `quantity`, `total`, `incentive`, `depo_rate`, `distributor_rate`, `retail_rate`, `mrp`, `approval`, `created_at`, `updated_at`, `deleted`) VALUES
(7, '1', '89', 4, 39, '250', 500, '125000', '0', '382.7', '395.6', '430', '450', 'yes', '2020-09-03', '2020-09-05', 1),
(8, '2', 'Sep 20', 4, 40, '260', 400, '104000', '0', '336.7', '347.8', '370', '370', 'yes', '2020-09-05', '0000-00-00', 1),
(10, '3', 'Sep 20', 4, 41, '250', 500, '125000', '0', '289.25', '299', '325', '340', 'yes', '2020-09-05', '2020-09-05', 1),
(11, '4', 'new', 4, 39, '300', 700, '210000', '0', '382.7', '395.6', '430', '450', 'yes', '2020-09-15', '0000-00-00', 1),
(12, '5', 'new', 4, 40, '280', 800, '224000', '0', '336.7', '347.8', '370', '370', 'yes', '2020-09-15', '0000-00-00', 1),
(13, '5', 'new', 4, 41, '250', 1000, '250000', '0', '289.25', '299', '325', '340', 'yes', '2020-09-15', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `main_stock_out`
--

CREATE TABLE `main_stock_out` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(100) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `promotions` varchar(10) NOT NULL DEFAULT '0',
  `discount` varchar(10) NOT NULL,
  `total` varchar(100) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `depo_approval` varchar(10) NOT NULL DEFAULT 'no',
  `change_request` int(11) NOT NULL,
  `msg` text NOT NULL,
  `approval_date` date NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_stock_out`
--

INSERT INTO `main_stock_out` (`id`, `invoiceID`, `batchID`, `productID`, `price`, `quantity`, `promotions`, `discount`, `total`, `peopleID`, `depoID`, `customerID`, `depo_approval`, `change_request`, `msg`, `approval_date`, `created_at`, `updated_at`) VALUES
(6, '1', '89', 39, '382.7', 200, '0', '0', '76540', 4, 11, 0, 'yes', 0, '', '2020-09-05', '2020-09-05', '0000-00-00'),
(7, '2', 'Sep 20', 40, '336.7', 200, '0', '0', '67340', 4, 11, 0, 'yes', 0, '', '2020-09-05', '2020-09-05', '0000-00-00'),
(8, '3', '89', 39, '382.7', 300, '0', '0', '114810', 4, 11, 0, 'yes', 0, '', '2020-09-15', '2020-09-15', '0000-00-00'),
(9, '4', 'Sep 20', 40, '336.7', 200, '0', '0', '211965', 4, 11, 0, 'yes', 0, '', '2020-09-15', '2020-09-15', '0000-00-00'),
(10, '4', 'Sep 20', 41, '289.25', 500, '0', '0', '211965', 4, 11, 0, 'yes', 0, '', '2020-09-15', '2020-09-15', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `main_stock_wastage`
--

CREATE TABLE `main_stock_wastage` (
  `id` bigint(20) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `email`, `address`, `phone`, `zip`, `photo`) VALUES
(1, 'sohel Rana', 'mhsohel017@gmail.com', 'Dhaka', '01735254295', '1216', ''),
(4, 'Faisal Younus ', 'faisalyounus1990@gmail.com', 'Dhaka', '01712409343', '1216', ''),
(137, 'Opening Stock', 'email@email.com', 'Head Office', '01235875668', '', ''),
(138, 'Ma Enterprice', '', 'Dhaka', '', '', ''),
(139, 'R k Enterprice', '', 'Dhaka', '', '', ''),
(140, 'Khaligat', '', 'Sylhet', '', '', ''),
(141, 'Okson', '', 'Chittagong', '', '', ''),
(142, 'Monsur Kaligat', '', 'Sylhet', '', '', ''),
(143, 'Dasi Congumar Pro', '', 'Chittagong', '', '', ''),
(144, 'Monir Bi', '', 'Dhaka', '', '', ''),
(145, 'Musthak Store', 'musthak@gmail.com', 'Amborkhana', '01711362170', '3100', ''),
(146, 'Gowry Distrivuson	', 'gowry@bditfactory@gmail.com', '', '0171240932', '', ''),
(147, 'depo', 'depo@gmil.com', 'amborkhana', '098765644', '', ''),
(148, 'musthak store', 'musthak@gmail.com', 'gachbari', '01711362170', '3100', ''),
(149, 'Ronjit', 'ronjit@gmail.com', 'Sylhet 1', '01711362170', '3100', ''),
(150, 'Hosan', 'hosan@gmail.com', 'Sylhet 2', '01711362170', '3100', ''),
(151, 'Hosan', 'hosan@gmail.com', 'Sylhet 2', '01711362170', '3100', ''),
(152, 'Ronjit', 'ronjit@mail.com', 'Sylhet 1', '01711362170', '3100', ''),
(153, 'Sohel Ahmed', 'hkhkhhk@jlksdjl.com', 'dsfufoisuf', '42304093809', 'fasdjflkaj', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` bigint(20) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `base_unit` bigint(20) NOT NULL,
  `description` text NOT NULL,
  `mrp` varchar(100) NOT NULL,
  `retail_rate` varchar(100) NOT NULL,
  `distributor_rate` varchar(100) NOT NULL,
  `depo_rate` varchar(100) NOT NULL,
  `stock_alert` varchar(100) NOT NULL,
  `stock_alert_depo` varchar(100) NOT NULL,
  `stock_alert_distributor` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `product_code`, `name`, `unit`, `base_unit`, `description`, `mrp`, `retail_rate`, `distributor_rate`, `depo_rate`, `stock_alert`, `stock_alert_depo`, `stock_alert_distributor`, `created_at`, `updated_at`, `deleted`) VALUES
(39, '01', 'Syl Coffee( 1Kg) Vending', '2', 0, 'Syl Coffee 1Kg Vending', '450', '430', '395.6', '382.7', '500,400,300', '400,300,200', '60,80,100', '2020-09-02 11:04:57', '2020-09-02 11:36:04', 1),
(40, '02', 'Syl Coffee Primium 1Kg Vending', '2', 0, 'Syl Coffee Primium 1Kg Vending', '370', '370', '347.8', '336.7', '120,160,220', '100,150,200', '20,40,60', '2020-09-02 11:23:13', '2020-09-02 11:37:10', 1),
(41, '03', 'Syl Milk Tea(1Kg) Vending', '2', 0, 'Syl Milk Tea 1Kg Vending', '340', '325', '299', '289.25', '600,700,800', '500,600,700', '60,80,100', '2020-09-02 11:33:42', '2020-09-02 11:40:06', 1),
(42, '04', 'Syl Milk Tea Classic(1Kg)Vending', '2', 0, 'Syl Milk Tea Classic 1Kg Vending', '280', '280', '263.2', '254.8', '250,300,350', '200,250,300', '20,40,60', '2020-09-02 11:47:36', '0000-00-00 00:00:00', 1),
(43, '05', 'Syl Masala Tea(1Kg)Vending', '2', 0, 'Syl Masala Tea 1Kg Vending', '350', '350', '322', '311.5', '150,200,250', '100,150,200', '20,40,60', '2020-09-02 11:56:30', '0000-00-00 00:00:00', 1),
(44, '06', 'Syl Masala Tea Vending 500gm', '2', 0, 'Syl Masala Tea Vending 500gm', '350', '350', '322', '311.5', '150,200,250', '100,150,200', '20,40,60', '2020-09-02 12:07:29', '0000-00-00 00:00:00', 1),
(45, '07', 'Syl Sweet Tea(1Kg)Vending', '2', 0, 'Syl Sweet Tea(1Kg)Vending', '340', '325', '299', '289.25', '500,600,700', '400,500,600', '20,40,60', '2020-09-02 12:15:45', '0000-00-00 00:00:00', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `raw_material_return`
--

CREATE TABLE `raw_material_return` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(10) NOT NULL,
  `raw_material_id` bigint(20) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `raw_stock_in`
--

CREATE TABLE `raw_stock_in` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(10) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `raw_material_id` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `total` varchar(100) NOT NULL,
  `supplierID` bigint(20) NOT NULL,
  `approval` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `raw_stock_in`
--

INSERT INTO `raw_stock_in` (`id`, `invoiceID`, `batchID`, `peopleID`, `raw_material_id`, `price`, `quantity`, `discount`, `total`, `supplierID`, `approval`, `created_at`, `updated_at`) VALUES
(226, '205543923', 'sl123', 1, 46, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:43'),
(227, '205543923', 'sdm123', 1, 38, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:43'),
(228, '205543923', 'ptm', 1, 49, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:43'),
(229, '205543923', 'tr', 1, 51, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:43'),
(230, '205543923', 'sp', 1, 53, '10', 10, '20', '100', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:43'),
(231, '205543923', 'pp', 1, 73, '10', 10, '20', '100', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:43'),
(232, '205543923', 'sl123', 1, 46, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(233, '205543923', 'sdm123', 1, 38, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(234, '205543923', 'ptm', 1, 49, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(235, '205543923', 'tr', 1, 51, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(236, '205543923', 'sp', 1, 53, '10', 10, '20', '100', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(237, '205543923', 'pp', 1, 73, '10', 10, '20', '100', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(238, '205543923', 'tcp', 1, 52, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44'),
(239, '205543923', 'pp', 1, 73, '30', 10, '20', '300', 138, 'no', '2020-12-24 00:00:00', '2020-12-24 13:42:44');

-- --------------------------------------------------------

--
-- Table structure for table `raw_stock_out`
--

CREATE TABLE `raw_stock_out` (
  `id` bigint(20) NOT NULL,
  `invoiceID` varchar(10) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `raw_material_id` bigint(20) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `unit` varchar(120) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `raw_wastage`
--

CREATE TABLE `raw_wastage` (
  `id` bigint(20) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `raw_material_id` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `joining_date` date NOT NULL,
  `salary` varchar(100) NOT NULL,
  `late_panalty` varchar(100) NOT NULL,
  `allowed_leave` int(11) NOT NULL,
  `bank_account` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `staff_leave`
--

CREATE TABLE `staff_leave` (
  `id` bigint(20) NOT NULL,
  `staffID` bigint(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock_return`
--

CREATE TABLE `stock_return` (
  `id` bigint(20) NOT NULL,
  `depoID` bigint(20) NOT NULL,
  `distributorID` bigint(20) NOT NULL,
  `customerID` bigint(20) NOT NULL,
  `batchID` varchar(100) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL,
  `for_depo` bigint(20) NOT NULL,
  `for_distributor` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock_return`
--

INSERT INTO `stock_return` (`id`, `depoID`, `distributorID`, `customerID`, `batchID`, `productID`, `price`, `quantity`, `total`, `created_at`, `updated_at`, `for_depo`, `for_distributor`) VALUES
(1, 11, 61, 1, 'oil123', 39, '500', '1', '500', '2020-12-21', '2020-12-21', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplierID` bigint(20) NOT NULL,
  `peopleID` bigint(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `bank_account` varchar(100) NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplierID`, `peopleID`, `company`, `bank_account`, `deleted`) VALUES
(5, 137, '', '', 1),
(6, 138, '', '', 1),
(7, 139, '', '', 1),
(8, 140, '', '', 1),
(9, 141, '', '', 1),
(10, 142, '', '', 1),
(11, 143, '', '', 1),
(12, 144, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unitID` bigint(20) NOT NULL,
  `unit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unitID`, `unit`) VALUES
(1, 'gm'),
(2, 'KG'),
(3, 'Box'),
(4, 'Packet'),
(5, 'Pices'),
(6, 'Jar'),
(7, 'Bag'),
(8, 'Bottle'),
(9, 'Can'),
(10, 'Case'),
(11, 'Carton'),
(12, 'Drum'),
(13, 'Dozen'),
(14, 'Foot'),
(15, 'Meter'),
(16, 'Millimeter'),
(17, 'Millilite'),
(18, 'Milligram'),
(19, 'Liter'),
(20, 'Inch'),
(21, 'Tonne '),
(22, 'Bundle');

-- --------------------------------------------------------

--
-- Table structure for table `unit_conversion`
--

CREATE TABLE `unit_conversion` (
  `conversionID` bigint(20) NOT NULL,
  `productID` bigint(20) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `to_unit` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abul', 'a@email.com', NULL, '$2y$10$93oBODlOrDuYeIXK6J21yutnozdUU2CN.hpJnPULN8RT.Q62kIRt2', NULL, '2020-12-06 20:57:18', '2020-12-06 20:57:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attandance`
--
ALTER TABLE `attandance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `check_in_condition`
--
ALTER TABLE `check_in_condition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerID`) USING BTREE,
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `company` (`company`),
  ADD KEY `distributorID` (`distributorID`);

--
-- Indexes for table `depo`
--
ALTER TABLE `depo`
  ADD PRIMARY KEY (`depoID`),
  ADD KEY `name` (`name`),
  ADD KEY `address` (`address`(255)),
  ADD KEY `phone` (`phone`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `depo_stock_out`
--
ALTER TABLE `depo_stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `price` (`price`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `discount` (`discount`),
  ADD KEY `total` (`total`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `depoID` (`depoID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `distributorID` (`distributorID`);

--
-- Indexes for table `depo_target`
--
ALTER TABLE `depo_target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depoID` (`depoID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`distributorID`),
  ADD KEY `name` (`name`),
  ADD KEY `address` (`address`(255)),
  ADD KEY `phone` (`phone`),
  ADD KEY `email` (`email`),
  ADD KEY `depoID` (`depoID`);

--
-- Indexes for table `distributor_stock_out`
--
ALTER TABLE `distributor_stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `price` (`price`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `discount` (`discount`),
  ADD KEY `total` (`total`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `distributor_target`
--
ALTER TABLE `distributor_target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `distributorID` (`distributorID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employeeID`) USING BTREE,
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `depoID` (`depoID`),
  ADD KEY `distributorID` (`distributorID`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `emp_target`
--
ALTER TABLE `emp_target`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expenseID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `peopleID` (`peopleID`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`holidayID`);

--
-- Indexes for table `main_stock_in`
--
ALTER TABLE `main_stock_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `price` (`price`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `batchID` (`batchID`) USING BTREE,
  ADD KEY `invoiceID` (`invoiceID`);

--
-- Indexes for table `main_stock_out`
--
ALTER TABLE `main_stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `price` (`price`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `discount` (`discount`),
  ADD KEY `total` (`total`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `depoID` (`depoID`),
  ADD KEY `customerID` (`customerID`);

--
-- Indexes for table `main_stock_wastage`
--
ALTER TABLE `main_stock_wastage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `depoID` (`depoID`),
  ADD KEY `distributorID` (`distributorID`);

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
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `email` (`email`),
  ADD KEY `address` (`address`(255)) USING BTREE;

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `product_code` (`product_code`),
  ADD KEY `name` (`name`),
  ADD KEY `description` (`description`(255)),
  ADD KEY `mrp` (`mrp`),
  ADD KEY `retail_rate` (`retail_rate`),
  ADD KEY `distributor_rate` (`distributor_rate`),
  ADD KEY `depo_rate` (`depo_rate`),
  ADD KEY `base_unit` (`base_unit`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`),
  ADD KEY `unit` (`unit`);

--
-- Indexes for table `raw_material_return`
--
ALTER TABLE `raw_material_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `itemID` (`raw_material_id`),
  ADD KEY `quantity` (`quantity`);

--
-- Indexes for table `raw_stock_in`
--
ALTER TABLE `raw_stock_in`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `itemID` (`raw_material_id`),
  ADD KEY `price` (`price`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `supplierID` (`supplierID`),
  ADD KEY `batchID` (`batchID`);

--
-- Indexes for table `raw_stock_out`
--
ALTER TABLE `raw_stock_out`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoiceID` (`invoiceID`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `itemID` (`raw_material_id`),
  ADD KEY `quantity` (`quantity`),
  ADD KEY `price` (`price`),
  ADD KEY `batchID` (`batchID`);

--
-- Indexes for table `raw_wastage`
--
ALTER TABLE `raw_wastage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rawID` (`raw_material_id`),
  ADD KEY `batchID` (`batchID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`);

--
-- Indexes for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD PRIMARY KEY (`id`),
  ADD KEY `staffID` (`staffID`);

--
-- Indexes for table `stock_return`
--
ALTER TABLE `stock_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `depoID` (`depoID`),
  ADD KEY `distributorID` (`distributorID`),
  ADD KEY `batchID` (`batchID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `customerID` (`customerID`),
  ADD KEY `for_depo` (`for_depo`),
  ADD KEY `for_distributor` (`for_distributor`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplierID`),
  ADD KEY `peopleID` (`peopleID`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unitID`);

--
-- Indexes for table `unit_conversion`
--
ALTER TABLE `unit_conversion`
  ADD PRIMARY KEY (`conversionID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `to_unit` (`to_unit`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attandance`
--
ALTER TABLE `attandance`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_in_condition`
--
ALTER TABLE `check_in_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customerID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `depo`
--
ALTER TABLE `depo`
  MODIFY `depoID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `depo_stock_out`
--
ALTER TABLE `depo_stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `depo_target`
--
ALTER TABLE `depo_target`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `distributorID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `distributor_stock_out`
--
ALTER TABLE `distributor_stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distributor_target`
--
ALTER TABLE `distributor_target`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employeeID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `emp_target`
--
ALTER TABLE `emp_target`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expenseID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holiday`
--
ALTER TABLE `holiday`
  MODIFY `holidayID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_stock_in`
--
ALTER TABLE `main_stock_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `main_stock_out`
--
ALTER TABLE `main_stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `main_stock_wastage`
--
ALTER TABLE `main_stock_wastage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `raw_material_return`
--
ALTER TABLE `raw_material_return`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `raw_stock_in`
--
ALTER TABLE `raw_stock_in`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT for table `raw_stock_out`
--
ALTER TABLE `raw_stock_out`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `raw_wastage`
--
ALTER TABLE `raw_wastage`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_leave`
--
ALTER TABLE `staff_leave`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_return`
--
ALTER TABLE `stock_return`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplierID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unitID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `unit_conversion`
--
ALTER TABLE `unit_conversion`
  MODIFY `conversionID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attandance`
--
ALTER TABLE `attandance`
  ADD CONSTRAINT `attandance_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `depo_stock_out`
--
ALTER TABLE `depo_stock_out`
  ADD CONSTRAINT `depo_stock_out_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `depo_target`
--
ALTER TABLE `depo_target`
  ADD CONSTRAINT `depo_target_ibfk_1` FOREIGN KEY (`depoID`) REFERENCES `depo` (`depoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distribution`
--
ALTER TABLE `distribution`
  ADD CONSTRAINT `distribution_ibfk_1` FOREIGN KEY (`depoID`) REFERENCES `depo` (`depoID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributor_stock_out`
--
ALTER TABLE `distributor_stock_out`
  ADD CONSTRAINT `distributor_stock_out_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distributor_target`
--
ALTER TABLE `distributor_target`
  ADD CONSTRAINT `distributor_target_ibfk_1` FOREIGN KEY (`distributorID`) REFERENCES `distribution` (`distributorID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `expense_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_stock_in`
--
ALTER TABLE `main_stock_in`
  ADD CONSTRAINT `main_stock_in_ibfk_1` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `main_stock_in_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_stock_out`
--
ALTER TABLE `main_stock_out`
  ADD CONSTRAINT `main_stock_out_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `main_stock_out_ibfk_3` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_stock_wastage`
--
ALTER TABLE `main_stock_wastage`
  ADD CONSTRAINT `main_stock_wastage_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_material_return`
--
ALTER TABLE `raw_material_return`
  ADD CONSTRAINT `raw_material_return_ibfk_1` FOREIGN KEY (`invoiceID`) REFERENCES `raw_stock_in` (`invoiceID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_stock_in`
--
ALTER TABLE `raw_stock_in`
  ADD CONSTRAINT `raw_stock_in_ibfk_1` FOREIGN KEY (`supplierID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raw_stock_in_ibfk_2` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raw_stock_in_ibfk_3` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_stock_out`
--
ALTER TABLE `raw_stock_out`
  ADD CONSTRAINT `raw_stock_out_ibfk_1` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raw_stock_out_ibfk_2` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raw_stock_out_ibfk_3` FOREIGN KEY (`batchID`) REFERENCES `raw_stock_in` (`batchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `raw_wastage`
--
ALTER TABLE `raw_wastage`
  ADD CONSTRAINT `raw_wastage_ibfk_1` FOREIGN KEY (`raw_material_id`) REFERENCES `raw_material` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `raw_wastage_ibfk_2` FOREIGN KEY (`batchID`) REFERENCES `raw_stock_in` (`batchID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff_leave`
--
ALTER TABLE `staff_leave`
  ADD CONSTRAINT `staff_leave_ibfk_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_return`
--
ALTER TABLE `stock_return`
  ADD CONSTRAINT `stock_return_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`peopleID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `unit_conversion`
--
ALTER TABLE `unit_conversion`
  ADD CONSTRAINT `unit_conversion_ibfk_1` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `unit_conversion_ibfk_2` FOREIGN KEY (`to_unit`) REFERENCES `units` (`unitID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
